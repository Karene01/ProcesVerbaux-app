<?php

namespace App\Controller;

use App\Entity\AssembleeGenerale;
use App\Form\AssembleeGeneraleForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\QuestionAVoter;
use App\Entity\QuestionADiscuter;

#[Route('/assemblee/generale')]
final class AssembleeGeneraleController extends AbstractController
{
    #[Route(name: 'app_assemblee_generale_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $assembleeGenerales = $entityManager
            ->getRepository(AssembleeGenerale::class)
            ->findAll();

        return $this->render('assemblee_generale/index.html.twig', [
            'assemblee_generales' => $assembleeGenerales,
        ]);
    }

    #[Route('/new', name: 'app_assemblee_generale_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $assembleeGenerale = new AssembleeGenerale();
        $form = $this->createForm(AssembleeGeneraleForm::class, $assembleeGenerale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($assembleeGenerale);
            $entityManager->flush();

            return $this->redirectToRoute('app_assemblee_generale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('assemblee_generale/new.html.twig', [
            'assemblee_generale' => $assembleeGenerale,
            'form' => $form,
        ]);
    }

 

  #[Route('/{id}', name: 'app_assemblee_generale_show', methods: ['GET'])]
public function show(AssembleeGenerale $assembleeGenerale): Response
{
    // Toutes ces collections sont accessibles grâce aux relations Doctrine
    $copropriete = $assembleeGenerale->getCopropriete();
    $questions = $assembleeGenerale->getQuestions();
    $participations = $assembleeGenerale->getParticipations();
    //$votes = $assembleeGenerale->getVotes();

    $votes = [];
    foreach ($participations as $participation) {
        foreach ($participation->getVotes() as $vote) {
            $votes[] = $vote;
    }
}


      //  Filtres utiles :
    $questionsAVoter = array_filter($questions->toArray(), fn($q) => $q instanceof QuestionAVoter);
    $questionsADiscuter = array_filter($questions->toArray(), fn($q) => $q instanceof QuestionADiscuter);

    return $this->render('assemblee_generale/show.html.twig', [
        'assemblee_generale' => $assembleeGenerale,
        'copropriete' => $copropriete,
        'questions' => $questions,
        'participations' => $participations,
        'votes' => $votes,
        'questionsAVoter' => $questionsAVoter,         
        'questionsADiscuter' => $questionsADiscuter 
    ]);
}


#[Route('/{id}', name: 'app_assemblee_generale_delete', methods: ['POST'])]
public function delete(Request $request, AssembleeGenerale $assembleeGenerale, EntityManagerInterface $entityManager): Response
{
    if ($this->isCsrfTokenValid('delete'.$assembleeGenerale->getId(), $request->getPayload()->getString('_token'))) {
        $entityManager->remove($assembleeGenerale);
        $entityManager->flush();
    }

    return $this->redirectToRoute('app_assemblee_generale_index', [], Response::HTTP_SEE_OTHER);
}



#[Route('/{id}/ouvrir', name: 'assemblee_generale_ouvrir', methods: ['POST'])]
public function ouvrir(Request $request, AssembleeGenerale $assembleeGenerale, EntityManagerInterface $entityManager): Response
{
    if (
        $this->isCsrfTokenValid('ouvrir' . $assembleeGenerale->getId(), $request->request->get('_token')) &&
        !$assembleeGenerale->isTerminee()
    ) {
        $assembleeGenerale->setOuverte(true);
        $entityManager->flush();
    }

    return $this->redirectToRoute('app_assemblee_generale_show', ['id' => $assembleeGenerale->getId()]);
}


#[Route('/{id}/clore', name: 'assemblee_generale_clore', methods: ['POST'])]
public function clore(Request $request, AssembleeGenerale $assembleeGenerale, EntityManagerInterface $entityManager): Response
{
    if ($this->isCsrfTokenValid('clore' . $assembleeGenerale->getId(), $request->request->get('_token'))) {
        $assembleeGenerale->setOuverte(false);
        $assembleeGenerale->setTerminee(true); // ajout ici
        $entityManager->flush();
    }

    return $this->redirectToRoute('app_assemblee_generale_show', [
        'id' => $assembleeGenerale->getId(),
    ]);
}

#[Route('/{id}/edit', name: 'app_assemblee_generale_edit', methods: ['GET', 'POST'])]
public function edit(Request $request, AssembleeGenerale $assembleeGenerale, EntityManagerInterface $entityManager): Response
{
    if ($assembleeGenerale->isTerminee()) {
        $this->addFlash('warning', 'Impossible de modifier une assemblée déjà terminée.');
        return $this->redirectToRoute('app_assemblee_generale_show', ['id' => $assembleeGenerale->getId()]);
    }

    $form = $this->createForm(AssembleeGeneraleForm::class, $assembleeGenerale);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();

        return $this->redirectToRoute('app_assemblee_generale_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('assemblee_generale/edit.html.twig', [
        'assemblee_generale' => $assembleeGenerale,
        'form' => $form,
    ]);
}


}
