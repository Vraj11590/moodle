<?php	
	include('../resources/header.php');
	
	
	function getElements($q){
		$a = array();//temp array to store shit
		$con = new mysqli(db_host, db_user, db_pass, db_name); 
			$result = $con->query($q);
			while($row = $result->fetch_row()){
				
				array_push($a,$row[0]);
			}
			return $a;
		}
		
	function getSemesters($ucid){
		
		$q =   "SELECT DISTINCT s.semesterid  
			
			FROM 	sections AS s, enrolled AS e
			WHERE	e.crn = s.crn
			AND 	e.ucid = '".$ucid."'";
	
		return array('semesters' => getElements($q));
		
	}
	
/// function to get classes in semester
	function getClasses($ucid,$semesterid){
		$q=	"SELECT c.courseid AS courseid, c.coursename AS coursename,
				s.crn AS crn, s.sectionid AS sectionid,
				u.name AS teachername
			
			FROM 	sections AS s, enrolled AS e, courses AS c, users AS u
			WHERE 	e.ucid = '".$ucid."'
			AND 	s.semesterid = '".$semesterid."'
			AND 	e.crn = s.crn
			AND 	s.courseid = c.courseid
			AND 	s.teacherid = u.ucid";
		
		return array('classes' => getElements($q);
	}

///function to get posts in each class
	
	function getPosts($crn){
		$q=	"SELECT ucid,post_title,post_text
			
			FROM posts
			WHERE crn='".$crn."'";

	return array('posts' => getElements($q);
	}
	


	if(isset($_GET['f'])){// check if function field is set
		$f = $_GET['f'];
		$u = $_POST['ucid'];
		$s = $_POST['semesterid'];
		$c = $_POST['crn'];

		if($f == 'getSemesters'){
			echo json_encode(getSemesters($u));
		}
		if($f == 'getClasses'){
			echo json_encode(getClasses($u,$s);
			
		}
		if($f == 'getPosts'){
			echo json_encode(getPosts($c);
		}
	}else echo "function not set";
?>
