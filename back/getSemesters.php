
<?php
include('../resources/header.php');

			$ucid = $_POST['ucid'];
			//$ucid = 'gt35';
				$q =	"SELECT DISTINCT s.semesterid  
						FROM sections AS s, enrolled AS e
						WHERE e.crn = s.crn
						AND e.ucid = '".$ucid."'";
							
				$result = $con->query($q);
	   $d = array();
		while($row = $result->fetch_row()){
			
			array_push($d,$row[0]);
			}
		
//$x = array('2012','2013','2014');  
 $a = array('semesters'=>$d);
echo json_encode($a).'<br>';
///$a = array('semesters'=>$x);
?>

