<?php
	//main control file. all calls go to this.
	include('../resources/header.php');
	include('functions.php');
	$functionCall = false;
	$auth = false;
	$data = $_POST;
	include('insert.php');
	include('login_control.php');
?>		