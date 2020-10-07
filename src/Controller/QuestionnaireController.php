<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Entity\Question;
use App\Entity\Questionnaire;
use App\test\QuestionnaireGlobal;
use App\Entity\ReponseProf;
use App\Entity\User;
use App\Form\QuestionnaireGlobalType;
use App\Form\QuestionnaireType;
use App\Form\QuestionType;
use App\Form\ReponseProfType;
use App\Repository\MatiereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request as BrowserKitRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class QuestionnaireController extends AbstractController
{
    /**
     * @Route("/questionnaire", name="questionnaire")
     */
    public function index()
    {
        return $this->render('questionnaire/index.html.twig', [
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

        $questionnaireGlobal=(new QuestionnaireGlobal())
                ->setQuestionnaire($questionnaire)
                ->addQuestion($question)
                ->addReponseProf($reponseProf);
        
       
        
        $form=$this->createForm(QuestionnaireGlobalType::class,$questionnaireGlobal);
       
        $form->handleRequest($request);
         
        

        
        if ($form->isSubmitted() && $form->isValid()) {
            //    dd($questionnaireGlobal);      
            $entityManager = $this->getDoctrine()->getManager();
        
            $entityManager->persist($questionnaire);
            $question->setQuestionnaire($questionnaire);
            $entityManager->persist($question);
            $reponseProf->setQuestion($question);

            $entityManager->persist($reponseProf);

           
            $entityManager->flush();

        }
        return $this->render('questionnaire/index.html.twig', [
            'questionnaire'=>$questionnaire,
            'question'=>$question,
            'reponseProf'=>$reponseProf,
            'form' => $form->createView(),
            
            
        ]);
    }
}

