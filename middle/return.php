<?php
	/*function list to return certain data encoded in json for front
	*/
	
	//handling ajax requests
	if(isset($_POST['ucid_ajax']) && $_POST['semesterid_ajax'] && $_POST['flag_ajax'])
	{
		$dataarr = array('ucid'=>$_POST['ucid_ajax'],'semesterid' => $_POST['semesterid_ajax']);
		//echo json_encode($_POST['flag_ajax']);
		//echo $_POST['urlPath_ajax'];
		getJSONAJAX($_POST['flag'], $dataarr, $_POST['urlPath_ajax']);
	}

	
	
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

		
		
		//new curl added for ajax
		curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($c, CURLOPT_COOKIEJAR, $cookie_file_path);
		curl_setopt($c, CURLOPT_COOKIEFILE, $cookie_file_path);



		$result = curl_exec ($c); 
		curl_close ($c);
		echo $result;
	}
	
	
	function getJSONAJAX($value,$postdata,$urlPath){
		
		  $url1 = $urlPath.'/back/get.php?f='.$value;
		  $postdata1 = $postdata;
		  $c1 = curl_init();
		  curl_setopt($c1, CURLOPT_URL, $url1);
		  curl_setopt($c1, CURLOPT_CONNECTTIMEOUT, 2);
		  curl_setopt($c1, CURLOPT_SSL_VERIFYPEER, FALSE);
		  curl_setopt($c1, CURLOPT_RETURNTRANSFER, 1);
		  curl_setopt($c1, CURLOPT_COOKIEJAR, $cookie_file_path);
		  curl_setopt($c1, CURLOPT_COOKIEFILE, $cookie_file_path);
		  //curl_setopt($c, CURLOPT_POST, 1);
		  //curl_setopt($c, CURLOPT_POSTFIELDS, $postdata);
		  $r = curl_exec($c);
		  curl_close($c);
		  // check for success or failure
		  if (empty($r)) {echo "error";}
		  else 		 {echo $r;}
	}
	
	
	
	if(isset($_GET['function'])){//just an example of how this would work assume functions is getSemesters
		$arr = array('ucid' => $_POST['ucid']);
		$functionCall=true;
		getJSON($_GET['function'],$arr,$urlPath);
	}
?>


