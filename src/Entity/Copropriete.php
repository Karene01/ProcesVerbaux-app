<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "COPROPRIETE")]
class Copropriete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_copropriete", type: "integer")]
    private ?int $id = null;

    #[ORM\Column(name: "nom_copropriete", type: "string", length: 255)]
    private ?string $nomCopropriete = null;

    #[ORM\Column(name: "adresse_copropriete", type: "string", length: 255)]
    private ?string $adresseCopropriete = null;

    #[ORM\Column(name: "tantieme_copropriete", type: "integer")]
    private ?int $tantiemeCopropriete = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCopropriete(): ?string
    {
        return $this->nomCopropriete;
    }

    public function setNomCopropriete(string $nom): static
    {
        $this->nomCopropriete = $nom;
        return $this;
    }

    public function getAdresseCopropriete(): ?string
    {
        return $this->adresseCopropriete;
    }

    public function setAdresseCopropriete(string $adresse): static
    {
        $this->adresseCopropriete = $adresse;
        return $this;
    }

    public function getTantiemeCopropriete(): ?int
    {
        return $this->tantiemeCopropriete;
    }

    public function setTantiemeCopropriete(int $tantieme): static
    {
        $this->tantiemeCopropriete = $tantieme;
        return $this;
    }
}
