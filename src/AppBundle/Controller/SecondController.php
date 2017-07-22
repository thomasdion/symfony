<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; 

class SecondController extends Controller {
	
/**
 *@Route("/second", name="second"); 
 */

public function secondAction(Request $request) {
		
	return $this->render('first/second.html.twig');
 }

}
?>
