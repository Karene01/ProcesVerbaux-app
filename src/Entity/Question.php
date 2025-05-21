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

public function getAssemblee(): ?AssembleeGenerale
{
    return $this->assemblee;
}

public function setAssemblee(AssembleeGenerale $assemblee): static
{
    $this->assemblee = $assemblee;
    return $this;
}

}
