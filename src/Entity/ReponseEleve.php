<?php

namespace App\Entity;

use App\Repository\ReponseEleveRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReponseEleveRepository::class)
 */
class ReponseEleve
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $reponseEleve;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isJust;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteQuestion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReponseEleve(): ?string
    {
        return $this->reponseEleve;
    }

    public function setReponseEleve(?string $reponseEleve): self
    {
        $this->reponseEleve = $reponseEleve;

        return $this;
    }

    public function getIsJust(): ?bool
    {
        return $this->isJust;
    }

    public function setIsJust(?bool $isJust): self
    {
        $this->isJust = $isJust;

        return $this;
    }

    public function getNoteQuestion(): ?int
    {
        return $this->noteQuestion;
    }

    public function setNoteQuestion(?int $noteQuestion): self
    {
        $this->noteQuestion = $noteQuestion;

        return $this;
    }
}
