<?php


$data = $_POST;

$data["ucid"] = "CHANGED";

echo json_encode($data);

//$ucid = $_POST["ucid"];
//$pass = $_POST["password"];
//
//$values = array("ucid" => $ucid, "password" => $pass);
//
//
//echo (json_encode($values));

?>