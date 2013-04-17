<?php
	include('../resources/header.php');
	session_start();
	
	if(isset($_GET['logout'])){
		
		$_SESSION = array();
        session_destroy();
        $user_is_logged_in = false;
		header("Location: $urlPath/front/login.php?loggedout");
	}else if(isset($_SESSION['ucid'])){
		header("Location: $urlPath/front/loggedin.php?name=".$_SESSION['name']);
		//$postdata = array('ucid' => $_SESSION["ucid"], 'password' => $_SESSION["password"]);
	}else if(isset($_POST["ucid"],$_POST["password"])){
	
		$url = $urlPath.'/middle/login_control.php';
		$postdata = array('ucid' => $_POST["ucid"], 'password' => $_POST["password"]);
		
		$c = curl_init();
		curl_setopt($c, CURLOPT_FOLLOWLOCATION,true);
		curl_setopt($c, CURLOPT_URL, $url);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
		$result = curl_exec ($c); 
		curl_close ($c); 
		
		
		if($result){
			
			echo $result;
			$result = json_decode($result,true);
			print_r($result);
			$_SESSION['ucid'] = $result['ucid'];
			$_SESSION['type'] = $result['type'];
			$_SESSION['name'] = $result['name'];
			$_SESSION['user_logged_in'] = 1;
			print_r($_SESSION);
			
			//setcookie("ucid", $result_row->ucid, time() + (3600*24*100));
			//setcookie("type", $result_row->type, time() + (3600*24*100));
			//header("Location: $urlPath/front/loggedin.php?ucid=".$_SESSION['ucid'].'&name='.$_SESSION['name']);

			
			}else{
			header("Location: $urlPath/front/login.php?invalid");
		}
	}else 
	header("Location: $urlPath/front/login.php?nopost");
	//header('HTTP/1.1 500 Internal Server Error');
?>