<?php	
	function echoURL($dest,$authV){//dest is destination, auth only set true if password match
		echo json_encode($arr = array('url'=>$dest, 'auth' => $authV));
	}
	session_start();
	$data = $_POST;
	$auth = false;
	if(isset($_GET['logout'])){
		
		$_SESSION = array();
        session_destroy();
        $user_is_logged_in = false;
		$rd =  $urlPath.'/front/login.php?loggedout';
		
	}else 
	
	if(isset($ucid)){
		$rd =  $urlPath.'/front/loggedin.php?name='.$name;
	}else 
	
	if(isset($data["ucid"],$data["password"])){	
		$ucid = $data['ucid'];
		$password = $data['password'];	
		$connection = new mysqli(db_host, db_user, db_pass, db_name); 
		
		$ucid = $connection->real_escape_string($ucid);
		$checklogin = $connection->query("SELECT ucid,password,name,type FROM users WHERE ucid = '".$ucid."';");
        if($checklogin->num_rows == 1)
        {
            $result_row = $checklogin->fetch_object();
			
            if($password == $result_row->password)
			{	$auth = true;
				$type = $result_row->type;
				$name = $result_row->name;
				$rd =  $urlPath.'/front/loggedin.php?name='.$name.'&ucid='.$ucid.'&type='.$type;
				echoURL($rd,$auth);
				}else{
				$rd =  $urlPath.'/front/login.php?invalidPWD';
				echoURL($rd,$auth);
			} 
			}else{
			$rd =  $urlPath.'/front/login.php?usr404';
			echoURL($rd,$auth);
		}
		}else{
		$rd =  $urlPath.'/front/login.php?nopost';
		echoURL($rd,$auth);
	} 
	
	
	//echo json_encode($arr = array('url'=>$rd, 'auth' => $auth));
	// if(!$connection){
	// $rd =  '?noDBconn';
	// }
	?>	