<?php

    $ucid = $_POST['ucid'];
    $semesterid = $_POST['semes'];

    $query = " SELECT 	e.ucid as studentid,
	    		c.courseid AS courseid, c.coursename AS coursename,
                        s.crn AS crn, s.sectionid AS sectionid, s.semesterid AS semesterid,
                        u.name AS teachername
                        FROM 	sections AS s, enrolled AS e, courses AS c, users AS u
                        WHERE 	e.ucid = '".$ucid".'
                        AND 	e.crn = s.crn
                        AND 	s.courseid = c.courseid
                        AND 	s.teacherid = u.ucid
             ";
                                
    
    
    

echo json_encode($array);	
?>