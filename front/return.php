<?php
	include('../resources/header.php');
	/*function list so far to be used as $value
		getSemesters
		getClasses
		getClassInfo
		getPosts
		
		cannot be used until these are completed in backend
		*/
	function getJSON($value){
	$url = $urlPath.'/middle/return.php?function='.$value;
	$c = curl_init();
	curl_setopt($c, CURLOPT_FOLLOWLOCATION,true);
	curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type' => 'application/xml'));
	curl_setopt($c, CURLOPT_URL, $url);
	curl_setopt($c, CURLOPT_POST, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
	$result = curl_exec ($c); 
	curl_close ($c);
	return $result; // will already be encoded by back
	
	
	}
	
	?>