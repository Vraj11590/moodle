<?php
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
	function runQuery($q){
		$con = new mysqli(db_host, db_user, db_pass, db_name); 
		$result = $con->query($q);
		if($result){
			return $result;
		}
	}
	function getElements($result){
		$a = array();//temp array to store shit
		// $con = new mysqli(db_host, db_user, db_pass, db_name); 
		// $result = $con->query($q);
		while($row = $result->fetch_assoc()){
			
			array_push($a,$row);
		}
		return $a;
	}
	function insertPost($ucid,$crn,$title,$content,$parent){//add parent functionality later
		$q ="INSERT INTO forum (crn, ucid, title, content, parent)
		VALUES ('".$crn."','".$ucid."','".$title."','".$content."','".$parent."')";
		runQuery($q);
	}
	function insertAssignment($name,$content,$deadline){// insert assignment into table
		$q ="INSERT INTO assignments(assign_name, assign_content, assign_deadline)
		VALUES ('".$name."','".$content."','".$deadline."')";
		runQuery($q);
	}
	function getAssignments($crn){
		$q = "SELECT * FROM assignments WHERE crn = '".$crn."'";
		$result = runQuery($q);
		return getElements($result);
	}
	function createQuiz($name,$crn){//insert entry into quiz master table then creates new table for quiz
		$q = "INSERT INTO quizmaster (name,crn)
		VALUES ('".$name."','".$crn."')";
		runQuery($q);
	}
	function createQuizQuestion($quizID,$question,$a,$b,$c,$d,$ans,$grade){//quizID is the quiz to add quesiton to
		$q = "INSERT INTO quizquestions (quizID,quiz_quest,a,b,c,d,quiz_ans,grade)
		VALUES ('".$quizID."',
		'".$question."',
		'".$a."','".$b."','".$c."','".$d."',
		'".$ans."',
		'".$grade."')";
		runQuery($q);
	}
	function getQuestionScores($quizID){//for use in grading quiz
		$q = "SELECT grade FROM quizquestions WHERE quizID = '".$quizID."'ORDER BY qid ASC";
		$result = runQuery($q);
		$values = array();
		while ($row = mysqli_fetch_assoc($result)){
			$values[]=$row['grade'];
		}
		return $values;
	}
	function getAnsStr($quizID){//returns answer string of quiz for use in grading
		$q = "SELECT quiz_ans FROM quizquestions WHERE quizID = '".$quizID."'";
		$result = runQuery($q);
		$ansStr='';
		while ($row = mysqli_fetch_assoc($result)){
			$ansStr.=$row['quiz_ans'];
		}	return $ansStr;
	}
	function getStudentAnsStr($quizID,$ucid){
		$q = "SELECT student_ans FROM quizans WHERE qid = '".$quizID."' AND ucid = '".$ucid."'";
		$result = runQuery($q);
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
	function insertGrade($type,$id,$ucid,$value,$date){//inserts grade into table value will be from gradequiz
		$type;// either quiz assignment or total grade
		if($type =='assignment'){
			$q = "INSERT INTO assignsub (assignid,ucid,grade,submitted)
			VALUES ('".$id."','".$ucid."','".$value."','".$date."')";
			}
		if($type == 'quiz'){
			$q = "UPDATE quizans SET grade = '".$value."' WHERE qid = '".$id."' 
															AND ucid = '".$ucid."'";
			}
		//TODO
	}
	function insertFileData($path,$type,$owner){//inserts metadata of file into table
		//TODO
	}
	function getChildren($postID){//get children of whatever postID u want
		$q = "SELECT * FROM forum WHERE parent = '".$postID."'";
		$children = array();
		$result = runQuery($q);
		while ($row = mysqli_fetch_assoc($result)){
			$children[]= getPostInfo($row['ID']);
		}return $children;
	}
	function getPostInfo($postID){
		$q = "SELECT * FROM forum WHERE ID = '".$postID."'";
		$result = runQuery($q);
		if($result){
			$row = mysqli_fetch_assoc($result);
			$data[] = array('postID'=> $row['ID'],
			'user'=>$row['ucid'],
			'title'=> $row['title'],
			'content' => $row['content'],
			'children' => getChildren($row['ID']));
		} return $data;
	}
	function getQuizQuestions($quizID){//returns all quiz questions
		$q = "SELECT * FROM quizquestions WHERE quizID = '".$quizID."'";
		$result = runQuery($q);
		
		while($x = mysqli_fetch_assoc($result)){
			$res[] = $x;
		} 
		if($res) 
			return $res;
	}
	function getQuizInfo($crn){//returns lists of quizzes for a class
		$q = "SELECT ID, name, due FROM quizmaster WHERE crn = '".$crn."'";
		$result = runQuery($q);
		while($x = mysqli_fetch_assoc($result)){
			$a[]= array('name' => $x['name'],
			'due' => $x['due'],
			'questions' => getQuizQuestions($x['ID']));
		}
		return $a;
	}
	function encodePosts($crn){//encodes posts in json array
		return json_encode(getForumData($crn));
	}
	function encodeAssignments($crn){//encodes posts in json array
		return json_encode(getAssignments($crn));
	}
	function encodeQuizData($crn){
		return json_encode(getQuizInfo($crn));
	}
	function getForumData($crn){
		$q = "SELECT * FROM forum WHERE  crn  = '".$crn."' AND parent = 0";
		$result = runQuery($q);
		while($x = mysqli_fetch_assoc($result)){
			$res[] = getPostInfo($x['ID']);
		} 
		if($res) 
			return $res;
	}
?>			