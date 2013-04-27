<?php
	function insertPost($ucid,$crn,$title,$txt){//add parent functionality later
		$q ="INSERT INTO posts (crn, ucid, post_title, post_text)
		VALUES ('".$crn."','".$ucid."','".$title."','".$txt."')";
		$con->query($q);
	}
	function insertAssignment($ucid,$crn,$title,$txt){
		
	}
	if(isset($_GET['function'])){
		$f = $_GET['function'];
		if($f=='insertPost'){
			$ucid = $_POST['ucid'];
			$crn = $_POST['crn'];
			$title = $_POST['title'];
			$txt = = $_POST['txt'];
			insertPost($ucid,$crn,$title,$txt);
		}
	}
?>