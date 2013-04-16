<?php
	// $url = 'http://web.njit.edu/~gt35/moodle/middle/login_control.php';
	// $url = 'http://web.njit.edu/~vp78/moodle/middle/login_control.php';
	if(isset($_SESSION['ucid'])){
		header("Location: loggedin.php");
		//$postdata = array('ucid' => $_SESSION["ucid"], 'password' => $_SESSION["password"]);
	}
	else{
		header("Location: http://localhost/moodle");
	}
	
	$url = 'http://localhost/moodle/middle/login_control.php';
	$postdata = array('ucid' => $_POST["ucid"], 'password' => $_POST["password"]);
	
	$c = curl_init();
	curl_setopt($c, CURLOPT_FOLLOWLOCATION,true);
	curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type' => 'application/xml'));
	curl_setopt($c, CURLOPT_URL, $url);
	curl_setopt($c, CURLOPT_POST, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
	$result = curl_exec ($c); 
	curl_close ($c); 
	
	
	if($result){
		
		$result = json_decode($result);
		session_start();
		$_SESSION['ucid'] = $result['ucid'];
		$_SESSION['type'] = $result['type'];
		$_SESSION['name'] = $result['name'];
		$_SESSION['user_logged_in'] = 1;
		
		setcookie("ucid", $result_row->ucid, time() + (3600*24*100));
		setcookie("type", $result_row->type, time() + (3600*24*100));
		header("Location: loggedin.php");
		// $rr = json_decode($result);
		// $flag = 1;
		// $name = $rr->name;
		
		// if($flag == 1)
		// {
		// $host  = $_SERVER['HTTP_HOST'];
		// $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		// $extra = "loggedin.php?ucid=".$_POST["ucid"]."&"."name=".$name;
		
		// $_SESSION['UCID'] = $_POST["ucid"];
		// $_SESSION['user_logged_in'] = 1;
		
		// //header("Location: http://$host$uri/$extra");
		// header("Location: loggedin.php");
		// }
		// elseif($flag == 0)
		// {
		// $_SESSION['user_logged_in'] = 0;
		// $url = 'web.njit.edu/~vp78/moodle/index.php?password=0';
		// header("Location: http://$url");
		// }
		// else
		// {
		// echo "something is wrong";
		// }
		
		}else{
		header("Location: http://localhost/moodle");
	}
	
	if(isset($_GET['logout'])){
		
		$_SESSION = array();
        session_destroy();
        $user_is_logged_in = false;
        //$messages[] = "You have been logged out.";
        //echo"Logout finished.";
	}
	//header('HTTP/1.1 500 Internal Server Error');
	
	
	
?>