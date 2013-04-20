<?php
	//main control file. all calls go to this.
	include('../resources/header.php');
	$functionCall = false;
	$auth = false;
	$data = $_POST;
	include('return.php');
	include('login_control.php');
?>		