<?php

namespace App\Entity;

use App\Repository\ReponseProfRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReponseProfRepository::class)
 */
class ReponseProf
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isJust;

    public function getId(): ?int
    {
        return $this->id;
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
}
