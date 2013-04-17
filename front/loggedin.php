<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php 
			include('../resources/header.php');
		$url = $urlPath.'/front/clientproxy.php';
		//$postdata = array('ucid' => $_POST["ucid"], 'password' => $_POST["password"]);
		
		$c = curl_init();
		//curl_setopt($c, CURLOPT_FOLLOWLOCATION,true);
		curl_setopt($c, CURLOPT_URL, $url);
		//curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
		$result = curl_exec ($c); 
		curl_close ($c); 
		echo $result;
		
	// $url = 'http://localhost/moodle/middle/logout_control.php';
	// $c = curl_init();
	// curl_setopt($c, CURLOPT_URL, $url);
	// //curl_setopt($c, CURLOPT_POST, true);
	// curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	// //curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
	// //curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type' => 'application/xml'));
	// $result = curl_exec ($c); 
	// echo $result;
 ?>
 
 <p> Hey,  <?php echo($_GET["name"]); ?></p>
 
<a a href = "http://localhost/moodle/front/clientproxy.php?logout"> Logout </a>
