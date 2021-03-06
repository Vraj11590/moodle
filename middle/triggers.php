<?php
	if(isset($_GET['f'])){
		
		$f = $_GET['f'];
		$type = $_POST['type'];
		//vcheck-set block for commonly used vars
		if(isset($_POST['quizID'])){
			$quizID = $_POST['quizID'];
		}
		if(isset($_POST['ucid'])){
			$ucid = $_POST['ucid'];
		}
		if(isset($_POST['postID'])){
			$postID = $_POST['postID'];
		}
		if(isset($_POST['debug'])){
			$debug = $_POST['debug'];
		}
		if(isset($_POST['crn'])){
			$crn = $_POST['crn'];
		}
		if(isset($_POST['id'])){
			$id = $_POST['id'];
		}
		
		if($f=='insertPost'){
			$title = $_POST['title'];
			$content = $_POST['content'];
			if(isset($_POST['parent'])){
				$parent = $_POST['parent'];
			}else $parent = 0;
			insertPost($ucid,$crn,$title,$content,$parent);
		}
		
		if($f=='insertAssignment'){
			$name = $_POST['name'];
			$content = $_POST['content'];
			$deadline = $_POST['deadline'];
			insertAssignment($name,$crn,$content,$deadline);
		}
		
		if($f=='createQuiz'){
			$name = $_POST['name'];
			$crn = $_POST['crn'];
			createQuiz($name,$crn);
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
			echo encodePosts($crn);
		}
		if ($f == 'encodeAssignments'){
			echo encodeAssignments($crn);
		}
		if ($f == 'encodeQuizData'){
			echo encodeQuizData($crn);
		}
		if( $f == 'encodeUA'){//encodes upcoming assignments
			echo json_encode(getUpcomingAssns($crn));
		}
		if($f =='deleteAssn'){//post assignment id and will delete from DB
			deleteAssignment($id);
		}
		if($type == 't'){//teacher only functions go inside here
			
		}//else echo 'Access Denied: Not a Teacher';
		
		if($debug == true){//debug only functions
			if ($f == 'getForumData'){
				print_r(getForumData($crn));
			}
			if($f=='quizList'){
				print_r(getQuizList($crn));
			}
			if($f=='gradeQuiz'){
				$sucid = $_POST['sucid'];
				echo gradeQuiz($quizID,$sucid);
			}
			if($f=='ansStr'){
				echo getAnsStr($quizID);
			}
			if($f=='getAssignments'){
				print_r(getAssignments($crn));
			}
			if($f=='sAnsStr'){
				$sucid = $_POST['sucid'];
				echo getStudentAnsStr($quizID,$sucid);
			}
			if($f=='getPostInfo'){
				print_r(getPostInfo($postID));
			}
			if($f=='getUA'){
				print_r(getUpcomingAssns($crn));
			}
		}
	}
	
?>


