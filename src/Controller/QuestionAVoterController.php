<?php

namespace App\Controller;

use App\Entity\AssembleeGenerale;
use App\Entity\Question;
use App\Entity\QuestionAVoter;
use App\Form\QuestionAVoterForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/question/a/voter')]
final class QuestionAVoterController extends AbstractController
{

    #[Route('/', name: 'app_question_a_voter_index', methods: ['GET'])]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $agId = $request->query->get('assemblee');
        $repo = $em->getRepository(QuestionAVoter::class);

        $questions = $agId
            ? $em->createQueryBuilder()
                ->select('qv')
                ->from(QuestionAVoter::class, 'qv')
                ->join('qv.question', 'q')
                ->join('q.assemblee', 'ag')
                ->where('ag.id = :id')
                ->setParameter('id', $agId)
                ->getQuery()
                ->getResult()
            : $repo->findAll();

        return $this->render('question_a_voter/index.html.twig', [
            'question_a_voters' => $questions,
        ]);
    }



    #[Route('/new', name: 'app_question_a_voter_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $questionAVoter = new QuestionAVoter();
        $form = $this->createForm(QuestionAVoterForm::class, $questionAVoter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($questionAVoter);
            $entityManager->flush();

            return $this->redirectToRoute('app_question_a_voter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('question_a_voter/new.html.twig', [
            'question_a_voter' => $questionAVoter,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_question_a_voter_show', methods: ['GET'])]
    public function show(QuestionAVoter $questionAVoter): Response
    {
        return $this->render('question_a_voter/show.html.twig', [
            'question_a_voter' => $questionAVoter,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_question_a_voter_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, QuestionAVoter $questionAVoter, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(QuestionAVoterForm::class, $questionAVoter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_question_a_voter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('question_a_voter/edit.html.twig', [
            'question_a_voter' => $questionAVoter,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_question_a_voter_delete', methods: ['POST'])]
    public function delete(Request $request, QuestionAVoter $questionAVoter, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$questionAVoter->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($questionAVoter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_question_a_voter_index', [], Response::HTTP_SEE_OTHER);
    }

   
#[Route('/assemblee/{id}/question-a-voter/add', name: 'app_question_a_voter_new_for_ag')]
public function newForAG(AssembleeGenerale $assemblee, Request $request, EntityManagerInterface $em): Response
{
    $question = new Question();
    $questionAVoter = new QuestionAVoter();
    $question->setAssembleeGenerale($assemblee);
    $question->setQuestionAVoter($questionAVoter);

    $form = $this->createForm(QuestionAVoterForm::class, $questionAVoter);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($question);
        $em->persist($questionAVoter);
        $em->flush();

        $this->addFlash('success', 'Question à voter ajoutée.');
        return $this->redirectToRoute('app_assemblee_generale_show', ['id' => $assemblee->getId()]);
    }

    return $this->render('question_a_voter/new.html.twig', [
        'form' => $form,
        'assemblee_generale' => $assemblee,
    ]);
}

}
