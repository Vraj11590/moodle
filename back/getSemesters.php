
<?php

//gets information from database, places into array with correct tags and echoes it encoded in json.
//passed through curl from control.

$link = mysql_connect('sql.njit.edu', 'thh4', 'yapping45');
if (!$link) {
                echo "died";
                die(' Could not connect: ' . mysql_error());//Connected successfully
            }

            mysql_select_db("thh4") or die(mysql_error());
    
            
            $ucid = $_POST['ucid'];
            $result = mysql_query("  SELECT DISTINCT s.semesterid  
                                     FROM sections AS s, enrolled AS e
                                     WHERE e.crn = s.crn
				     AND e.ucid =  '".$ucid."'");
	   $i = 0;
	   $d = array();
           while($row = mysql_fetch_assoc($result))
            {
		//$d = ('semesters' => $row);
	        echo json_encode($row);
            }

//$array = array('2012','2013','2014');  
//$a = array('semesters'=>$array);
//echo json_encode($a);
?>

