<?php

namespace AppBundle\Service;

class GitHubApi {
	
/*	public String $username;
	
	function __construct($username) {
		$this->username = $username;
	}	
	*/
	public function getProfile($username) {
		
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
		
		return($properties);					
	}
	
	public function getRepos($username) {
		
 		$client = new \GuzzleHttp\Client();
 		$res = $client->request('GET', 'https://api.github.com/users/'.$username.'/repos');
		$obj = json_decode($res->getBody()->getContents(), true);
	    $properties = array (
				"repo_count" =>  3,
				"most_stars"=>"Code Review Videos",
				"repos" => $obj
		); 		
		return($properties);					
	}
		
}
?>
