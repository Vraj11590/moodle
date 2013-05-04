<?php
	
	if(isset($_GET['function'])){//just an example of how this would work assume functions is getSemesters
		$f = $_GET['function'];
		
		if($f=='insertPost'){
			
			$ucid = $_POST['ucid'];
			$crn = $_POST['crn'];
			$title = $_POST['title'];
			$content = $_POST['content'];
			if(isset($_POST['parent'])){
				$parent = $_POST['parent'];
				
			}else $parent = 0;
			insertPost($ucid,$crn,$title,$content,$parent);
		}
		if($f=='insertAssignment'){
			if($type == 't'){
				$name = $_POST['name'];
				$content = $_POST['content'];
				$deadline = $_POST['deadline'];
				insertAssignment($name,$content,$deadline);
			}else echo 'Access Denied: Not a Teacher';
		}
		// if(isset($_POST['semesterid'])){
		// $arr = array('ucid' => $_POST['ucid'], 'semesterid' => $_POST['semesterid']);
		// }
		else{
			$arr = array('ucid' => $_POST['ucid']);
		}
		
		// $arr = array('ucid' => $_POST['ucid']);
		// $functionCall=true;
		// getJSON($f,$arr,$urlPath);
	}
?>


