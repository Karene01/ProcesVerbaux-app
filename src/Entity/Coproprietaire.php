<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "COPROPRIETAIRE")]
class Coproprietaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_coproprietaire", type: "integer")]
    private ?int $id = null;

    #[ORM\Column(name: "nom_coproprietaire", type: "string", length: 255)]
    private ?string $nom = null;

    #[ORM\Column(name: "prenom_coproprietaire", type: "string", length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(name: "domicile_coproprietaire", type: "string", length: 255)]
    private ?string $domicile = null;

    #[ORM\Column(name: "quote_part_coproprietaire", type: "float")]
    private ?float $quotePart = null;

    #[ORM\ManyToOne(targetEntity: Copropriete::class)]
    #[ORM\JoinColumn(name: "id_copropriete", referencedColumnName: "id_copropriete")]
    private ?Copropriete $copropriete = null;

    // Getters et setters à compléter si tu veux
}
