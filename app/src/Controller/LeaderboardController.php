<?php /** @noinspection ALL */

// src/Controller/LeaderboardController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class LeaderboardController
{
    public function number()
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    public function home()
    {
        return new Response(
            '<html><body><h1>Welcome</h1></body></html>'
        );
    }
}