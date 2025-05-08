<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
}
