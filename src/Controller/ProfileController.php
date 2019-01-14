<?php

namespace App\Controller;

use App\Entity\Grade;
use App\Entity\User;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/** @Route("/profile") **/
class ProfileController extends Controller
{

    /**
     * @Route("/{id}", name="profile", requirements={"id"="\d+"})
     * @param $id
     * @return
     * @throws \Exception
     */
    public function index($id)
    {
        /** @var User $objUser */
        $objUser = $this->getDoctrine()->getRepository(User::class)->find($id);

        if($objUser === null) {
            throw new \Exception('User not found');
        }

        // On recupère les notes
        $grades = $this->getDoctrine()->getRepository(Grade::class)->findByUser($id);

        return $this->render('profile/index.html.twig', [
            'mainNavMember' => true,
            'grades' => $grades,
            'user' => $objUser,
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