<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; 

class FirstController extends Controller {

/**
  * @Route("/", name="homepage");
*/
	public function firstAction(Request $request) {
		return $this->render('first/index.html.twig');
	}
}		
?>
