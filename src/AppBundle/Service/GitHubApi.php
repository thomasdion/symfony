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
		$properties = json_decode($res->getBody()->getContents(), true);
		
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
