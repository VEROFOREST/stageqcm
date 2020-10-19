<?php

namespace App\Controller;

use App\Entity\ReponseEleve;
use App\Entity\User;
use App\Repository\QuestionnaireRepository;
use App\Repository\QuestionRepository;
use App\Repository\ReponseProfRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReponseEleveController extends AbstractController
{
    /**
     * @Route("/reponse/eleve", name="reponse_eleve")
     */
    public function index()

    {
        // $test=$questionRepository->findAll();
        // dd($test);
        return $this->render('reponse_eleve/index.html.twig', [
            
            'controller_name' => 'ReponseEleveController',
        ]);
    }
    
    /**
     * @Route("/reponse/eleve/new/{id}", name="reponse_eleve_new")
     */
    public function new(User $user,Request $request,QuestionnaireRepository $questionnaireRepository, QuestionRepository $questionRepository, ReponseProfRepository $reponseProfRepository )

    {
       $test= $user->getSessions();
       dd($test);
       


      
        return $this->render('reponse_eleve/index.html.twig', [
           'controller_name' => 'ReponseEleveController',
        ]);
    }

}
