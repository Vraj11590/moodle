<?php
//gets information from database, places into array with correct tags and echoes it encoded in json.
$ucid = $_POST['ucid'];//passed through curl from control.
$array=array('20121','20122','20123','20131','20132','20133');//example dummy data
$arr = array('semesters'=>$array);
echo json_encode($arr);//control can retrieve this through curl and pass to front
?>