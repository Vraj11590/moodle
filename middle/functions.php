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
		
		$result = curl_exec ($c); 
		curl_close ($c);
		echo $result;
	}
	
	function insertPost($ucid,$crn,$title,$content,$parent){//add parent functionality later
		$q ="INSERT INTO forums (crn, ucid, title, content, parent)
		VALUES ('".$crn."','".$ucid."','".$title."','".$content."','".$parent."')";
		$con = new mysqli(db_host, db_user, db_pass, db_name); 
		$con->query($q);
	}
	
	function insertAssignment($name,$content,$deadline){
		$q ="INSERT INTO assigns (assign_name, assign_content, assign_deadline)
		VALUES ('".$name."','".$content."','".$deadline."')";
		$con = new mysqli(db_host, db_user, db_pass, db_name); 
		$con->query($q);
	}
	function createQuiz($name,$crn){//insert entry into quiz master table then creates new table for quiz
		$q = "INSERT INTO quizzes (name,crn)
		VALUES ('".$name."','".$crn."')";
		$con = new mysqli(db_host, db_user, db_pass, db_name); 
		$con->query($q);
		}
	function insertQuizQuestion($quizID,$question,$a,$b,$c,$d,$ans){
		}
	function getChildren($postID){

		while ($row = mysqli_fetch_array($result)){
			
			}
		}
	?>