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
    #[ORM\JoinColumn(name: "id_coproprietaire", referencedColumnName: "id_coproprietaire", nullable: true)]
    private ?Coproprietaire $participant = null;

    #[ORM\ManyToOne(targetEntity: Coproprietaire::class)]
    #[ORM\JoinColumn(name: "id_coproprietaire_1", referencedColumnName: "id_coproprietaire")]
    private ?Coproprietaire $mandataire = null;

    #[ORM\ManyToOne(targetEntity: AssembleeGenerale::class)]
    #[ORM\JoinColumn(name: "id_assemblee_generale", referencedColumnName: "id_assemblee_generale")]
    private ?AssembleeGenerale $assemblee = null;
}
