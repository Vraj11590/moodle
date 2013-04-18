<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php 
	include('../resources/header.php');
	include('return.php');
	$arr = array('ucid' => $_GET['ucid']);
	$x = getJSON('getSemesters',$arr,$urlPath);
	echo $x;
	
	echo '<br><a a href = '.$urlPath.'/front/index.php?logout> Logout </a><br>';
	echo'<a a href = '.$urlPath.'> Check Session </a>';
	// $url = $urlPath.'/front/index.php';
	// //$postdata = array('ucid' => $_POST["ucid"], 'password' => $_POST["password"]);
	
	// $c = curl_init();
	// //curl_setopt($c, CURLOPT_FOLLOWLOCATION,true);
	// curl_setopt($c, CURLOPT_URL, $url);
	// //curl_setopt($c, CURLOPT_POST, true);
	// curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	// //curl_setopt($c, CURLOPT_POSTFIELDS,$postdata);
	// $result = curl_exec ($c); 
	// curl_close ($c); 
	// echo $result;
?>

<p> Hey,  <?php echo($_GET["ucid"]); ?></p>
<b>LOOK AT NEW HEADER FILE IN THE ROOT FOLDER </b> it will make your life easier by not having to change every single url.<br><br>
VJ:<br>
i added return.php. it has a function so you can easily get whatever you need encoded into a json object. Take a look at it.<br>
$urlPath./moodle/ will redirect to $urlPath./moodle/front/index.php which is the old clientproxy code. <br> 
i also moved a lot of stuff to the middle and took care of session, so you can focus more on making this shit look pretty/ getting stuff from Hyun. <br>
HYUN:<br>
i added a couple of files in the back folder for you to write out queries for.<br>
dont worry about curl or anything just give me a json object <b> WITH TAGS</b>.
ill be referring to these files through curl and sending you values through $_POST;<br> 
look at getSemesters for an example of what i mean.<br>

