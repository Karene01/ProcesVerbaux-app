<?php

namespace App\Controller;

use App\Entity\Participation;
use App\Entity\AssembleeGenerale;
use App\Form\ParticipationForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/participation')]
final class ParticipationController extends AbstractController
{
    #[Route(name: 'app_participation_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $participations = $entityManager
            ->getRepository(Participation::class)
            ->findAll();

        return $this->render('participation/index.html.twig', [
            'participations' => $participations,
        ]);
    }

    #[Route('/new', name: 'app_participation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $participation = new Participation();
        $form = $this->createForm(ParticipationForm::class, $participation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($participation);
            $entityManager->flush();

            return $this->redirectToRoute('app_participation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('participation/new.html.twig', [
            'participation' => $participation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_participation_show', methods: ['GET'])]
    public function show(Participation $participation): Response
    {
        return $this->render('participation/show.html.twig', [
            'participation' => $participation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_participation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Participation $participation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ParticipationForm::class, $participation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_participation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('participation/edit.html.twig', [
            'participation' => $participation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_participation_delete', methods: ['POST'])]
    public function delete(Request $request, Participation $participation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$participation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($participation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_participation_index', [], Response::HTTP_SEE_OTHER);
    }


#[Route('/assemblee/{id}/presence/add', name: 'app_participation_add_presence', methods: ['GET', 'POST'])]
public function addPresence(Request $request, AssembleeGenerale $ag, EntityManagerInterface $em): Response
{
    $participation = new Participation();
    $participation->setAssembleeGenerale($ag); 

    $form = $this->createForm(ParticipationForm::class, $participation);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($participation);
        $em->flush();

        $this->addFlash('success', 'Présence enregistrée avec succès.');
        return $this->redirectToRoute('app_assemblee_generale_show', [
            'id' => $ag->getId(),
        ]);
    }

    return $this->render('participation/add_presence.html.twig', [
        'form' => $form,
        'assemblee_generale' => $ag,
    ]);
}



#[Route('/assemblee/{id}/representation/add', name: 'participation_add_representant', methods: ['GET', 'POST'])]
public function addRepresentant(Request $request, AssembleeGenerale $ag, EntityManagerInterface $em): Response
{
    $participation = new Participation();
    $participation->setAssembleeGenerale($ag);
    $participation->setPresent(false); // représenté

    $form = $this->createForm(ParticipationForm::class, $participation, [
        'action_type' => 'representation',
    ]);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($participation);
        $em->flush();

        return $this->redirectToRoute('app_assemblee_generale_show', ['id' => $ag->getId()]);
    }

    return $this->render('participation/add_representant.html.twig', [
        'form' => $form,
        'assemblee' => $ag,
    ]);
}

#[Route('/assemblee/{id}/participations', name: 'participation_list_by_ag', methods: ['GET'])]
public function listByAG(AssembleeGenerale $ag): Response
{
    return $this->render('participation/by_ag.html.twig', [
        'assemblee' => $ag,
        'participations' => $ag->getParticipations(),
    ]);
}


}
