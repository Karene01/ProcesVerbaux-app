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

    public function getId(): ?int
{
    return $this->id;
}

public function setId(int $id): static
{
    $this->id = $id;
    return $this;
}

public function getNom(): ?string
{
    return $this->nom;
}

public function setNom(string $nom): static
{
    $this->nom = $nom;
    return $this;
}

public function getPrenom(): ?string
{
    return $this->prenom;
}

public function setPrenom(string $prenom): static
{
    $this->prenom = $prenom;
    return $this;
}

public function getDomicile(): ?string
{
    return $this->domicile;
}

public function setDomicile(string $domicile): static
{
    $this->domicile = $domicile;
    return $this;
}

public function getQuotePart(): ?float
{
    return $this->quotePart;
}

public function setQuotePart(float $quotePart): static
{
    $this->quotePart = $quotePart;
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


}
