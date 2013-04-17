<?php
//gets information from database, places into array with correct tags and echoes it encoded in json.
$ucid = $_POST['ucid'];//passed through curl from control.
$array('semseters' => array('20121','20122','20123','20131','20132','20133'));//example dummy data
echo json_encode($array);//control can retrieve this through curl and pass to front
?>