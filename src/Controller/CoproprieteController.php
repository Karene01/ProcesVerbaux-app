<?php

namespace App\Controller;

use App\Entity\Copropriete;
use App\Form\CoproprieteForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/copropriete')]
final class CoproprieteController extends AbstractController
{
    #[Route(name: 'app_copropriete_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $coproprietes = $entityManager
            ->getRepository(Copropriete::class)
            ->findAll();

        return $this->render('copropriete/index.html.twig', [
            'coproprietes' => $coproprietes,
        ]);
    }

    #[Route('/new', name: 'app_copropriete_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $copropriete = new Copropriete();
        $form = $this->createForm(CoproprieteForm::class, $copropriete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($copropriete);
            $entityManager->flush();

            return $this->redirectToRoute('app_copropriete_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('copropriete/new.html.twig', [
            'copropriete' => $copropriete,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_copropriete_show', methods: ['GET'])]
    public function show(Copropriete $copropriete): Response
    {
        return $this->render('copropriete/show.html.twig', [
            'copropriete' => $copropriete,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_copropriete_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Copropriete $copropriete, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CoproprieteForm::class, $copropriete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_copropriete_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('copropriete/edit.html.twig', [
            'copropriete' => $copropriete,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_copropriete_delete', methods: ['POST'])]
    public function delete(Request $request, Copropriete $copropriete, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$copropriete->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($copropriete);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_copropriete_index', [], Response::HTTP_SEE_OTHER);
    }


    public function indexAction()
    {
        $htmlpage = '<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome!</title>
    </head>
    <body>
        <h1>Welcome</h1>
            
    <p>Bienvenue dans notre Copro list</p>
    </body>
</html>';
        
        return new Response(
            $htmlpage,
            Response::HTTP_OK,
            array('content-type' => 'text/html')
            );
    }
}
