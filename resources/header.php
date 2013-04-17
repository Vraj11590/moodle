<?php
	 //database configuration
    
    //config for local db
    define('db_host', "localhost");
    define('db_name', "thh4");
    define('db_pass', "password");
    define('db_user', "localhost");
    
    //config for njit sql server
    // define('db_host', "sql.njit.edu");
    // define('db_name', "thh4");
    // define('db_pass', "yapping45");
    // define('db_user', "thh4");
    //echo ("dbconfig.php loaded");
	
	//modifies default url path for ease of use
	//individualized urls for release
	$vp78 = 'http://web.njit.edu/~vp78/moodle';
	$gt35 = 'http://web.njit.edu/~gt35/moodle';
	$thh4 = 'http://web.njit.edu/~thh4/moodle';
	$local = 'http://localhost/moodle';
	//current testing url path
	$urlPath = $local;
?>