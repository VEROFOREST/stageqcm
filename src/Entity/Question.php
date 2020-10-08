<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use App\test\QuestionnaireGlobal;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToOne(targetEntity=Questionnaire::class)
     */
    private $questionnaire;

    /**
     * @ORM\ManyToOne(targetEntity=TypeReponse::class)
     */
    private $typeReponse;

    /**
     * @ORM\OneToMany(targetEntity=ReponseProf::class, mappedBy="question")
     */
    private $reponseProfs;

    public function __construct()
    {
        $this->reponseProfs = new ArrayCollection();
    }

    // /**
    //  * @ORM\ManyToOne(targetEntity=QuestionnaireGlobal::class, inversedBy="question")
    //  * @ORM\JoinColumn(nullable=false)
    //  */
    // private $questionnaireGlobal;

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

    public function getQuestionnaire(): ?Questionnaire
    {
        return $this->questionnaire;
    }

    public function setQuestionnaire(?Questionnaire $questionnaire): self
    {
        $this->questionnaire = $questionnaire;

        return $this;
    }

    public function getTypeReponse(): ?TypeReponse
    {
        return $this->typeReponse;
    }

    public function setTypeReponse(?TypeReponse $typeReponse): self
    {
        $this->typeReponse = $typeReponse;

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

    /**
     * @return Collection|ReponseProf[]
     */
    public function getReponseProfs(): Collection
    {
        return $this->reponseProfs;
    }

    public function addReponseProf(ReponseProf $reponseProf): self
    {
        if (!$this->reponseProfs->contains($reponseProf)) {
            $this->reponseProfs[] = $reponseProf;
            $reponseProf->setQuestion($this);
        }

        return $this;
    }

    public function removeReponseProf(ReponseProf $reponseProf): self
    {
        if ($this->reponseProfs->contains($reponseProf)) {
            $this->reponseProfs->removeElement($reponseProf);
            // set the owning side to null (unless already changed)
            if ($reponseProf->getQuestion() === $this) {
                $reponseProf->setQuestion(null);
            }
        }

        return $this;
    }
}
