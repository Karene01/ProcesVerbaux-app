<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "VOTE")]
class Vote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_vote", type: "integer")]
    private ?int $id = null;

    #[ORM\Column(name: "valeur_vote", type: "string", length: 20)]
    private ?string $valeurVote = null; // valeurs attendues : 'Pour', 'Contre', 'Abstention'

    #[ORM\ManyToOne(targetEntity: Question::class)]
    #[ORM\JoinColumn(name: "id_question", referencedColumnName: "id_question")]
    private ?Question $question = null;

    #[ORM\ManyToOne(targetEntity: Participation::class)]
    #[ORM\JoinColumn(name: "id_participation", referencedColumnName: "id_participation")]
    private ?Participation $participation = null;

    #[ORM\ManyToOne(targetEntity: AssembleeGenerale::class, inversedBy: "votes")]
#[ORM\JoinColumn(name: "id_assemblee_generale", referencedColumnName: "id_assemblee_generale")]
private ?AssembleeGenerale $assemblee = null;

// Ajoutez les getters/setters correspondants
public function getAssemblee(): ?AssembleeGenerale
{
    return $this->assemblee;
}

public function setAssemblee(?AssembleeGenerale $assemblee): static
{
    $this->assemblee = $assemblee;
    return $this;
}
    public function getId(): ?int
{
    return $this->id;
}

public function setId(int $id): static
{
    $this->id = $id;
    return $this;
}

public function getValeurVote(): ?string
{
    return $this->valeurVote;
}

public function setValeurVote(string $valeurVote): static
{
    $this->valeurVote = $valeurVote;
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

public function getParticipation(): ?Participation
{
    return $this->participation;
}

public function setParticipation(Participation $participation): static
{
    $this->participation = $participation;
    return $this;
}

}
