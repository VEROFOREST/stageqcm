<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\ReponseEleve;
use App\Entity\User;
use App\Repository\QuestionnaireRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseEleveRepository;
use App\Repository\ReponseProfRepository;
use App\Repository\SessionRepository;
use Doctrine\ORM\Query\AST\Functions\LengthFunction;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Length;

class ReponseEleveController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/reponse/eleve", name="reponse_eleve")
     */
    public function index()

    {
        // $test=$questionRepository->findAll();
       
        return $this->render('reponse_eleve/index.html.twig', [
            
            'controller_name' => 'ReponseEleveController',
        ]);
    }
    
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/reponse/eleve/new/{id}", name="reponse_eleve_new", methods={"GET","POST"})
     */
    public function new(User $user,Request $request,QuestionnaireRepository $questionnaireRepository,
     QuestionRepository $questionRepository, ReponseProfRepository $reponseProfRepository )

    {
        // recherche l'id de la session correspondant à eleve connectée
       $sessionsEleve= $user->getSessions();
        foreach ($sessionsEleve as $sessionEleve) {
           $idsession= $sessionEleve->getId();
        
        }
        
    //   recherche du questionnaire, questions et reponses correspondant à cette id, 
       $questionnaireSession = $questionnaireRepository->findOneBySession($idsession);
       $questionsQuestionnaire = $questionnaireSession->getQuestions();
    
        return $this->render('reponse_eleve/index.html.twig', [
            'user'=>$user,
            'questionnaireEleve'=>$questionnaireSession,
            'questions'=>$questionsQuestionnaire,
            
            
           'controller_name' => 'ReponseEleveController',
        ]);
    }
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/reponse/eleve/store/{id}", name="reponse_eleve_store", methods={"GET","POST"})
     */
    public function store(User $user,Request $request,QuestionnaireRepository $questionnaireRepository,
     QuestionRepository $questionRepository, ReponseProfRepository $reponseProfRepository,SessionRepository $sessionRepository )

     {  
         // recherche l'id de la session correspondant à eleve connectée
       $sessionsEleve= $user->getSessions();
        foreach ($sessionsEleve as $sessionEleve) {
           $idsession= $sessionEleve->getId();
        
        }
        
    //   recherche du questionnaire, questions et reponses correspondant à cette id, 
       $questionnaireSession = $questionnaireRepository->findOneBySession($idsession);
       $questionsQuestionnaire = $questionnaireSession->getQuestions();
    
        //  $reponseEleve = new ReponseEleve();
        $sessionEleve=$request->get('session');
        $idSessionEleve = $sessionRepository->findOneById(['id'=>$sessionEleve]);
        

        $question = $request->get('question');
        
        $reponsesform =$request->get('reponseEleve',[]);
        
        // dd($request->get('reponseEleve',[]));
        // dd($reponsesform);
        
        $entityManager = $this->getDoctrine()->getManager();
        foreach ($reponsesform as $quest=>$ReponseChoice) {
        
             $reponseEleve = new ReponseEleve();
        
             $reponseEleve->setSession($idSessionEleve);
             $reponseEleve->setUser($user);
            //  dd($ReponseChoice);
             $idReponseChoixProf = $reponseProfRepository->findOneById($ReponseChoice);
              
            
             $reponseEleve->setReponseProf($idReponseChoixProf);
               
           
              //   on va rechercher la réponse juste du prof
            //   dd($idReponseChoixProf);


            $reponseProfOk = $idReponseChoixProf->getIsJust();
            // dump($reponseProfOk);
            // dump($reponseProfOk);

            // si cette réponse est notée comme fausse on set la réponse de l'éleve à fausse et inversement

            if (!$reponseProfOk){
                $reponseEleve->setIsJust($reponseProfOk);
                
            }
            else $reponseEleve->setIsJust($reponseProfOk);
            // si la réponse est juste, on lui applique le bareme de la question sinon on met 0
            if ($reponseEleve->getIsJust() === true){
                    
                    $notequestion=$idReponseChoixProf->getQuestion()->getBaremeQuestion();
                    // dd($idReponseChoixProf->getQuestion());
                
                $reponseEleve->setNoteQuestion($notequestion);
            }
            else $reponseEleve->setNoteQuestion(0);
            // suivant le type de réponse libre ou qcm
              $typeRep=$idReponseChoixProf->getQuestion()->getTypeReponse();
                // dd($typeRep);
                // si qcm
            if ($typeRep->getId() === 2) { 
            // on va chercher le libelle de la réponse du prof et on le remet dans la libelle reponse du prof
            $libellereponseEleve=$idReponseChoixProf->getLibelleReponse();
                // dd($libellereponseEleve);
            $reponseEleve->setReponseEleve($libellereponseEleve);  
            }
            // si réponse libre, 
            if($typeRep->getId() === 1){
            $idrep = $idReponseChoixProf->getId();
            // on va récupérer ce que l'éleve a répondu.
            $repTextarea = $request->get('reponseElevelibelle'.$idrep);
            $reponseEleve->setReponseEleve($repTextarea); 
            // unset($ReponseChoice);
            }
            $entityManager->persist($reponseEleve);
    }         
            $entityManager->flush();
        // dd($reponseEleve);
        return $this->redirectToRoute('confirmation_eleve',['id'=> $user->getId()]);
         return $this->render('reponse_eleve/index.html.twig', [
             'user'=>$user,
            'questionnaireEleve'=>$questionnaireSession,
            'questions'=>$questionsQuestionnaire,
            
            // 'reponsesEleve'=> $reponseEleve 

         ]);

     }
        /**
     * @IsGranted("ROLE_USER")
     * @Route("/reponse/eleve/confirmation/{id}", name="confirmation_eleve", methods={"GET","POST"})
     */
    public function confirm(User $user,QuestionnaireRepository $questionnaireRepository, ReponseEleveRepository $reponseEleveRepository,Question $questionRepository){

             $sessionsEleve= $user->getSessions();
        foreach ($sessionsEleve as $sessionEleve) 
        {
           $idsession= $sessionEleve->getId();
        }
        $questionnaireSession = $questionnaireRepository->findOneBySession($idsession);
        $questionsQuestionnaire = $questionnaireSession->getQuestions();
        // note totale sur les qcm
       $totalnoteQuestionQCM =0;
        foreach ($questionsQuestionnaire as $question){
        //    dd($question->getTypeReponse());
            if($question->getTypeReponse()->getId() === 2){
            $totalnoteQuestionQCM += $question->getBaremeQuestion();
            // dd($question->getBaremeQuestion());
           $reponsesProf= $question->getReponseProfs();
            }
                    
        }
     
            $reponsesEleve= $reponseEleveRepository->findBySession($idsession);

            $noteQCM=0;
    //    dd($reponsesEleve);
            $questions = [];
             foreach($reponsesEleve as $reponseEleve){
            $noteQCM += $reponseEleve->getNoteQuestion();
            $reponsesProf =$reponseEleveRepository->findBy (['reponseProf'=>$reponseEleve->getReponseProf()]);
        //    dd($reponsesProf);
            
         
            }
       
            
       

         return $this->render('reponse_eleve/confirmEnvoi.html.twig', [
             'controller_name' => 'ReponseEleveController',
             'noteQCM'=> $noteQCM,
             'notetotalQuestion'=>$totalnoteQuestionQCM,
             'questions'=>$questionsQuestionnaire,
             'reponsesEleve'=>$reponsesEleve,
             'reponsesProf'=>$reponsesProf,
            
         ]);

    }
}
