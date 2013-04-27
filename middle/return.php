<?php
	/*function list to return certain data encoded in json for front
	*/
	
	function getJSON($value,$postval,$urlPath){
		$url = $urlPath.'/back/get.php?f='.$value;
		$postdata = $postval;
		$c = curl_init();
		curl_setopt($c, CURLOPT_FOLLOWLOCATION,true);
		curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type' => 'application/xml'));
		curl_setopt($c, CURLOPT_URL, $url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
		if(curl_exec($c) === false)
		{
			echo 'Curl error:' . curl_error($c);
		}
		
		
		$result = curl_exec ($c); 
		if(!$result){
			echo 'middle: null result';
		}
		curl_close ($c);
		echo $result;
	}
	
	if(isset($_GET['function'])){//just an example of how this would work assume functions is getSemesters
		$arr = array();
		$f = $_GET['function'];
		if($f=='insertPost'){
			$ucid = $_POST['ucid'];
			$crn = $_POST['crn'];
			$title = $_POST['title'];
			$txt = = $_POST['txt'];
			insertPost($ucid,$crn,$title,$txt);
		}
		if(isset($_POST['semesterid'])){
			$arr = array('ucid' => $_POST['ucid'], 'semesterid' => $_POST['semesterid']);
		}
		else{
			$arr = array('ucid' => $_POST['ucid']);
		}
		$functionCall=true;
		//print_r($arr);
		getJSON($_GET['function'],$arr,$urlPath);
	}
?>


