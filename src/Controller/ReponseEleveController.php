<?php

namespace App\Controller;

use App\Entity\ReponseEleve;
use App\Entity\User;
use App\Repository\QuestionnaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReponseEleveController extends AbstractController
{
    /**
     * @Route("/reponse/eleve", name="reponse_eleve")
     */
    public function index(QuestionnaireRepository $questionnaireRepository)

    {
        
        return $this->render('reponse_eleve/index.html.twig', [
            'questionnaire' => $questionnaireRepository->findAll(),
            'controller_name' => 'ReponseEleveController',
        ]);
    }
    
    /**
     * @Route("/reponse/eleve/new/{id}", name="reponse_eleve_new")
     */
    public function new(User $user,Request $request )

    {

      
        return $this->render('reponse_eleve/_form.html.twig', [
            
            'controller_name' => 'ReponseEleveController',
        ]);
    }

}
