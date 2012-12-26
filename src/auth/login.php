<?php
	include('../inc/globals.inc');
	extract($_POST);
	$data = file_get_contents(CONFIG_FILE);
	$json = json_decode($data,true);
	
	header("Content-type: text/plain");

	#var_dump($user);
	#var_dump($json);
	if($json[finduser($username,$json)]['password'] == hash("sha512", $password)){
		//$loc = '../../app/';
		setcookie('x-codeita-user', hash("sha512", $json[finduser($username,$json)]['id']), null, '/');
		echo('success');
		//echo("SUCCESS  ".$json[finduser($username,$json)]['password']." ".hash("sha512",$password));
	}else{
		//$loc = '../../index.php?login=false&badpass=true';
		echo('Unfortunately the login failed. Check your username and password.');
		//echo($json[finduser($username,$json)]['password']." ".hash("sha512",$password));
	}
	
	function finduser($username,$array){
		$i=0;
		foreach($array as $item){
			if($item["username"] == $username){
				return $i;
			}
			$i++;
		}
		return false;
	}
?>