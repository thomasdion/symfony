<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Users;

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
function insertRecordAction(Request $request) {
	
	
		$form = $this->createFormBuilder()
				->add('login',TextType::class)
				->add('visitwith',TextType::class)
				->add('insert', SubmitType::class, array('label' => 'Insert Record'))
				->getForm();	
				
		return $this->render('dataBase/insert.html.twig', array("form"=>$form->createView()));
}
}		
?>
