<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 24/09/2018
 * Time: 22:36
 */

// src/Controller/EditController.php
namespace App\Controller;

use App\Entity\Category;
use App\Entity\Grade;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/** @Route("/delete") **/
class DeleteController extends Controller
{
    /**
     * @Route("/grade/{id}",  name="grade_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param $id
     * @return
     */
    public function grade(Request $request, $id) {
        // 1) build the form
        /** @var @var Grade $objGrade */
        $objGrade = $this->getDoctrine()->getRepository(Grade::class)->find($id);

        if ($objGrade !== null) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($objGrade);
            $entityManager->flush();
            $this->addFlash('success', 'Votre note à bien été supprimé.');
        }

        return $this->forward('App\Controller\LeaderboardController::dashboard');
    }

    /**
     * @Route("/user/{id}",  name="user_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param $id
     * @return
     */
    public function user(Request $request, $id) {
        // 1) build the form
        /** @var @var Grade $objGrade */
        $objUser = $this->getDoctrine()->getRepository(User::class)->find($id);

        if ($objUser !== null) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($objUser);
            $entityManager->flush();
            $this->addFlash('success', 'Votre utilisateur à bien été supprimé.');
        }

        return $this->forward('App\Controller\LeaderboardController::dashboard');
    }

    /**
     * @Route("/category/{id}",  name="category_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param $id
     * @return
     */
    public function category(Request $request, $id) {
        // 1) build the form
        /** @var @var Grade $objGrade */
        $objCategory = $this->getDoctrine()->getRepository(Category::class)->find($id);

        if ($objCategory !== null) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($objCategory);
            $entityManager->flush();
            $this->addFlash('success', 'Votre category à bien été supprimé.');
        }

        return $this->forward('App\Controller\LeaderboardController::dashboard');
    }
}