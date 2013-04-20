<?php
	//everyone should have this header on their njit server, cURL only needs to be used for passing data
	
	 //database configuration
    
    //config for local db COMMENT OUT DO NOT DELETE
	define('db_host', "127.0.0.1");
        /**custom var for faster local perfomance, 
									need to change config.inc.php localhost 
									to 127.0.0.1 for any effect*/
									
   //define('db_host', "localhost");
    define('db_name', "thh4");
    define('db_pass', "password");
    define('db_user', "localhost");
    
    //config for njit sql server COMMENT OUT DO NOT DELETE
	
     // define('db_host', "sql.njit.edu");
     // define('db_name', "thh4");
     // define('db_pass', "yapping45");
     // define('db_user', "thh4");
	
    //echo ("dbconfig.php loaded");
	
	//default url paths for ease of use
	
	/*
	individualized urls for release, 
	change $urlPath to these in corresponding files 
	to override*/
	$vp78 = 'http://web.njit.edu/~vp78/moodle';//front
	$gt35 = 'http://web.njit.edu/~gt35/moodle';//middle
	$thh4 = 'http://web.njit.edu/~thh4/moodle';//back
	$local = 'http://localhost/moodle';//local
	/**
		current path used in all files, can be ovveriden*/
		global $urlPath;
	$urlPath = $local;
	$con = new mysqli(db_host, db_user, db_pass, db_name); 
?>