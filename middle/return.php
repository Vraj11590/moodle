<?php
	/*function list to return certain data encoded in json for front
	*/
	$function = $_POST['function'];
	
	if($function == 'getSemesters'){//get each semester student is enrolled in
		$url = 'http://localhost/moodle/back/getSemesters.php';
	}
	if($function == 'getClasses'){//similar to above function
		$url = 'http://localhost/moodle/back/getClasses.php';
	}
	if($function == 'getClassInfo'){//returns teacher, assignments meeting times/ whatever
		$url = 'http://localhost/moodle/back/ClassInfo.php';
	}
	if($function == 'getPosts'){//for forums i guess
		$url = 'http://localhost/moodle/back/getPosts.php';
	}
	
	$c = curl_init();
	curl_setopt($c, CURLOPT_FOLLOWLOCATION,true);
	curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type' => 'application/xml'));
	curl_setopt($c, CURLOPT_URL, $url);
	curl_setopt($c, CURLOPT_POST, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
	$result = curl_exec ($c); 
	curl_close ($c);
	echo json_encode($result);
?>