<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 24/09/2018
 * Time: 22:36
 */

// src/Controller/EditController.php
namespace App\Controller;

use App\Form\GradeType;
use App\Entity\Grade;
use App\Repository\GradeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Security;


/** @Route("/edit") **/
class EditController extends Controller
{
    private $user = null;

    public function __construct(Security $security)
    {
        $this->user = $security->getUser();
    }


    /**
     * @Route("/grade/{id}",  name="grade_edit", requirements={"id"="\d+"})
     * @param Request $request
     * @param $id
     * @return
     */
    public function grade(Request $request, $id) {
        // 1) build the form
        $objGrade = $this->getDoctrine()->getRepository(Grade::class)->find($id);
        $form = $this->createForm(GradeType::class, $objGrade);

        if ($objGrade->getUser() !== $this->user) {
            return $this->render(
                'security/403.html.twig'
            );
        }

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($objGrade);
            $entityManager->flush();
            $this->addFlash('success', 'Votre note à bien été enregistré.');
        }

        return $this->render(
            'edit/edit.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/event/{id}",  name="event_edit", requirements={"id"="\d+"})
     * @param Request $request
     * @param $id
     * @return
     */
    public function event(Request $request, $id) {
        // 1) build the form
        $objEvent = $this->getDoctrine()->getRepository(Event::class)->find($id);
        $form = $this->createForm(EventType::class, $objEvent);

        if ($objEvent->getUser() !== $this->user) {
            return $this->render(
                'security/403.html.twig'
            );
        }

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($objEvent);
            $entityManager->flush();
            $this->addFlash('success', 'Votre event à bien été enregistré.');
        }

        return $this->render(
            'edit/edit.html.twig',
            array('form' => $form->createView())
        );
    }

    public function user(Request $request) {

    }
}