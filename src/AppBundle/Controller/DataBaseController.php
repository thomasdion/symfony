<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; 
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Users;

class DataBaseController extends Controller {
	
/**
 * @Route("/database", name="database");
*/	
function databaseAction(Request $request) {
	
	try {
		$em = $this->getDoctrine()->getManager();
		$users = new Users();
		//$users->setUserID(rand(1,300));
		$users->setLogin("sdfs");
		$users->setVisitWith("sf");
		$em->persist($users);
		$em->flash();	
		return $this->render('dataBase/dataBase.html.twig');
	} catch(Doctrine\ORM\ORMException $e) {
		return $this->redirectToRoute('error');
	}	
}
}		
?>
