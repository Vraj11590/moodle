<?php
	
	if(isset($_GET['f'])){//just an example of how this would work assume functions is getSemesters
		$f = $_GET['f'];
		
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
		if($f=='createQuiz'){
			if($type == 't'){
				$name = $_POST['name'];
				$crn = $_POST['crn'];
				createQuiz($name,$crn);
			}else echo 'Access Denied: Not a Teacher';
		}
		if($f=='createQQ'){
			$quizID = $_POST['quizID'];
			$question = $_POST['question'];
			$a = $_POST['a'];
			$b = $_POST['b'];
			$c = $_POST['c'];
			$d = $_POST['d'];
			$ans = $_POST['ans'];
			$grade = $_POST['grade'];
			createQuizQuestion($quizID,$question,$a,$b,$c,$d,$ans,$grade);
			}
		if($f=='getQS'){
			if($type == 't'){
				$quizID = $_POST['quizID'];
				//debug print line
				print_r(getQuestionScores($quizID));
			}else echo 'Access Denied: Not a Teacher';
		}
		if($f == 'getChildren'){
			$postID = $_POST['postID'];
			print_r(getChildren($postID));
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


