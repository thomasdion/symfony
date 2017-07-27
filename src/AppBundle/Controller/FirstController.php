<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; 
use AppBundle\Service\GitHubApi;

class FirstController extends Controller {
	

/**
  * @Route("/{username}", name="repos", defaults ={ "username":"codereviewvideos"});
*/
	public function firstAction(Request $request, $username, GitHubApi $gitHubApi) {
		
  	    $properties = array(
				"username"=>$username,
				"repo_count" =>  3,
				"most_stars"=>"Code Review Videos",
				"repos" => array(
					 "name"=>"https://codereviewvideos.com",
					 "url"=>"https://codereviewvideos.com",
					 "stargazers_count"=>12,
					 "description"=>"learn symfony 3")
			 	
		         
		  );
 		
		return $this->render('first/index.html.twig',$properties);
	}
	
/**
  * @Route("/profile/{username}", name="profile", defaults={"username":"codereviewvideos"});
*/	
	public function profileAction(Request $request, GitHubApi $gitHubApi, String $username) {
		
		$profileData = $gitHubApi->getProfile($username);
 
		return $this->render('first/sidebar-profile.html.twig',$profileData);
	}
	
/**
 *@Route("/second", name="second"); 
 */

public function secondAction(Request $request) {
 	
	return $this->render('first/second.html.twig',$this->properties);
 } 	
}		
?>
