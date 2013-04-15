-- this file contents all the queries which needed for the project



-- Query 1: Courses recalled for  particular semester
--this query gets all the courses the student is register for, it includes
-- previous semesters and current semester. return a table.

SELECT 
e.ucid as studentid,
s.semesterid as sid,s.crn as crn, s.sectionid AS sectionid,
c.courseid AS courseid,c.coursename AS coursename, 
u.name AS teachername

FROM  courses AS c, sections AS s, users AS u, enrolled AS e

WHERE s.teacherid = u.ucid
AND s.courseid = c.courseid
AND s.crn = e.crn
AND e.ucid =  'thh4'

GROUP BY s.crn

-- ThienVuong Huynh --
