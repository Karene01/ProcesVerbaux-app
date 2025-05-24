<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "PARTICIPATION")]
class Participation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_participation", type: "integer")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Coproprietaire::class)]
    #[ORM\JoinColumn(name: "id_participant", referencedColumnName: "id_coproprietaire", nullable: true)]
    private ?Coproprietaire $participant = null;

    #[ORM\ManyToOne(targetEntity: Coproprietaire::class)]
    #[ORM\JoinColumn(name: "id_mandataire", referencedColumnName: "id_coproprietaire", nullable: true)]
    private ?Coproprietaire $mandataire = null;

    #[ORM\ManyToOne(targetEntity: AssembleeGenerale::class, inversedBy: "participations")]
    #[ORM\JoinColumn(name: "id_assemblee_generale", referencedColumnName: "id_assemblee_generale")]
    private ?AssembleeGenerale $assemblee = null;

    #[ORM\Column(name: "present", type: "boolean", options: ["default" => false])]
    private bool $present = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getParticipant(): ?Coproprietaire
    {
        return $this->participant;
    }

    public function setParticipant(?Coproprietaire $participant): static
    {
        $this->participant = $participant;
        return $this;
    }

    public function getMandataire(): ?Coproprietaire
    {
        return $this->mandataire;
    }

    public function setMandataire(?Coproprietaire $mandataire): static
    {
        if ($this->present && $mandataire !== null) {
            throw new \LogicException('Un participant présent ne peut pas avoir de mandataire');
        }
        $this->mandataire = $mandataire;
        return $this;
    }

    public function getAssembleeGenerale(): ?AssembleeGenerale
    {
        return $this->assemblee;
    }

    public function setAssembleeGenerale(AssembleeGenerale $assemblee): static
    {
        $this->assemblee = $assemblee;
        return $this;
    }

    public function isPresent(): bool
    {
        return $this->present;
    }

    public function setPresent(bool $present): static
    {
        if ($present && $this->mandataire !== null) {
            throw new \LogicException('Un participant présent ne peut pas avoir de mandataire');
        }
        $this->present = $present;
        return $this;
    }
}