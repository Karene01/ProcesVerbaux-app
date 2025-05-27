<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;


#[ORM\Entity]
#[ORM\Table(name: "ASSEMBLEE_GENERALE")]
class AssembleeGenerale
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_assemblee_generale", type: "integer")]
    private ?int $id = null;

    #[ORM\Column(name: "date_assemblee_generale", type: "datetime")]
    private ?\DateTimeInterface $date = null;


    #[ORM\Column(name: "heure_assemblee_generale", type: "time")]
    private ?\DateTimeInterface $heure = null;

    #[ORM\ManyToOne(targetEntity: Copropriete::class)]
    #[ORM\JoinColumn(name: "id_copropriete", referencedColumnName: "id_copropriete")]
    private ?Copropriete $copropriete = null;

    #[ORM\Column]
    private bool $ouverte = false;

    #[ORM\OneToMany(mappedBy: 'assembleeGenerale', targetEntity: Question::class, orphanRemoval: true)]
private Collection $questions;

#[ORM\OneToMany(mappedBy: 'assemblee', targetEntity: Participation::class, orphanRemoval: true)]
private Collection $participations;

#[ORM\OneToMany(mappedBy: 'assemblee', targetEntity: Vote::class, orphanRemoval: true)]
private Collection $votes;

public function __construct()
{
    $this->questions = new ArrayCollection();
    $this->participations = new ArrayCollection();
    $this->votes = new ArrayCollection();
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

public function getDate(): ?\DateTimeInterface
{
    return $this->date;
}

public function setDate(\DateTimeInterface $date): static
{
    $this->date = $date;
    return $this;
}

public function getHeure(): ?\DateTimeInterface
{
    return $this->heure;
}

public function setHeure(\DateTimeInterface $heure): static
{
    $this->heure = $heure;
    return $this;
}

public function getCopropriete(): ?Copropriete
{
    return $this->copropriete;
}

public function setCopropriete(Copropriete $copropriete): static
{
    $this->copropriete = $copropriete;
    return $this;
}

public function isOuverte(): bool
{
    return $this->ouverte;
}

public function setOuverte(bool $ouverte): self
{
    $this->ouverte = $ouverte;

    return $this;
}

public function getQuestions(): Collection
{
    return $this->questions;
}

public function getParticipations(): Collection
{
    return $this->participations;
}

public function getVotes(): Collection
{
    return $this->votes;
}

public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->setAssembleeGenerale($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->questions->removeElement($question)) {
            if ($question->getAssembleeGenerale() === $this) {
                $question->setAssembleeGenerale(null);
            }
        }

        return $this;
    }




}
