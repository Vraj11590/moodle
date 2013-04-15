<?php
//$url = 'http://web.njit.edu/~gt35/moodle/middle/login_control.php';
$url = 'http://web.njit.edu/~vp78/moodle/middle/login_control.php';

$postdata = array('ucid' => $_POST["ucid"], 'password' => $_POST["password"]);

$c = curl_init();
curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type' => 'application/xml'));
curl_setopt($c, CURLOPT_URL, $url);
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
$result = curl_exec ($c); 
curl_close ($c); 

if($result){
	session_start();
	$_SESSION['UCID'] = $_POST['ucid'];
    // $_SESSION['TYPE'] = $result_row->type;
	// $_SESSION['NAME'] = $result_row->name;
	$_SESSION['user_logged_in'] = 1;
                        
	setcookie("ucid", $result_row->ucid, time() + (3600*24*100));
	setcookie("type", $result_row->type, time() + (3600*24*100));
                        
	echo "Printed inside clientproxy.php";
	print_r($result);
	
}else
	header('HTTP/1.1 500 Internal Server Error');

?>

