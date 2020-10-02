<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 */
class Question
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
    private $nbreChoix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numero;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $baremeQuestion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbreChoix(): ?int
    {
        return $this->nbreChoix;
    }

    public function setNbreChoix(?int $nbreChoix): self
    {
        $this->nbreChoix = $nbreChoix;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getBaremeQuestion(): ?int
    {
        return $this->baremeQuestion;
    }

    public function setBaremeQuestion(?int $baremeQuestion): self
    {
        $this->baremeQuestion = $baremeQuestion;

        return $this;
    }
}
