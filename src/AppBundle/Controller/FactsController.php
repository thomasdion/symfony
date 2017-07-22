<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; 

class FactsController extends Controller {
	
/**
 *@Route("/facts",name = "facts"); 
*/	
	
public function factsAction(Request $request) {
	
	return $this->render('first/facts.html.twig');
 }		
}

?>
