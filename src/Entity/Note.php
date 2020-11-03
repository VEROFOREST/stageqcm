<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    
    /**
     * @ORM\OneToOne(targetEntity=ReponseEleve::class, cascade={"persist", "remove"})
     */
    private $reponseEleve;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteQL;

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getReponseEleve(): ?ReponseEleve
    {
        return $this->reponseEleve;
    }

    public function setReponseEleve(?ReponseEleve $reponseEleve): self
    {
        $this->reponseEleve = $reponseEleve;

        return $this;
    }

    public function getNoteQL(): ?int
    {
        return $this->noteQL;
    }

    public function setNoteQL(?int $noteQL): self
    {
        $this->noteQL = $noteQL;

        return $this;
    }
}
