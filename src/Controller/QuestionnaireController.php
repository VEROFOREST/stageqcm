<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Entity\Question;
use App\Entity\Questionnaire;

use App\Entity\ReponseProf;
use App\Entity\TypeReponse;
use App\Entity\User;

use App\Form\QuestionnaireType;

use App\Repository\MatiereRepository;
use App\Repository\TypeReponseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request as BrowserKitRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class QuestionnaireController extends AbstractController
{
    /**
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
     * @Route("/questionnaire/new/{id}", name="questionnaire_new")
     */
    public function new( User $user,Request $request,MatiereRepository $matiereRepository)
    {
        $questionnaire =new Questionnaire();
        $question =new Question();
        $reponseProf= new ReponseProf();
        
       
       
        $form=$this->createForm(QuestionnaireType::class,$questionnaire);
       
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            //    dd($questionnaireGlobal);      
           
            $entityManager = $this->getDoctrine()->getManager();
        
            foreach($questionnaire->getQuestions() as $question){
                $questionnaire->addQuestion($question);
                $entityManager->persist($question);

            }
            foreach($question->getReponseProfs() as $reponseProf){
                $question->addReponseProf($reponseProf);
                $entityManager->persist($reponseProf);
            }
            $entityManager->persist($questionnaire);
           
            
             
             
           
            $entityManager->flush();

        }

        //  $test=  $question->getReponseProfs();
        //     dd($test);
        //  dd( $questionnaireGlobal);
        return $this->render('questionnaire/index.html.twig', [
            'questionnaire'=>$questionnaire,
            'question'=>$question,
            'reponseProf'=>$reponseProf,
            'form' => $form->createView(), // cela construit la view de ton formulaire d'apres le FormType
            
            
        ]);
       
    }
}

