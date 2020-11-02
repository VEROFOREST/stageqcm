<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\QuestionnaireRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseEleveRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class CorrectionController extends AbstractController
{
    /**
     * @Route("/correction", name="correction")
     */
    public function index()
    {
        return $this->render('correction/index.html.twig', [
            'controller_name' => 'CorrectionController',
        ]);
    }
    /**
    * @Route("/correction/{id}", name="correction_new")
    * @IsGranted("ROLE_PROF")
    */
    public function correctionNew(User $user, ReponseEleveRepository $reponseEleveRepository,QuestionnaireRepository $questionnaireRepository)
    {
        $sessionsProf= $user->getSessions();
        foreach ($sessionsProf as $sessionEleve) 
        {
           $idsession= $sessionEleve->getId();
        }
        $questionnaireSession = $questionnaireRepository->findOneBySession($idsession);
        $questionsQuestionnaire = $questionnaireSession->getQuestions();
     //  note totale sur les qcm
     $totalnoteQuestion =0;
      foreach ($questionsQuestionnaire as $question){
          $totalnoteQuestion += $question->getBaremeQuestion();
         $reponsesProf= $question->getReponseProfs();
        //   dd($reponsesProf);
                    
      }
     
        $reponsesEleve= $reponseEleveRepository->findBySession($idsession);

       $noteQCM=0;
    // dd($reponsesEleve);
        $questions = [];
        foreach($reponsesEleve as $reponseEleve){
            $noteQCM += $reponseEleve->getNoteQuestion();
            $reponsesProf =$reponseEleveRepository->findBy (                         ['reponseProf'=>$reponseEleve->getReponseProf()]);
        // dd($reponsesProf);
            
         
        }
       
           
        return $this->render('correction/index.html.twig', [
            'controller_name' => 'CorrectionController',
            'noteQCM'=> $noteQCM,
             'notetotalQuestion'=>$totalnoteQuestion,
             'questions'=>$questionsQuestionnaire,
             'reponsesEleve'=> $reponsesEleve,
             'reponsesProf'=>$reponsesProf,
        ]);
    }
}