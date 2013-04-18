<?php
	/*function list to return certain data encoded in json for front
	*/
	
	function getJSON($value,$postval,$urlPath){
		$url = $urlPath.'/back/'.$value.'.php';
		$postdata = $postval;
		$c = curl_init();
		curl_setopt($c, CURLOPT_FOLLOWLOCATION,true);
		curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type' => 'application/xml'));
		curl_setopt($c, CURLOPT_URL, $url);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
		$result = curl_exec ($c); 
		curl_close ($c);
		echo $result;
	}
	if(isset($_GET['function'])){//just an example of how this would work assume functions is getSemesters
		$arr = array('ucid' => $_POST['ucid']);
		$functionCall=true;
		getJSON($_GET['function'],$arr,$urlPath);
	}
?>