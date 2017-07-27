<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; 

class FirstController extends Controller {
	

/**
  * @Route("/index/{username}", name="homepage", defaults ={ "username":"codereviewvideos"});
*/
	public function firstAction(Request $request, $username) {
		
 		$client = new \GuzzleHttp\Client();
 		$res = $client->request('GET', 'https://api.github.com/users/'.$username);
		$obj = json_decode($res->getBody()->getContents(), true);				
 	    $properties = array("avatar_url"=>$obj["avatar_url"],
		"name"=>$obj["name"],"login"=>$obj["login"],
		 "details" =>  array(
			"company"=>$obj["company"],
			"location"=>$obj["location"],
			  "blog"=>$obj["blog"]),
		 "socials" => array(
		     "public_gists"=>$obj["public_gists"],
			 "followers"=>$obj["followers"],
			 "following"=>$obj["following"])	
		);				
 		$propertiesRepo = $properties;		
 		$propertiesRepo['repos'] = array(
			array( "name"=>"angular-symfony-1.example",
				   "url"=>"https://api.github.com/1/codereviewvideos",
				   "stargazers_count"=>"12",
				   "description"=>"angular-symfony-1.example"	
			),
			array( "name"=>"angular-symfony-2.example",
				   "url"=>"https://api.github.com/2/codereviewvideos",
				   "stargazers_count"=>"42",
				   "description"=>"angular-symfony-2.example"	
			),
			array( "name"=>"angular-symfony-4.example",
				   "url"=>"https://api.github.com/4/codereviewvideos",
				   "stargazers_count"=>"23",
				   "description"=>"angular-symfony-4.example"	
			)
 		);
		return $this->render('first/index.html.twig',$propertiesRepo);
	}
	
/**
  * @Route("/profile", name="profile");
*/	
	public function profileAction(Request $request) {
		
		$profileData = $this->get('github_api')->getProfile("codereviewvideos");
 
		return $this->render('first/sidebar-profile.html.twig',$profileData);
	}
	
/**
 *@Route("/second", name="second"); 
 */

public function secondAction(Request $request) {
 	
	return $this->render('first/second.html.twig',$this->properties);
 }
 
/**
 *@Route("/facts",name = "facts"); 
*/	
	
public function factsAction(Request $request) {
	
	return $this->render('first/facts.html.twig',$this->properties);
 }	 	
}		
?>
