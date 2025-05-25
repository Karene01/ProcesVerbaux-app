<?php

namespace App\Controller;

use App\Entity\AssembleeGenerale;
use App\Entity\Question;
use App\Entity\QuestionADiscuter;
use App\Form\QuestionADiscuterForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/question/a/discuter')]
final class QuestionADiscuterController extends AbstractController
{
/*    #[Route(name: 'app_question_a_discuter_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $questionADiscuters = $entityManager
            ->getRepository(QuestionADiscuter::class)
            ->findAll();

        return $this->render('question_a_discuter/index.html.twig', [
            'question_a_discuters' => $questionADiscuters,
        ]);
    }
*/

#[Route('/', name: 'app_question_a_discuter_index', methods: ['GET'])]
/*public function index(Request $request, EntityManagerInterface $em): Response
{
    $agId = $request->query->get('assemblee');

    if ($agId) {
        $questions = $em->createQueryBuilder()
            ->select('qad')
            ->from('App\Entity\QuestionADiscuter', 'qad')
            ->join('qad.question', 'q')
            ->join('q.assembleeGenerale', 'ag')
            ->where('ag.id = :agId')
            ->setParameter('agId', $agId)
            ->getQuery()
            ->getResult();
    } else {
        $questions = $em->getRepository(QuestionADiscuter::class)->findAll();
    }

    return $this->render('question_a_discuter/index.html.twig', [
        'question_a_discuters' => $questions,
    ]);
}*/

public function index(Request $request, EntityManagerInterface $em): Response
    {
        $agId = $request->query->get('assemblee');
        $repo = $em->getRepository(QuestionADiscuter::class);

        $questions = $agId
            ? $em->createQueryBuilder()
                ->select('qd')
                ->from(QuestionADiscuter::class, 'qd')
                ->join('qd.question', 'q')
                ->join('q.assemblee', 'ag')
                ->where('ag.id = :id')
                ->setParameter('id', $agId)
                ->getQuery()
                ->getResult()
            : $repo->findAll();

        return $this->render('question_a_discuter/index.html.twig', [
            'question_a_discuters' => $questions,
        ]);
    }





    #[Route('/new', name: 'app_question_a_discuter_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $questionADiscuter = new QuestionADiscuter();
        $form = $this->createForm(QuestionADiscuterForm::class, $questionADiscuter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($questionADiscuter);
            $entityManager->flush();

            return $this->redirectToRoute('app_question_a_discuter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('question_a_discuter/new.html.twig', [
            'question_a_discuter' => $questionADiscuter,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_question_a_discuter_show', methods: ['GET'])]
    public function show(QuestionADiscuter $questionADiscuter): Response
    {
        return $this->render('question_a_discuter/show.html.twig', [
            'question_a_discuter' => $questionADiscuter,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_question_a_discuter_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, QuestionADiscuter $questionADiscuter, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(QuestionADiscuterForm::class, $questionADiscuter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_question_a_discuter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('question_a_discuter/edit.html.twig', [
            'question_a_discuter' => $questionADiscuter,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_question_a_discuter_delete', methods: ['POST'])]
    public function delete(Request $request, QuestionADiscuter $questionADiscuter, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$questionADiscuter->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($questionADiscuter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_question_a_discuter_index', [], Response::HTTP_SEE_OTHER);
    }

      
#[Route('/assemblee/{id}/question-a-discuter/add', name: 'app_question_a_discuter_new_for_ag')]
public function newForAG(AssembleeGenerale $assemblee, Request $request, EntityManagerInterface $em): Response
{
    $question = new Question();
    $questionADiscuter = new QuestionADiscuter();
    $question->setAssembleeGenerale($assemblee);
    $question->setQuestionADiscuter($questionADiscuter);

    $form = $this->createForm(QuestionADiscuterForm::class, $questionADiscuter);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($question);
        $em->persist($questionADiscuter);
        $em->flush();

        $this->addFlash('success', 'Question à discuter ajoutée.');
        return $this->redirectToRoute('app_assemblee_generale_show', ['id' => $assemblee->getId()]);
    }

    return $this->render('question_a_discuter/new.html.twig', [
        'form' => $form,
        'assemblee_generale' => $assemblee,
    ]);
}
}
