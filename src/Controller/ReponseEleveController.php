<?php

namespace App\Controller;

use App\Entity\ReponseEleve;
use App\Entity\User;
use App\Repository\QuestionnaireRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseProfRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



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

}
