<?php

// src/Controller/LeaderboardController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LeaderboardController extends AbstractController
{
    /**
    * @Route("/", name="welcome")
    */
    public function home()
    {
        return $this->render('homepage.html.twig');
    }

    /**
     * @Route("/dashboard", name="welcome")
     */
    public function dashboard()
    {
        return $this->render('homepage.html.twig');
    }
}