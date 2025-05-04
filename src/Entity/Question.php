<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "QUESTION")]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_question", type: "integer")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: AssembleeGenerale::class)]
    #[ORM\JoinColumn(name: "id_assemblee_generale", referencedColumnName: "id_assemblee_generale")]
    private ?AssembleeGenerale $assemblee = null;
}
