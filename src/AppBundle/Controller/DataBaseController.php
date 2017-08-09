<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; 
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Service\DBaseApi;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;

class DataBaseController extends Controller {
	
/**
 * @Route("/database", name="database");
*/	
function databaseAction(Request $request) {

		return $this->render('dataBase/dataBase.html.twig');
}

/**
 * @Route("/database/insert", name="insert");
 */
function insertRecordAction(Request $request, DBaseApi $dbApi) {
	
		$user = new User();
		$form = $this->createForm(UserType::class, $user);				
		$form->handleRequest($request);		
		if($form->isSubmitted() && $form->isValid()) {
				$user = $form->getData();
				//$dbApi->InsertUser($user);
				try {
					$em = $this->getDoctrine()->getManager();
					$em->persist($user);
					$em->flush();	
				} catch(Doctrine\ORM\ORMException $e) {
					return $this->redirectToRoute('error');
				}	
				return $this->render('dataBase/success.html.twig', array("insert"=>"User added"));
			
		}		
		return $this->render('dataBase/insert.html.twig', array("form"=>$form->createView()));
}
}		
?>
