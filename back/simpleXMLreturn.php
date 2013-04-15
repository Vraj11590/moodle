<?php

$link = mysql_connect('sql.njit.edu', 'thh4', 'yapping45');
if (!$link) {
    die(' Could not connect: ' . mysql_error());
}
echo ' <p>Connected successfully</p>';

mysql_select_db("thh4") or die(mysql_error());
echo '<p>Database selected</p>';
$_POST = $ucid;
  $result = mysql_query("	SELECT 	e.ucid as studentid,
																	c.courseid AS courseid, c.coursename AS coursename,
																	s.crn AS crn, s.sectionid AS sectionid, s.semesterid AS semesterid,
																	u.name AS teachername
															FROM 	sections AS s, enrolled AS e, courses AS c, users AS u
															WHERE 	e.ucid = '".$ucid."'
																AND e.crn = s.crn
																AND s.courseid = c.courseid
																AND s.teacherid = u.ucid");
	   while($row = mysql_fetch_array($result)){															
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo "<xml>";
echo "<person><ucid>" . $row["studentid"] ."</ucid>";
echo "<crn>". $row["crn"] ."</crn>";
echo "<courseid>" . $row["courseid"] ."</courseid>"; 
echo "<coursename>". $row["coursename"] ."</coursename>";
echo "<sectionid>". $row["sectionid"] ."</sectionid>";
echo "<semesterid>". $row["semesterid"] ."</semesterid>";
echo "<teachername>" . $row["teachername"] ."</teachername></person>";
echo "</xml>"; 
	}
	?>
	
