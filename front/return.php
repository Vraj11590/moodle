<?php
	//include('../resources/header.php');
	/*function list so far to be used as $value
		getSemesters
		getClasses
		getClassInfo
		getPosts
		
		example: getJSON('getSemesters');
		willl return json object with semesters.
		cannot be used until these are completed in backend
		*/
        
        $global = array();
        if(isset($_POST['flag_ajax']))
        {
            $flag = $_POST['flag_ajax'];
            $t = array('ucid'=> $_POST["ucid_ajax"], 'semesterid' => $_POST["semester_ajax"]);
            $u=$_POST["urlPath_ajax"];
            //echo $u;
            getJSON($flag,$t,$u);
        }
        
        
	function getJSON($value,$postval,$urlPath){
        $url = $urlPath.'/middle/control.php?function='.$value;
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
	return $result; // will already be encoded by back

	}
	
?>