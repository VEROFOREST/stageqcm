<?php

namespace App\Controller;

use App\Entity\Note;
use App\Entity\User;
use App\Repository\QuestionnaireRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseEleveRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    /**
    * @Route("/correction/store/{id}", name="correction_store")
    * @IsGranted("ROLE_PROF")
    */
    public function correctionStore(User $user, Request $request, ReponseEleveRepository $reponseEleveRepository,QuestionnaireRepository $questionnaireRepository)
    {
          $idReps =$request->get('reponseHidden',[]);
        //  dd($idReps);
         foreach($idReps as $idRep){
            //  dd($idRep);
         }
         $notesQL =$request->get('note',[]);
        //  dd($notesQL);
          $entityManager = $this->getDoctrine()->getManager();
         foreach ($notesQL as $idRepEleve=>$noteQL) {
            //  dd((int)$noteQL);
            $note = new Note();
            $repEleve=$reponseEleveRepository->findOneById($idRepEleve);
            // dd($repEleve);
            $note->setNoteQL((int)$noteQL);
            $note->setReponseEleve($repEleve);
            $entityManager->persist($note);
            
         }
            $entityManager->flush();
            // dd($note);
       
          return $this->redirectToRoute('recap_note',['id'=> $user->getId()]);  
        return $this->render('correction/index.html.twig', [
            'controller_name' => 'CorrectionController',
            
        ]);
    }
    /**
    * @Route("/correction/recap/{id}", name="recap_note")
    * @IsGranted("ROLE_PROF")
    */
//     public function correctionStore(User $user, Request $request, ReponseEleveRepository $reponseEleveRepository,QuestionnaireRepository $questionnaireRepository)
//     {
//     }
}