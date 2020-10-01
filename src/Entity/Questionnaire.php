<?php

namespace App\Entity;

use App\Repository\QuestionnaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionnaireRepository::class)
 */
class Questionnaire
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
    private $nbreQuestion;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $startedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $stoppedAt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $baremeTot;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbreQuestion(): ?int
    {
        return $this->nbreQuestion;
    }

    public function setNbreQuestion(?int $nbreQuestion): self
    {
        $this->nbreQuestion = $nbreQuestion;

        return $this;
    }

    public function getStartedAt(): ?\DateTimeInterface
    {
        return $this->startedAt;
    }

    public function setStartedAt(?\DateTimeInterface $startedAt): self
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getStoppedAt(): ?\DateTimeInterface
    {
        return $this->stoppedAt;
    }

    public function setStoppedAt(?\DateTimeInterface $stoppedAt): self
    {
        $this->stoppedAt = $stoppedAt;

        return $this;
    }

    public function getBaremeTot(): ?int
    {
        return $this->baremeTot;
    }

    public function setBaremeTot(?int $baremeTot): self
    {
        $this->baremeTot = $baremeTot;

        return $this;
    }
}
