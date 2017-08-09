<?php 

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */ 
class User {
	
/**	
* @ORM\Column(type="integer")
* @ORM\Id
* @ORM\GeneratedValue(strategy="AUTO")
*/	
private $userID;	

/**
 * @ORM\Column(type="string", length=60)
 * @Assert\NotBlank(payload={"severity"="error"})
 * @Assert\Length(
 *  min=8,
 *  max=60,
 *  minMessage="Too Short",
 *  maxMessage="Too Long"
 * )
 */ 
protected $login;

/**
 *  
 * @Assert\NotBlank(payload={"severity"="error"})
 * @Assert\Choice(choices={"parents","friends","alone"}, message="Visit With")
 */
public $visitwith;

public function setUserID($userID) {
	
		$this->userId = $userID;
}
public function setLogin($login) {
	
		$this->login = $login;
}
public function getLogin() {
	
		return $this->login;
}
public function setVisitWith($visitwith) {
	
		$this->visitwith = $visitwith;
}
public function getVisitWith() {
	
		return $this->visitwith;
}
}
	
?>
