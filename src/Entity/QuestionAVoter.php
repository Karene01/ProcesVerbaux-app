<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "QUESTION_A_VOTER")]
class QuestionAVoter
{
    #[ORM\Id]
    #[ORM\Column(name: "id_question_a_voter", type: "integer")]
    private ?int $id = null;

    #[ORM\Id]
    #[ORM\Column(name: "question_a_voter", type: "string", length: 255)]
    private ?string $contenu = null;

    #[ORM\OneToOne(targetEntity: Question::class)]
    #[ORM\JoinColumn(name: "id_question", referencedColumnName: "id_question")]
    private ?Question $question = null;
}
