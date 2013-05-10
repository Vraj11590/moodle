<?php 
 include('../resources/header.php');
 
 
 function getElements($q){
  $a = array();//temp array to store shit
  $con = new mysqli(db_host, db_user, db_pass, db_name); 
  $result = $con->query($q);
  while($row = $result->fetch_row()){
   
   array_push($a,$row);
  }
  return $a;
 }
 
 function getSemesters($ucid){
  
  $q =   "SELECT DISTINCT s.semesterid  
  
  FROM  	sections AS s, enrolled AS e
  WHERE 	e.crn = s.crn
  AND  		e.ucid = '".$ucid."'";
  
  return array('semesters' => getElements($q));
  
 }
 /// function to get classes in semester
 function getClasses($ucid,$semesterid){
  $q= "	SELECT 	c.courseid AS courseid, c.coursename AS coursename,
				s.crn AS crn, s.sectionid AS sectionid,s.capacity as capacity, s.actual as actual, s.start as start, s.end as end,
				u.name AS teachername
  
		FROM  	sections AS s, enrolled AS e, courses AS c, users AS u
		WHERE  	e.ucid = '".$ucid."'
		AND  	s.semesterid = '".$semesterid."'
		AND  	e.crn = s.crn
		AND  	s.courseid = c.courseid
		AND  	s.teacherid = u.ucid";
  
  return array('classes' => getElements($q));
 }
 
  ///function to get participant in each class
 
 function getParticipant($crn){
  $q= "SELECT 	u.ucid AS studentid, u.name AS name, u.email AS studentEmail, u.phone AS studentPhone
		FROM 	enrolled AS e, users AS u
		WHERE 	e.crn =  '".$crn."'
		AND 	e.ucid = u.ucid
      
     ";

  return array('participant' => getElements($q));
 }
 ///function to get posts in each class
 
 function getPosts($crn){
  $q= "SELECT 	q.ucid as ucid, q.topic as topic, q.detail as question
       FROM 	forumQuest as q
       WHERE 	q.crn='".$crn."'
       ORDER by q.id desc
      
     ";

  return array('posts' => getElements($q));
 }
 
 // Annoucement from teacher for each class
 function getAnno($crn){
  $q= "SELECT u.name as teachername, p.post_title as title, p.post_text as announcement
  
   FROM  	posts as p, users as u
   WHERE  	crn='".$crn."'
   AND  	p.ucid = u.ucid
   AND  	type='t'"
  ;
  
  return array('anno' => getElements($q));
 }
 
 // Get Quiz question
 function getQuiz($crn,$ucid){
  $q = "SELECT 	q.quiz_quest AS question, q.a AS a, q.b AS b, q.c AS c, q.d AS d, q.qid AS qid
		FROM  	quiz AS q, quizAns AS qa
		WHERE 	qa.ucid =  '".$ucid."'
		AND 	qa.crn =  '".$crn."'
		AND 	q.qid = qa.qid";
  
  return array('quiz' => getElements($q));
 }
 // calcualate quiz score
 function getQuizScore($crn,$ucid){
  $q= " SELECT 	SUM( q.grade ) as score
		FROM 	quiz AS q, quizAns AS qa
		WHERE 	qa.ucid =  '".$ucid."'
		AND 	qa.crn =  '".$crn."'
		AND 	q.qid = qa.qid
		AND 	q.quiz_ans = qa.student_ans";
  
  return array('score' => getElements($q));
 }
 
 //get Course Inforamtion
 function getCourseInfo($crn){
  $q= " SELECT    u.name AS participant, u.ucid AS studentid, u.email AS email,
       s.capacity AS capacity, s.actual AS actual,s.teacherid AS teacherid

     FROM  	sections AS s, courses AS c, users AS u, enrolled AS e
     WHERE  s.courseid = c.courseid
      AND 	s.crn = e.crn
      AND 	e.crn =  '".$crn."'
      AND 	e.ucid = u.ucid";
  
  return array('courseInfo' => getElements($q));
 }
 // get assignment for each student in each class
  function getAssignment($crn,$ucid){
  $q= " 	SELECT 	a.assign_name, a.assign_content, a.assign_deadline as deadline 
			FROM 	assigns as a, assignSub as s
			WHERE 	a.assignid =s.assignid
			AND 	s.crn='".$crn."'
			AND  	s.ucid='".$ucid."'
			";
  
  return array('assignmentInfo' => getElements($q));
 }
 
  // Professor get all submittion of all students in class 
  function getAssignSubmit($crn){
  $q= " 	SELECT 	a.assign_name, s.ucid,a.assign_content,s.submit,s.date_submit,s.grade
			FROM 	assigns as a, assignSub as s
			WHERE 	a.assignid =s.assignid
			AND 	s.crn='".$crn."'
			";
  
  return array('AssignSubmit' => getElements($q));
 }
 
 
 
 
 //-----------------------------------------------------------------

// FROM THIS LINE IS THE FUNCTIONS ADDING INFORMATION INTO DATABASE
 
 // add topic for forum
 function AddTopic($crn,$ucid,$topic,$detail){
  $q= " INSERT INTO forumQuest (crn,ucid,topic,detail,datetime) VALUES
    ('".$crn."','".$ucid."','".$topic."','".$detail."', now())
   ";
  $con = new mysqli(db_host, db_user, db_pass, db_name); 
		$con->query($q);
}


// adding Assignment from teacher
function AddAssignment($crn,$name,$content,$deadline){

		// input assignment info into assigns table
		$q ="	INSERT INTO assigns (assign_name, assign_content, assign_deadline)
							VALUES 	('".$name."','".$content."','".$deadline."')";
		$con = new mysqli(db_host, db_user, db_pass, db_name); 
		$con->query($q);
		
		// register the assignment for each student in class
		$p = "	INSERT INTO assignSub (assignid, crn, ucid)
					SELECT	a.assignid, e.crn, e.ucid
					FROM 	assigns as a , enrolled as e
					WHERE 	e.crn='".$crn."'
						AND a.assign_name='".$name."'
						AND ucid in ( 	SElECT 	ucid 
										FROM	enrolled 
										WHERE	crn='".$crn."')";
		$con = new mysqli(db_host, db_user, db_pass, db_name); 
		$con->query($p);
	}
	
 // add submition from student
 function SubmitAssignment($crn,$ucid,$name,$sumit){
  $q= " UPDATE 	assignSub
		SET 	submit='".$submit."', date_submit=now()
		WHERE 	crn ='".$crn."' 
		AND		ucid ='".$ucid."'
		AND   	assignid in (	SElECT 	assignid
								FROM 	assigns
								WHERE	assign_name = '".$name."')

		";
  $con = new mysqli(db_host, db_user, db_pass, db_name); 
		$con->query($q);
}	

 
 
 
 
 if(isset($_GET['f'])){// check if function field is set
  $f = $_GET['f'];
  $u = $_POST['ucid'];
  $s = $_POST['semesterid'];
  
  if($f == 'getSemesters'){
   echo json_encode(getSemesters($u));
  }
  if($f == 'getClasses'){
   $s = $_POST['semesterid'];
   echo json_encode(getClasses($u,$s));
 
  }
    if($f == 'getParticipant'){
   $c = $_POST['crn'];
   
   echo json_encode(getParticipant($c));
   
  }
  if($f == 'getPosts'){
   $c = $_POST['crn'];
   
   echo json_encode(getPosts($c));
   
  }
  if($f == 'getAnno'){
   $c = $_POST['crn'];
   echo json_encode(getAnno($c));
   
  }
  if($f == 'getCourseInfo'){
   $c = $_POST['crn'];
   
   echo json_encode(getCourseInfo($c));
   
  }
  if($f == 'getQuiz'){
   $c = $_POST['crn'];
   $u = $_POST['ucid'];

   echo json_encode(getQuiz($c,$u));
   
  }
  if($f == 'getQuizScore'){
   $c = $_POST['crn'];
   
   echo json_encode(getQuizScore($c));
   
  }
    if($f == 'getAssign'){
   $c = $_POST['crn'];
   $u = $_POST['ucid'];
   
   echo json_encode(getAssignment($c,$u));
   
  }
   if($f == 'getSubmit'){
   $c = $_POST['crn'];
   
   echo json_encode(getAssignSubmit($c));
   
  }
   
 //-----------------------------------------------------------------

// FROM THIS LINE IS THE FUNCTIONS ADDING STUFF INTO DATABASE

  if($f == 'AddTopic'){
   $c = $_POST['crn'];
   $u = $_POST['ucid'];
   $t = $_POST['topic'];
   $d = $_POST['detail'];
   
   (AddTopic($c,$u,$t,$d));
   
  }
    if($f == 'AddAssigns'){
   $c = $_POST['crn'];
   $n = $_POST['name'];
   $content = $_POST['content'];
   $d=$_POST['deadline'];
   
   AddAssignment($c,$n,$content,$d);
   
  }
  
  
    if($f == 'SubAssigns'){
   $c = $_POST['crn'];
   $u = $_POST['ucid'];
   $n = $_POST['name']; // assignment name
   $s = $_POST['submit']; 
   
   SubmitAssignment($c,$u,$n,$s);
   
  }
 }else echo "function not set";
?>
