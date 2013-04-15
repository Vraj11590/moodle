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
						$url = 'http://localhost/moodle/back/simplexmlreturn.php'
						//$url = 'http://web.njit.edu/~thh4/xmlFormat.php';

						//$postdata = array('ucid' => $_POST["ucid"], 'password' => $_POST["password"]);
						$postdata = $ucid;
						$c = curl_init();
						curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type' => 'application/xml'));
						curl_setopt($c, CURLOPT_URL, $url);
						curl_setopt($c, CURLOPT_POST, true);
						curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
						$result = curl_exec ($c); 
						curl_close ($c); 
							//sessin may need to be set in front
                        // $_SESSION['UCID'] = $result_row->ucid;
                        // $_SESSION['TYPE'] = $result_row->type;
                        // $_SESSION['NAME'] = $result_row->name;
                        // $_SESSION['user_logged_in'] = 1;
                        
                        // setcookie("ucid", $result_row->ucid, time() + (3600*24*100));
                        // setcookie("type", $result_row->type, time() + (3600*24*100));
                        
                       // $user_is_logged_in = true;
                        echo $result;
                 
                    } else {
                        
                        $errors[] = "Wrong Password.";
						echo 'wrong password';
                        return false;
                    }

        }
       else{
            $errors[] = "This user does not exist.";
            return false;
            }

	//$data["ucid"] = "CHANGED";

	
	
?>