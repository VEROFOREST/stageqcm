<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Entity\Question;
use App\Entity\Questionnaire;

use App\Entity\ReponseProf;

use App\Entity\User;

use App\Form\QuestionnaireType;

use App\Repository\MatiereRepository;
use App\Repository\TypeReponseRepository;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request as BrowserKitRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;




class QuestionnaireController extends AbstractController
{
    /**
     * @IsGranted("ROLE_PROF")
     * @Route("/questionnaire", name="questionnaire")
     */
    public function index(MatiereRepository $matiereRepository, TypeReponseRepository $typeReponseRepository)
    {
        
        

        return $this->render('questionnaire/index.html.twig', [
            'matiere'=>$matiereRepository->findAll(),
            'typeRep'=>$typeReponseRepository->findAll(),
            'controller_name' => 'QuestionnaireController',
        ]);
    }
    /**
     *  
     * @IsGranted("ROLE_PROF")
     *
     * @Route("/questionnaire/new/{id}", name="questionnaire_new")
     */
    public function new( User $user,Request $request,MatiereRepository $matiereRepository,UserRepository $userRepository)
    {   
    //  obtenir les matieres et sessions qui concernent le prof connectés
         
      $matieresProf= $user->getMatieres();
      $sessionsProf=$user->getSessions();
    

        $questionnaire =new Questionnaire();
        $question =new Question();
        $reponseProf= new ReponseProf();
        
    //    permet de passer les matieres pour le formtype et les sessions pour le formtype qui est en choices
       
        $form=$this->createForm(QuestionnaireType::class,$questionnaire,
        array('matieresProf' => $matieresProf,
                'sessionsProf'=>$sessionsProf));
       
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($questionnaire);
            $entityManager->flush();

        }

        // return $this->redirectToRoute('home',['id'=> $user->getId()]);
        return $this->render('questionnaire/index.html.twig', [
          
            // 'questionnaire'=>$questionnaire,
            // 'question'=>$question,
            // 'reponseProf'=>$reponseProf,
            'form' => $form->createView(), // cela construit la view formulaire d'apres le FormType
            
            
        ]);
       
    }
}

