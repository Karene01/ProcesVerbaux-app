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

    #[ORM\Column(name: "type_vote", type: "string", length: 10)]
    private ?string $typeVote = null; // valeurs attendues : 'pour', 'contre', 'abstention'

    #[ORM\Column(name: "poids_vote", type: "float")]
    private ?float $poids = null;

    #[ORM\ManyToOne(targetEntity: Coproprietaire::class)]
    #[ORM\JoinColumn(name: "id_coproprietaire", referencedColumnName: "id_coproprietaire")]
    private ?Coproprietaire $votant = null;

    #[ORM\ManyToOne(targetEntity: Question::class)]
    #[ORM\JoinColumn(name: "id_question", referencedColumnName: "id_question")]
    private ?Question $question = null;
}
