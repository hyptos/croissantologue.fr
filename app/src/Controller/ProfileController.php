<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/profile") */
class ProfileController extends Controller
{

    /**
     * @Route("/profile")
     */
    public function index()
    {

        return $this->render('profile/index.html.twig', ['mainNavMember' => true, 'title' => 'Espace Membre']);
    }

}