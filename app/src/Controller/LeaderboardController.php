<?php /** @noinspection ALL */

// src/Controller/LeaderboardController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LeaderboardController extends AbstractController
{
    public function number()
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    /**
    * @Route("/", name="welcome")
    */
    public function home()
    {
        return $this->render('homepage.html.twig');
    }
}