<?php

namespace AppBundle\Service;

class DBaseApi {
	
   function InsertUserAction (Request $request) {
	
	try {
		$em = $this->getDoctrine()->getManager();
		$users = new Users();
		//$users->setUserID(rand(1,300));
		$users->setLogin("sdfs");
		$users->setVisitWith("sf");
		$em->persist($users);
		$em->flush();	
		return $this->render('dataBase/dataBase.html.twig');
	} catch(Doctrine\ORM\ORMException $e) {
		return $this->redirectToRoute('error');
	}				
   }	
	
}

?>
