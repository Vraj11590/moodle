<<<<<<< HEAD
<?php
$url = 'http://web.njit.edu/~gt35/moodle/middle/login_control.php';
//$url = 'http://web.njit.edu/~vp78/m++/test.php';

$postdata = array("ucid" => $_POST["ucid"], "password" => $_POST["password"]);

$c = curl_init();
curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type' => 'application/xml'));
curl_setopt($c, CURLOPT_URL, $url);
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
$result = curl_exec ($c); 
curl_close ($c); 



if($result){
	echo "Printed inside clientproxy.php";
	$edit = json_decode($result);
	print_r($edit);
	
}else
	header('HTTP/1.1 500 Internal Server Error');

=======
<?php
//$url = 'http://web.njit.edu/~gt35/moodle_mvc/models/student/student_model.class.php';
$url = 'http://localhost/moodle/middle/login_control.php';
//$url = 'web.njit.edu/~gt35/moodle/middle/login_control.php';
$postdata = array('ucid' => $_POST["ucid"], 'password' => $_POST["password"]);

$c = curl_init();
curl_setopt($c, CURLOPT_URL, $url);
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
//curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type' => 'application/xml'));
$result = curl_exec ($c); 
 

if(curl_exec($c) === false)
{
    echo 'Curl error: ' . curl_error($c);
}
else
{
    echo 'Operation completed without any errors<br>';
}
curl_close ($c);


if($result=='logged in'){
	header("Location: loggedin.php");
	//echo "Printed inside clientproxy.php";
	//$edit = json_decode($result);
	
	
}else
	header('HTTP/1.1 500 Internal Server Error');

>>>>>>> working login thru db, logout not working
?>