<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "QUESTION")]
class Question
{

#[ORM\ManyToOne(inversedBy: 'questions')]
#[ORM\JoinColumn(name: "id_assemblee_generale", referencedColumnName: "id_assemblee_generale")]
private ?AssembleeGenerale $assembleeGenerale = null;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_question", type: "integer")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: AssembleeGenerale::class)]
    #[ORM\JoinColumn(name: "id_assemblee_generale", referencedColumnName: "id_assemblee_generale")]
    private ?AssembleeGenerale $assemblee = null;

    public function getId(): ?int
{
     return $this->id;
}

public function setId(int $id): static
{
    $this->id = $id;
    return $this;
}

public function getAssembleeGenerale(): ?AssembleeGenerale
{
    return $this->assemblee;
}

public function setAssembleeGenerale(?AssembleeGenerale $assemblee): self
{
    $this->assemblee = $assemblee;
    return $this;
}

#[ORM\OneToOne(mappedBy: 'question', targetEntity: QuestionADiscuter::class, cascade: ['persist', 'remove'])]
private ?QuestionADiscuter $questionADiscuter = null;

public function getQuestionADiscuter(): ?QuestionADiscuter
    {
        return $this->questionADiscuter;
    }

    public function setQuestionADiscuter(?QuestionADiscuter $questionADiscuter): self
    {
        $this->questionADiscuter = $questionADiscuter;
        if ($questionADiscuter && $questionADiscuter->getQuestion() !== $this) {
            $questionADiscuter->setQuestion($this);
        }
        return $this;
    }

#[ORM\OneToOne(mappedBy: 'question', targetEntity: QuestionAVoter::class, cascade: ['persist', 'remove'])]
private ?QuestionAVoter $questionAVoter = null;

public function getQuestionAVoter(): ?QuestionAVoter
{
    return $this->questionAVoter;
}

public function setQuestionAVoter(?QuestionAVoter $questionAVoter): self
{
    $this->questionAVoter = $questionAVoter;
    if ($questionAVoter && $questionAVoter->getQuestion() !== $this) {
        $questionAVoter->setQuestion($this);
    }
    return $this;
}

}
