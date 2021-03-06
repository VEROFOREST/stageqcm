<?php

namespace App\Controller;

use App\Entity\Note;
use App\Entity\User;
use App\Repository\NoteRepository;
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
     $totalnoteQuestionQCM =0;
      foreach ($questionsQuestionnaire as $question){
          if($question->getTypeReponse()->getId() === 2){
          $totalnoteQuestionQCM += $question->getBaremeQuestion();
          }
         $reponsesProf= $question->getReponseProfs();
        //   dd($reponsesProf);
                    
      }
     
        $reponsesEleve= $reponseEleveRepository->findBySession($idsession);

       $noteQCM=0;
    // dd($reponsesEleve);
        $questions = [];
        foreach($reponsesEleve as $reponseEleve){
            $noteQCM += $reponseEleve->getNoteQuestion();
            $reponsesProf =$reponseEleveRepository->findBy (['reponseProf'=>$reponseEleve->getReponseProf()]);
        // dd($reponsesProf);
            
         
        }
       
           
        return $this->render('correction/index.html.twig', [
            'controller_name' => 'CorrectionController',
            'noteQCM'=> $noteQCM,
             'notetotalQuestion'=>$totalnoteQuestionQCM,
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
        
         $notesQL =$request->get('note',[]);
        //  dd($notesQL);
          $entityManager = $this->getDoctrine()->getManager();
         foreach ($notesQL as $idRepEleve=>$noteQL) {
            //  dd((int)$noteQL);
            $note = new Note();
            
            $repEleve=$reponseEleveRepository->findOneById($idRepEleve);
            // dd((int)$noteQL);
            $note->setNoteQL((int)$noteQL);
            $note->setReponseEleve($repEleve);
            $entityManager->persist($note);
            
         }
            $entityManager->flush();
          
       
          return $this->redirectToRoute('recap_note',['id'=> $user->getId()]);  
        return $this->render('correction/index.html.twig', [
            'controller_name' => 'CorrectionController',
            
        ]);
    }
    /**
    * @Route("/correction/recap/{id}", name="recap_note")
    * @IsGranted("ROLE_PROF")
    */
    public function recapNote(User $user, Request $request, ReponseEleveRepository $reponseEleveRepository,QuestionnaireRepository $questionnaireRepository,NoteRepository $noteRepository)
    {
            $sessionsProf= $user->getSessions();
        foreach ($sessionsProf as $sessionEleve) 
        {
           $idsession= $sessionEleve->getId();
        }
        $questionnaireSession = $questionnaireRepository->findOneBySession($idsession);
        $questionsQuestionnaire = $questionnaireSession->getQuestions();
     //  note totale sur les qcm
            $totalnoteQuestionQCM =0;
            $totalnoteQuestionQL =0;
            foreach ($questionsQuestionnaire as $question){
                if($question->getTypeReponse()->getId() === 2){
                $totalnoteQuestionQCM += $question->getBaremeQuestion();
                }
                if($question->getTypeReponse()->getId() === 1){
                $totalnoteQuestionQL += $question->getBaremeQuestion();
                }
                $reponsesProf= $question->getReponseProfs();
                //   dd($reponsesProf);
                            
            }
     
            $reponsesEleve= $reponseEleveRepository->findBySession($idsession);

            $noteQCM=0;
            // dd($reponsesEleve);
                foreach($reponsesEleve as $reponseEleve){
                    $typeRep=$reponseEleve->getReponseProf()->getQuestion()->getTypeReponse()->getId();
                    // dd($typeRep);
                    if ($typeRep === 2){
                    $noteQCM += $reponseEleve->getNoteQuestion();
                    }
                                   
                }
            $noteQL=0;  
                $notesEleveQL = $noteRepository->findAll();
                foreach ($notesEleveQL as$noteEleveQL) {
                    $noteQL += $noteEleveQL->getNoteQL();
                    # code...
                }
                        // dd($notesEleveQL);
            
        return $this->render('correction/confirmNote.html.twig', [
            'controller_name' => 'CorrectionController',
            'noteQCM'=> $noteQCM,
            'noteQL'=>$noteQL,
             'notetotalQuestion'=>$totalnoteQuestionQCM,
             'notetotalQL'=>$totalnoteQuestionQL,
             'questions'=>$questionsQuestionnaire,
             'reponsesEleve'=> $reponsesEleve,
             'reponsesProf'=>$reponsesProf,
             'notesEleveQL'=>$notesEleveQL,
        ]);




    }
}