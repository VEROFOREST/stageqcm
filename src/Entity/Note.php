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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteTotale;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNoteTotale(): ?int
    {
        return $this->noteTotale;
    }

    public function setNoteTotale(?int $noteTotale): self
    {
        $this->noteTotale = $noteTotale;

        return $this;
    }
}
