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
	
	function insertAssignment($name,$content,$deadline){// insert assignment into table
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
	function createQuizQuestion($quizID,$question,$a,$b,$c,$d,$ans,$grade){//quizID is the quiz to add quesiton to
		$q = "INSERT INTO quiz (quizID,quiz_quest,a,b,c,d,quiz_ans,grade)
		VALUES ('".$quizID."',
		'".$question."',
		'".$a."','".$b."','".$c."','".$d."',
		'".$ans."',
		'".$grade."')";
		$con = new mysqli(db_host, db_user, db_pass, db_name); 
		$con->query($q);
	}
	function getQuestionScores($quizID){//for use in grading quiz
		$con = new mysqli(db_host, db_user, db_pass, db_name); 
		$q = "SELECT grade FROM quiz WHERE quizID = '".$quizID."'ORDER BY qid ASC";
		$result = $con->query($q);
		$values = array();
		while ($row = mysqli_fetch_assoc($result)){
			$values[]=$row['grade'];
		}
		return $values;
	}
	function getAnsStr($quizID){//returns answer string of quiz for use in grading
		$q = "SELECT quiz_ans FROM quiz WHERE quizID = '".$quizID."'";
		$con = new mysqli(db_host, db_user, db_pass, db_name);
		$result = $con->query($q);
		$ansStr='';
		while ($row = mysqli_fetch_assoc($result)){
			$ansStr.=$row['quiz_ans'];
		}	return $ansStr;
	}
	function getStudentAnsStr($quizID,$ucid){
		$q = "SELECT student_ans FROM quizans WHERE qid = '".$quizID."' AND ucid = '".$ucid."'";
		$con = new mysqli(db_host, db_user, db_pass, db_name);
		$result = $con->query($q);
		$ans='wat';
		if($result){
		$row = mysqli_fetch_assoc($result);
		$ans = $row['student_ans'];
		}else $ans = 'no result';
		return $ans;
	}
	function gradeQuiz($quizID,$ucid){//returns int grade in form of total score
		$sAns = getStudentAnsStr($quizID,$ucid);//student answer string
		$key = getAnsStr($quizID);//string in answer key
		$i = 0; //index
		$scoreval = getQuestionScores($quizID);
		$score = 0;
		$possible = 0;
		$x = substr($sAns, $i, 1);
		$y = substr($key, $i, 1);
		$len = strlen($key);
		while($x!=NULL&&$y!=NULL&& $i<$len){
			$x = substr($sAns, $i, 1);//student answer
			$y = substr($key, $i , 1);//answer in string
			$possible += $scoreval[$i];
			if($x == $y){
				$score += $scoreval[$i];
			}
			$i++;
		}return ($score/$possible)*100;
	}
	function insertGrade($crn,$type,$id){//inserts grade into table
		$type;// either quiz assignment or total grade
		//TODO
	}
	
	function insertFileData($path,$type,$owner){//inserts metadata of file into table
		//TODO
	}
	function getChildren($postID){//get children of whatever postID u want
		$q = "SELECT * FROM forums WHERE parent = '".$postID."'";
		$con = new mysqli(db_host, db_user, db_pass, db_name);
		$result = $con->query($q);
		$children = array();
		while ($row = mysqli_fetch_assoc($result)){
			$children[]= getPostInfo($row['ID']);
			
		}return $children;
	}
	function getPostInfo($postID){
		$data = array();
		$q = "SELECT * FROM forums WHERE ID = '".$postID."'";
		$con = new mysqli(db_host, db_user, db_pass, db_name);
		$result = $con->query($q);
		if($result){
			$row = mysqli_fetch_assoc($result);
			$data[] = array('postID'=> $row['ID'],
			'user'=>$row['ucid'],
			'title'=> $row['title'],
			'content' => $row['content'],
			'children' => getChildren($row['ID']));
		} return $data;
	}
	function encodePosts($postID){
		return json_encode(getChildren($postID));
	}
?>			