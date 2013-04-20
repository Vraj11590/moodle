<?php
 
 $target = "upload/"; 
 $target = $target . basename( $_FILES['uploaded']['name']) ; 
 $ok=1; 
  //This gets all the other information from the form  
 $crn=$_POST['crn']; 
 $ucid=$_POST['ucid']; 
 $file_format=$_POST['format'];
 $file_name=($_FILES['uploaded']['name']); 
 
 // Connects to your Database 
$link = mysql_connect('sql.njit.edu', 'thh4', 'yapping45');
if (!$link) {
    die(' Could not connect: ' . mysql_error());
}
echo ' <p>Connected successfully</p>';

mysql_select_db("thh4") or die(mysql_error());
echo '<p>Database selected</p>'; 
 
 //Writes the information to the database 
 mysql_query("INSERT INTO `employees` VALUES ('$ucid', '$crn', '$file_format', '$file_name')") ; 
 

 //This is our size condition 
  	if ($uploaded_size > 350000) { 
			echo "Your file is too large.<br>"; 
			$ok=0; 
		} 
 
 //This is our limit file type condition 
		if ($uploaded_type =="text/php") { 
			echo "No PHP files<br>"; 
			$ok=0; 
		} 
 
 //Here we check that $ok was not set to 0 by an error 
		if ($ok==0) { 
			echo "Sorry your file was not uploaded"; 
		} 
 //If everything is ok we try to upload it 
		else{
				if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) { 
						echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded"; 
				} 
				else { 
						echo "Sorry, there was a problem uploading your file."; 
				}
			}				
  
 ?> 
