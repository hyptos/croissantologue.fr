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
	// The commands
	$commands = array(
		'echo $PWD',
		'whoami',
		'git pull /home/git/croissantologue.fr/',
		'git status',
		'composer install /home/git/croissantologue.fr/app/',
	);
	// Run the commands for output
	$output = '';
	foreach($commands AS $command){
		// Run it
		$tmp = shell_exec($command);
		// Output
		$output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span><br />";
		$output .= htmlentities(trim($tmp)) . "<br />";
	}
    
	return new Response(
            '<html><body> '.$output.'</body></html>'
        );

     }
}
