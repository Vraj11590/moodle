<?php 
	$url = 'http://localhost/moodle/middle/logout_control.php';
	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, $url);
	//curl_setopt($c, CURLOPT_POST, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
	//curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type' => 'application/xml'));
	$result = curl_exec ($c); 
	echo $result;
 ?>