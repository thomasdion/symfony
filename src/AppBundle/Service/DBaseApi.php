<?php

namespace AppBundle\Service;


class DBaseApi {
	
   function InsertUser($user) {
	
	try {
		$em = $this->getDoctrine()->getManager();
		$em->persist($users);
		$em->flush();	
	} catch(Doctrine\ORM\ORMException $e) {
		return $this->redirectToRoute('error');
	}				
   }	
	
}

?>
