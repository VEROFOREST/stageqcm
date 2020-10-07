<?php

namespace App\Entity;

use App\Repository\ReponseProfRepository;
use App\test\QuestionnaireGlobal;
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

    /**
     * @ORM\ManyToOne(targetEntity=Question::class)
     */
    private $question;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $libelleReponse;

    // /**
    //  * @ORM\ManyToOne(targetEntity=QuestionnaireGlobal::class, inversedBy="reponseProf")
    //  * @ORM\JoinColumn(nullable=false)
    //  */
    private $questionnaireGlobal;

    public function getId(): ?int
    {
        return $this->id;
    }
  public function setId(): self
    {	
    $id = md5(random_bytes(50));
    $this->id = $id;

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

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getLibelleReponse(): ?string
    {
        return $this->libelleReponse;
    }

    public function setLibelleReponse(?string $libelleReponse): self
    {
        $this->libelleReponse = $libelleReponse;

        return $this;
    }

    public function getQuestionnaireGlobal(): ?QuestionnaireGlobal
    {
        return $this->questionnaireGlobal;
    }

    public function setQuestionnaireGlobal(?QuestionnaireGlobal $questionnaireGlobal): self
    {
        $this->questionnaireGlobal = $questionnaireGlobal;

        return $this;
    }
}
