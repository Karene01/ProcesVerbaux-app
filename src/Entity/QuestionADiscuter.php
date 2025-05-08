<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "QUESTION_A_DISCUTER")]
class QuestionADiscuter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_question_a_discuter", type: "integer")]
    private ?int $id = null;

    
    #[ORM\Column(name: "question_a_discuter", type: "string", length: 255)]
    private ?string $contenu = null;

    #[ORM\OneToOne(targetEntity: Question::class)]
    #[ORM\JoinColumn(name: "id_question", referencedColumnName: "id_question")]
    private ?Question $question = null;
}
