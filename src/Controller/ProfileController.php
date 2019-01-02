<?php

namespace App\Controller;

use App\Entity\Grade;
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
        $grades = $this->getDoctrine()->getRepository(Grade::class)->findByUser(1);


        return $this->render('profile/index.html.twig', [
            'mainNavMember' => true,
            'grades' => $grades,
            'title' => 'My profile'
        ]);
    }

    /**
     * @Route("/admin")
     */
    public function admin()
    {
        return $this->render('profile/admin.html.twig', ['mainNavMember' => true, 'title' => 'Espace Admin']);
    }
}