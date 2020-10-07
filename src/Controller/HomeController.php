<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home/{id}", name="home")
     */
    public function index(user $user) 
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'user'=>$user,
        ]);
    }
}
