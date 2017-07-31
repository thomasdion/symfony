<?php 

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */ 
class Users {
	
/**	
* @ORM\Column(type="integer")
* @ORM\Id
* @ORM\GeneratedValue(strategy="AUTO")
*/	
private $userID;	

/**
 * @ORM\Column(type="string", length=60)
 */ 
public $login;

/**
 * @ORM\Column(type="string", length=20)
 */
public $visitWith;

public function setUserID($userID) {
	
		$this->userId = $userID;
}
public function setLogin($login) {
	
		$this->login = $login;
}
public function setVisitWith($visitWith) {
	
		$this->visitWith = $visitWith;
}
}
	
?>
