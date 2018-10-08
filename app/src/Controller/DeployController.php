<?php

// src/Controller/DeployController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeployController extends AbstractController
{
    /**
    * @Route("/deploy", name="deploy")
    */
    public function index()
    {
        $old_path = getcwd();
        chdir('/home/git/croissantologue.fr/');
        //make sure to make the shell file executeable first before running the shell_exec function
        $output = shell_exec('./deploy.sh');
        chdir($old_path);
    
	return new Response(
            '<html><body> '.$output.'</body></html>'
        );

     }
}
