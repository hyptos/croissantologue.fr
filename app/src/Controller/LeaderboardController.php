<?php

// src/Controller/LeaderboardController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;

class LeaderboardController extends AbstractController
{
    /**
    * @Route("/", name="welcome")
    */
    public function home()
    {

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('homepage.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/dashboard", name="welcome")
     */
    public function dashboard()
    {
        return $this->render('homepage.html.twig');
    }
}