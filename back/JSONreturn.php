<?php

$link = mysql_connect('sql.njit.edu', 'thh4', 'yapping45');
if (!$link) {
    die(' Could not connect: ' . mysql_error());
}
echo ' <p>Connected successfully</p>';
$ucid = $_POST['ucid'];
mysql_select_db("thh4") or die(mysql_error());
echo '<p>Database selected</p>';
  $result = mysql_query("  	SELECT 	e.ucid as studentid,
					c.courseid AS courseid, c.coursename AS coursename,
					s.crn AS crn, s.sectionid AS sectionid, s.semesterid AS semesterid,
					u.name AS teachername
				FROM 	sections AS s, enrolled AS e, courses AS c, users AS u
				WHERE 	e.ucid = '".$ucid."'
				AND 	e.crn = s.crn
				AND 	s.courseid = c.courseid
				AND 	s.teacherid = u.ucid");
	   while($row = mysql_fetch_array($result)){															
<<<<<<< HEAD:back/simpleJASONreturn
       echo json_encode(array($row['semesterid'],$row['crn'],$row['courseid'], $row['coursename'], $row['sectionid'], $row['teachername'])); 
=======
       echo json_encode(array($row['crn'],$row['courseid'], $row['coursename'], $row['sectionid'], $row['teachername'])); 
>>>>>>> working json return:back/JSONreturn.php
	}
	?>

