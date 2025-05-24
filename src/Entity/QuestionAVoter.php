<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "QUESTION_A_VOTER")]
class QuestionAVoter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_question_a_voter", type: "integer")]
    private ?int $id = null;

   
    #[ORM\Column(name: "question_a_voter", type: "string", length: 255)]
    private ?string $contenu = null;

 
    #[ORM\OneToOne(inversedBy: 'questionAVoter', targetEntity: Question::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: "id_question", referencedColumnName: "id_question", nullable: false)]
    private ?Question $question = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(Question $question): static
    {
        $this->question = $question;
        return $this;
    }

}
