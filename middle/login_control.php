<?php
	session_start();
	include('dbconnection.class.php');
	include('dbconfig.php');
	//$connection = new Database();
	$connection = new mysqli(db_host, db_user, db_pass, db_name); 
	
	$data = $_POST;
	$ucid = $data['ucid'];
	$password = $data['password'];
	
	//echo json_encode($data);
	$ucid = $connection->real_escape_string($_POST['ucid']);
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
						
                        $_SESSION['UCID'] = $result_row->ucid;
                        $_SESSION['TYPE'] = $result_row->type;
                        $_SESSION['NAME'] = $result_row->name;
                        $_SESSION['user_logged_in'] = 1;
                        
                        setcookie("ucid", $result_row->ucid, time() + (3600*24*100));
                        setcookie("type", $result_row->type, time() + (3600*24*100));
                        
                       // $user_is_logged_in = true;
                        echo json_encode(array("flag" => true, "name" => $result_row->name));
			//return true;
                 
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

	//$data["ucid"] = "CHANGED";

	
	
?>