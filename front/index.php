<?php
	include('../resources/header.php');
	session_start();
	if(isset($_GET['logout'])){
		$_SESSION = array();
		session_destroy();
		header("Location: ".$urlPath.'/front/login.php?loggedout');

		
	}else
	if(isset($_SESSION['ucid'])){
		header("Location: ".$urlPath.'/front/loggedin.php?ucid='.$_SESSION['ucid']);
	}else{
		setcookie("sessionstarted", "yes");
		$c = curl_init();
		$url = $urlPath.'/middle/control.php';
		if(isset($_POST['ucid'],$_POST['password'])){
			$postdata = array('ucid' => $_POST["ucid"], 'password' => $_POST["password"]);
			curl_setopt($c, CURLOPT_POST, true);
			curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
		}
		curl_setopt($c, CURLOPT_FOLLOWLOCATION,true);
		curl_setopt($c, CURLOPT_URL, $url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec ($c); 
		curl_exec($c);
		curl_close ($c); 
		
		if($result){
			$result = json_decode($result,true);
			if($result['auth']==true){
				$_SESSION['ucid'] = $_POST["ucid"];
			}
			
			header("Location: ".$result['url']);
			
		}
	}
	?>