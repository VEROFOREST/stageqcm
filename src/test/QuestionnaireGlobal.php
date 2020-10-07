<?php

namespace App\test;

use App\Entity\Question;
use App\Entity\Questionnaire;
use App\Entity\ReponseProf;
use App\Repository\QuestionnaireGlobalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;



class QuestionnaireGlobal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    
    private $questionnaire;

    private $question;

    
    private $reponseProf;

    public function __construct()
    {
        $this->question = new ArrayCollection();
        $this->reponseProf = new ArrayCollection();
    }

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

    public function getQuestionnaire(): ?Questionnaire
    {
        return $this->questionnaire;
    }

    public function setQuestionnaire(Questionnaire $questionnaire): self
    {
        $this->questionnaire = $questionnaire;

        return $this;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestion(): Collection
    {
        return $this->question;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->question->contains($question)) {
            $this->question[] = $question;
            $question->setQuestionnaireGlobal($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->question->contains($question)) {
            $this->question->removeElement($question);
            // set the owning side to null (unless already changed)
            if ($question->getQuestionnaireGlobal() === $this) {
                $question->setQuestionnaireGlobal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ReponseProf[]
     */
    public function getReponseProf(): Collection
    {
        return $this->reponseProf;
    }

    public function addReponseProf(ReponseProf $reponseProf): self
    {
        if (!$this->reponseProf->contains($reponseProf)) {
            $this->reponseProf[] = $reponseProf;
            $reponseProf->setQuestionnaireGlobal($this);
        }

        return $this;
    }

    public function removeReponseProf(ReponseProf $reponseProf): self
    {
        if ($this->reponseProf->contains($reponseProf)) {
            $this->reponseProf->removeElement($reponseProf);
            // set the owning side to null (unless already changed)
            if ($reponseProf->getQuestionnaireGlobal() === $this) {
                $reponseProf->setQuestionnaireGlobal(null);
            }
        }

        return $this;
    }
}
