<?php
//gets information from database, places into array with correct tags and echoes it encoded in json.


$array('Classes' => array('20121','20122','20123','20131','20132','20133'));
echo json_encode($array);	
?>