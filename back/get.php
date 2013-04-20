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
		
		$q =	"SELECT DISTINCT s.semesterid  
		FROM sections AS s, enrolled AS e
		WHERE e.crn = s.crn
		AND e.ucid = '".$ucid."'";
		return array('semesters' => getElements($q));
		
	}
	
	if(isset($_GET['f'])){// check if function field is set
		$f = $_GET['f'];
		$u = $_POST['ucid'];
		if($f == 'getSemesters'){
			echo json_encode(getSemesters($u));
		}
	}else echo "function not set";
?>