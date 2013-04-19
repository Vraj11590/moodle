<?php
//gets information from database, places into array with correct tags and echoes it encoded in json.
//passed through curl from control.

$link = mysql_connect('sql.njit.edu', 'thh4', 'yapping45');
if (!$link) {
    		die(' Could not connect: ' . mysql_error());//Connected successfully
	    }
mysql_select_db("thh4") or die(mysql_error());

	$ucid = $_POST['ucid'];
  	$result = mysql_query(" SELECT DISTINCT s.semesterid AS semesterid
  				FROM sections AS s, enrolled AS e
				AND e.ucid =  '".ucid."'");
	   while($row = mysql_fetch_array($result)){															
       echo json_encode(array($row['semesterid']));
       
 

	}
   

?>

