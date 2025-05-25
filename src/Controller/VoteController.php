<?php

namespace App\Controller;

use App\Entity\AssembleeGenerale;
use App\Entity\Vote;
use App\Form\VoteForm;
use App\Entity\Question;
use App\Entity\Participation;
use App\Form\VoteFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/vote')]
final class VoteController extends AbstractController
{
    #[Route(name: 'app_vote_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $votes = $entityManager
            ->getRepository(Vote::class)
            ->findAll();

        return $this->render('vote/index.html.twig', [
            'votes' => $votes,
        ]);
    }

    #[Route('/new', name: 'app_vote_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $vote = new Vote();
        $form = $this->createForm(VoteForm::class, $vote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($vote);
            $entityManager->flush();

            return $this->redirectToRoute('app_vote_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vote/new.html.twig', [
            'vote' => $vote,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vote_show', methods: ['GET'])]
    public function show(Vote $vote): Response
    {
        return $this->render('vote/show.html.twig', [
            'vote' => $vote,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_vote_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Vote $vote, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VoteForm::class, $vote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_vote_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vote/edit.html.twig', [
            'vote' => $vote,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vote_delete', methods: ['POST'])]
    public function delete(Request $request, Vote $vote, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vote->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($vote);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_vote_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/assemblee/{id}/votes', name: 'app_vote_questions')]
public function voteQuestions(AssembleeGenerale $assemblee, EntityManagerInterface $em): Response
{
    // Récupère les participants présents
    $participants = $assemblee->getParticipations()->filter(fn($p) => $p->isPresent());

    // Récupère les questions à voter
    $questionsAVoter = array_filter(
        $assemblee->getQuestions()->toArray(),
        fn($q) => $q->getQuestionAVoter() !== null
    );

    return $this->render('vote/questions.html.twig', [
        'assemblee' => $assemblee,
        'questions' => $questionsAVoter,
        'participants' => $participants,
        
    ]);
}

#[Route('/vote/assemblee/{id}/questions', name: 'app_vote_questions')]
public function questions(int $id, EntityManagerInterface $em): Response
{
    $assemblee = $em->getRepository(AssembleeGenerale::class)->find($id);
    $questions = $assemblee->getQuestions();
    $participations = $assemblee->getParticipations();

    // Précharger tous les votes pour l’assemblée
    $votes = $em->getRepository(Vote::class)->createQueryBuilder('v')
        ->join('v.question', 'q')
        ->join('v.participation', 'p')
        ->where('q.assembleeGenerale = :assemblee')
        ->setParameter('assemblee', $assemblee)
        ->getQuery()
        ->getResult();

    // Créer une map pour accès rapide [questionId][participationId] => Vote
    $voteMap = [];
    foreach ($votes as $vote) {
        $voteMap[$vote->getQuestion()->getId()][$vote->getParticipation()->getId()] = $vote->getValeurVote();
    }

    return $this->render('vote/questions.html.twig', [
        'assemblee' => $assemblee,
        'questions' => $questions,
        'participations' => $participations,
        'voteMap' => $voteMap,
    ]);
}

#[Route('/vote/vote/{questionId}/{participationId}/submit', name: 'app_vote_submit', methods: ['POST'])]
public function submit(
    int $questionId,
    int $participationId,
    Request $request,
    EntityManagerInterface $em
): Response {
    $valeur = $request->request->get('valeur_vote');

    $question = $em->getReference(Question::class, $questionId);
    $participation = $em->getReference(Participation::class, $participationId);

    // Vérifie si un vote existe déjà
    $existingVote = $em->getRepository(Vote::class)->findOneBy([
        'question' => $question,
        'participation' => $participation,
    ]);

    if ($existingVote) {
        // Met à jour le vote existant
        $existingVote->setValeurVote($valeur);
    } else {
        // Crée un nouveau vote
        $vote = new Vote();
        $vote->setQuestion($question);
        $vote->setParticipation($participation);
        $vote->setValeurVote($valeur);
        $em->persist($vote);
    }

    $em->flush();
    $this->addFlash('success', 'Vote enregistré');

    return $this->redirectToRoute('app_vote_questions', [
        'id' => $question->getAssembleeGenerale()->getId(),
    ]);
}

#[Route('/vote/assemblee/{id}/liste', name: 'app_vote_list', methods: ['GET'])]
public function listVotes(int $id, EntityManagerInterface $em): Response
{
    $assemblee = $em->getRepository(AssembleeGenerale::class)->find($id);
    $participations = $assemblee->getParticipations();

    $votes = [];
    foreach ($participations as $participation) {
        foreach ($participation->getVotes() as $vote) {
            $votes[] = $vote;
        }
    }

    return $this->render('vote/list.html.twig', [
        'votes' => $votes,
        'assemblee' => $assemblee,
    ]);
}


#[Route('/vote/{id}/supprimer', name: 'app_vote_delete_custom', methods: ['POST'])]
public function deleteVoteManuellement(Request $request, Vote $vote, EntityManagerInterface $em): Response
{
    if ($this->isCsrfTokenValid('delete' . $vote->getId(), $request->request->get('_token'))) {
        $em->remove($vote);
        $em->flush();
        $this->addFlash('success', 'Vote supprimé.');
    }

    return $this->redirectToRoute('app_vote_list', [
        'id' => $vote->getParticipation()->getAssembleeGenerale()->getId()
    ]);
}




}
