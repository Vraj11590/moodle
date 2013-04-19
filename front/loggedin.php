<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php 
	include('../resources/header.php');
	include('return.php');
	$arr = array('ucid' => $_GET['ucid']);
	
	echo '<br><a a href = '.$urlPath.'/front/index.php?logout> Logout </a><br>';
	echo'<a a href = '.$urlPath.'> Check Session </a>';

?>
<html>
    
<head>
    <title> Moodle++ </title>

    <link href="css/structure.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.js"></script>
    <!--<script src="js/main.js" type="text/javascript"> </script>-->

</head>    

<body>
    <div id="container">
	<div id="userpanel">
	    <label>Hello, <?php echo($_GET['name']); ?> </label>
	</div>
	
	<div id="semesters">
	    <select id="sel_semester"></select>
	    
	</div>
    </div>
    
    
<script>
	var semester = 	<?php echo ( getJSON('getSemesters',$arr,$urlPath) ); ?>;
	//alert(test);
	//alert(test.semesters[0]);
	//
	var len = semester.semesters.length;
	for(var i = 0; i<len; i++)
	{
	    $("#sel_semester").append($('<option></option>').attr("value", semester.semesters[i]).text(semester.semesters[i]));
	}
	
	$("#sel_semester").change(function(){
		    alert($("#sel_semester").val());
	});
	

</script>
</body>  

</html>
