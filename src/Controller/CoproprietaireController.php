<?php

namespace App\Controller;

use App\Entity\Coproprietaire;
use App\Form\CoproprietaireForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/coproprietaire')]
final class CoproprietaireController extends AbstractController
{
    #[Route(name: 'app_coproprietaire_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $coproprietaires = $entityManager
            ->getRepository(Coproprietaire::class)
            ->findAll();

        return $this->render('coproprietaire/index.html.twig', [
            'coproprietaires' => $coproprietaires,
        ]);
    }

    #[Route('/new', name: 'app_coproprietaire_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $coproprietaire = new Coproprietaire();
        $form = $this->createForm(CoproprietaireForm::class, $coproprietaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($coproprietaire);
            $entityManager->flush();

            return $this->redirectToRoute('app_coproprietaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('coproprietaire/new.html.twig', [
            'coproprietaire' => $coproprietaire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_coproprietaire_show', methods: ['GET'])]
    public function show(Coproprietaire $coproprietaire): Response
    {
        return $this->render('coproprietaire/show.html.twig', [
            'coproprietaire' => $coproprietaire,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_coproprietaire_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Coproprietaire $coproprietaire, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CoproprietaireForm::class, $coproprietaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_coproprietaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('coproprietaire/edit.html.twig', [
            'coproprietaire' => $coproprietaire,
            'form' => $form,
        ]);
    }

    
    #[Route('/{id}', name: 'app_coproprietaire_delete', methods: ['POST'])]
    public function delete(Request $request, Coproprietaire $coproprietaire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coproprietaire->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($coproprietaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_coproprietaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
