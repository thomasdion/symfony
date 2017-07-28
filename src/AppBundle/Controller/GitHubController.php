<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; 
use AppBundle\Service\GitHubApi;

class GitHubController extends Controller {
	


/**
  * @Route("/", name="homepage");
*/
	public function gitHubAction(Request $request) {

		return $this->render('home.html.twig');
	}
	
/**
  * @Route("/profile/{username}", name="profile", defaults={"username":"codereviewvideos"});
*/	
	public function profileAction(Request $request, GitHubApi $gitHubApi, $username) {
		
		$profileData = $gitHubApi->getProfile($username);
 
		return $this->render('gitHub/sidebar-profile.html.twig',$profileData);
	}
	
/**
 * @Route("/repos/{username}", name="repos", defaults={"username":"codereviewvideos"});
 */  		 	
  public function reposAction(Request $request, GitHubApi $gitHubApi, $username) {
	
		$repoData = $gitHubApi->getRepos($username);
		
		return $this->render('gitHub/gitHub.html.twig', array("username"=>$username,"gitHubApi"=>$gitHubApi));
  }	  
}		
?>
