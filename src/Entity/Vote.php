<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "VOTE")]
class Vote
{
    #[ORM\Id]
    #[ORM\Column(name: "id_vote", type: "string")]
    private ?string $id = null;

    #[ORM\Column(name: "valeur_vote", type: "string", length: 20)]
    private ?string $valeurVote = null; // valeurs attendues : 'Pour', 'Contre', 'Abstention'

    #[ORM\ManyToOne(targetEntity: Question::class)]
    #[ORM\JoinColumn(name: "id_question", referencedColumnName: "id_question")]
    private ?Question $question = null;

    #[ORM\ManyToOne(targetEntity: Participation::class)]
    #[ORM\JoinColumn(name: "id_participation", referencedColumnName: "id_participation")]
    private ?Participation $participation = null;

    // Ajoute ici des getters/setters si nécessaire
}
