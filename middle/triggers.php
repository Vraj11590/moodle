<?php
	
	if(isset($_GET['f'])){
		$f = $_GET['f'];
		
		if(isset($_POST['quizID'])){
			$quizID = $_POST['quizID'];
		}
		if(isset($_POST['ucid'])){
			$ucid = $_POST['ucid'];
		}
		
		if($f=='insertPost'){
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
				//debug print line
				print_r(getQuestionScores($quizID));
			}else echo 'Access Denied: Not a Teacher';
		}
		
		if($f == 'getChildren'){
			$postID = $_POST['postID'];
			print_r(getChildren($postID));
		}
		
		if($f == 'upload'){
			if ($_FILES["file"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			}
			else
			{
				echo "Upload: " . $_FILES["file"]["name"] . "<br>";
				echo "Type: " . $_FILES["file"]["type"] . "<br>";
				echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
				echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
				
				if (file_exists("../upload/" . $_FILES["file"]["name"]))
				{
					echo $_FILES["file"]["name"] . " already exists. ";
				}
				else
				{
					move_uploaded_file($_FILES["file"]["tmp_name"],
					"../upload/" . $_FILES["file"]["name"]);
					echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
				}
			}
			
		}
		if($f=='encPosts'){
			$postID = $_POST['postID'];
			echo encodePosts($postID);
		}
		if($f=='ansStr'){
			echo getAnsStr($quizID);
		}
		if($f=='gradeQuiz'){
			$sucid = $_POST['sucid'];
			echo gradeQuiz($quizID,$sucid);
		}
		if($f=='sAnsStr'){
			$sucid = $_POST['sucid'];
			echo getStudentAnsStr($quizID,$sucid);
		}
	}
	else{
		$arr = array('ucid' => $_POST['ucid']);
	}
	
?>


