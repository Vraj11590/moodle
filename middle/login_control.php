<?php
	
	include('dbconnection.class.php');
	include('dbconfig.php');
	//$connection = new Database();
	$data = $_POST;
	
	if(isset($data['ucid'],$data['password'])){
	$ucid = $data['ucid'];
	$password = $data['password'];
	$ucid = $connection->real_escape_string($_POST['ucid']);
	
	
	$connection = new mysqli(db_host, db_user, db_pass, db_name); 
     $checklogin = $connection->query("SELECT ucid,password,name,type FROM users WHERE ucid = '".$ucid."';");
		if(!$connection){
			echo "connection failed";
			}
        if($checklogin->num_rows == 1)
        {
            $result_row = $checklogin->fetch_object();
			// echo 'rec p:';
            // echo ($result_row->password);
            // echo ($_POST['password']);
			// echo '<br> rec u:';
            // echo($result_row->name);
            if($_POST['password'] == $result_row->password)
                    {	
						// $url = 'http://localhost/moodle/back/simplexmlreturn.php';//put the curl shit in a fucntion for getinfo
						// $url = 'http://web.njit.edu/~thh4/xmlFormat.php';

						// $postdata = array('ucid' => $_POST["ucid"], 'password' => $_POST["password"]);
						// $postdata = array('ucid' => $ucid);
						// $c = curl_init();
						// curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type' => 'application/xml'));
						// curl_setopt($c, CURLOPT_URL, $url);
						// curl_setopt($c, CURLOPT_POST, true);
						// curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
						// curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
						// $result = curl_exec ($c); 
						// curl_close ($c); 
							//sessin may need to be set in front
                       // $user_is_logged_in = true;
                        //echo json_encode(array("flag" => true, "name" => $result_row->name));
						//return true;
                       // echo $result;
					   $arr  = array('ucid' => $ucid, 'type'=> $result_row->type, 'name'=$result_row->name);
					   echo json_encode($arr);
                    } else {
                        
                        //$errors[] = "Wrong Password.";
			echo 'false';
                        return false;
                    }

        }
       else{
            //$errors[] = "This user does not exist.";
            return false;
            }
			
	}
	
	if(isset($data['operation'])){
		if($data['operation'] == 'logout'){
		$_SESSION = array();
        session_destroy();
        $user_is_logged_in = false;
        $messages[] = "You have been logged out.";
        echo"Logout finished.";
		}
		}
	//$data["ucid"] = "CHANGED";

	
	
?>