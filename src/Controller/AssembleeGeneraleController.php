<?php

namespace App\Controller;

use App\Entity\AssembleeGenerale;
use App\Form\AssembleeGeneraleForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

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
        return $this->render('assemblee_generale/show.html.twig', [
            'assemblee_generale' => $assembleeGenerale,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_assemblee_generale_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AssembleeGenerale $assembleeGenerale, EntityManagerInterface $entityManager): Response
    {
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

    #[Route('/{id}', name: 'app_assemblee_generale_delete', methods: ['POST'])]
    public function delete(Request $request, AssembleeGenerale $assembleeGenerale, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$assembleeGenerale->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($assembleeGenerale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_assemblee_generale_index', [], Response::HTTP_SEE_OTHER);
    }
}
