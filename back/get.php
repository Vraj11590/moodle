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
 function insertData($q)
 {
	$con = new mysqli(db_host, db_user, db_pass, db_name); 
	$result = $con->query($q);
 
	if($q)
	{
		echo ("Success");
	}
	else
	{
		echo ("Failure");
	}
 
 
 }
 
 function getSemesters($ucid){
  
  $q =   "SELECT DISTINCT s.semesterid  
  
  FROM  sections AS s, enrolled AS e
  WHERE e.crn = s.crn
  AND  e.ucid = '".$ucid."'";
  
  return array('semesters' => getElements($q));
  
 }
 /// function to get classes in semester
 function getClasses($ucid,$semesterid){
  $q= "SELECT c.courseid AS courseid, c.coursename AS coursename,
  s.crn AS crn, s.sectionid AS sectionid,s.capacity as capacity, s.actual as actual, s.start as start, s.end as end,
  u.name AS teachername
  
  FROM  sections AS s, enrolled AS e, courses AS c, users AS u
  WHERE  e.ucid = '".$ucid."'
  AND  s.semesterid = '".$semesterid."'
  AND  e.crn = s.crn
  AND  s.courseid = c.courseid
  AND  s.teacherid = u.ucid";
  
  return array('classes' => getElements($q));
 }
 
 ///function to get posts in each class
 
 function getPosts($crn){
  $q= "SELECT ucid,post_title,post_text
  
  FROM posts
  WHERE crn='".$crn."'";
  
  return array('posts' => getElements($q));
 }
 function getAnno($crn){
  $q= "SELECT u.name as teachername, p.post_title as title, p.post_text as announcement
  
   FROM  posts as p, users as u
   WHERE  crn='".$crn."'
   AND  p.ucid = u.ucid
   AND  type='t'"
  ;
  
  return array('anno' => getElements($q));
 }
 
 function getQuiz($crn,$ucid){
  $q = "SELECT q.quiz_quest AS question, q.a AS a, q.b AS b, q.c AS c, q.d AS d, q.qid AS qid
    FROM  quiz AS q, quizAns AS qa
    WHERE qa.ucid =  '".$ucid."'
    AND qa.crn =  '".$crn."'
    AND q.qid = qa.qid";
  
  return array('quiz' => getElements($q));
 }
 
 function getQuizScore($crn,$ucid){
  $q= " SELECT SUM( q.grade ) as score
    FROM quiz AS q, quizAns AS qa
    WHERE qa.ucid =  '".$ucid."'
    AND qa.crn =  '".$crn."'
    AND q.qid = qa.qid
    AND q.quiz_ans = qa.student_ans";
  
  return array('score' => getElements($q));
 }
 
 function getCourseInfo($crn){
  $q= " SELECT    u.name AS participant, u.ucid AS studentid, u.email AS email,
       s.capacity AS capacity, s.actual AS actual,s.teacherid AS teacherid

     FROM  sections AS s, courses AS c, users AS u, enrolled AS e
     WHERE  s.courseid = c.courseid
      AND s.crn = e.crn
      AND e.crn =  '".$crn."'
      AND e.ucid = u.ucid";
  
  return array('courseInfo' => getElements($q));
 }
 function AddTopic($crn,$ucid,$topic,$detail){
  $q= " INSERT INTO forumQuest (crn,ucid,topic,detail) VALUES
    ('".$crn."','".$ucid."','".$topic."','".$detail."')
   ";
  
  if(insertData($q) == "Success")
  {
  $a= " Your topic is Created";
  $b= " Database is update";
  return array('AddTopic' => $a, 'confirm' => $b);
  }
  else
  {
	return array('failure'=> "Failed");
  }
 }
 
 
 
 
 if(isset($_GET['f'])){// check if function field is set
  $f = $_GET['f'];
  //$u = 'gt35';
  $u = $_POST['ucid'];
  $s = $_POST['semesterid'];
  
  if($f == 'getSemesters'){
   echo json_encode(getSemesters($u));
  }
  if($f == 'getClasses'){
   $s = $_POST['semesterid'];
   echo json_encode(getClasses($u,$s));
 
  }
  if($f == 'getPosts'){
   $c = $_POST['crn'];
   
   echo json_encode(getPosts($c));
   
  }
  if($f == 'getAnno'){
   $c = $_POST['crn'];
   //$u = $_POST['ucid']; 
   //echo json_encode($c);
   echo json_encode(getAnno($c));
   
  }
  if($f == 'getCourseInfo'){
   $c = $_POST['crn'];
   
   echo json_encode(getCourseInfo($c));
   
  }
  if($f == 'getQuiz'){
   $c = $_POST['crn'];
   $u = $_POST['ucid'];
   //echo json_encode($u);
   echo json_encode(getQuiz($c,$u));
   
  }
  if($f == 'getQuizScore'){
   $c = $_POST['crn'];
   
   echo json_encode(getQuizScore($c));
   
  }
  if($f == 'AddTopic'){
   $c = $_POST['crn'];
   $u = $_POST['ucid'];
   $t = $_POST['topic'];
   $d = $_POST['detail'];
   
   echo json_encode(AddTopic($c,$u,$t,$d));
   
  }
 }else echo "function not set";
?>