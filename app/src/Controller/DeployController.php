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
        chdir('/home/git/croissantologue.fr/prod/');
        //make sure to make the shell file executeable first before running the shell_exec function
        system ('git pull /home/git/croissantologue.fr/prod/ 2>&1', $output);
        chdir($old_path);
   
	var_dump($output);exit; 
	return new Response(
            '<html><body> '.$output.'</body></html>'
        );

     }
}
