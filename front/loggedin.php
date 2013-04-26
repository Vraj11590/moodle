<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php


	include('../resources/header.php');
	include('return.php');
	
	$arr = array('ucid' => $_GET['ucid']);
	//echo '<br><a a href = '.$urlPath.'/front/index.php?logout> Logout </a><br>';
	//echo'<a a href = '.$urlPath.'> Check Session </a>';

	
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
	<div id="header">	
		<div id="userpanel">
			<label>Hello, <?php echo($_GET['name']); ?>
			<?php echo '<a href = '.$urlPath.'/front/index.php?logout> Logout </a>'; ?>
			</label>
		  <div id="semesters">
		
			<select id="sel_semester"></select>
			

		
		 </div>
		</div>
		

	</div> 
				<div id = "courses"></div>
			<div id = "posts"></div>
			<div id = "quiz"></div>
    </div>

    
    <script>
	var semester =  <?php echo ( getJSON('getSemesters',$arr,$urlPath) ); ?> ;
	var urlpath = "<?php echo $urlPath; ?>";
	var len = semester.semesters.length;
	//alert(len);
	
	for(var i = 0; i<len; i++)
	{
	    $("#sel_semester").append($('<option></option>').attr("value", semester.semesters[i]).text(semester.semesters[i]));
	}
	
	$("#sel_semester").change(function(){
		    var selectedsemester = $("#sel_semester").val();
		    getClasses(selectedsemester);

		    
	});
	
	function getPosts(selectedcrn)
	{
		 var urltocall =  urlpath + "/back/get.php?f=getPosts";
		   var data = {crn:selectedcrn};
		
		             $.ajax({
								url: urltocall,
								data: data,
								type: "post",
								dataType: "json",
								async: false,
								success: function(output)
									{
										getQuiz(selectedcrn);
										$("#posts").html('');
										for(var i = 0; i<output.posts.length; i++)
										{
											for(var j = 0; j < 3; j++)
											{
												$("#posts").append(output.posts[i][j] + '<br>');
											}
										}
									
									}
							});
	
	
	
	}
	function getQuiz(selectedcrn)
	{
	var urltocall =  urlpath + "/back/get.php?f=getQuiz";
		   var data = {crn:selectedcrn};
		
		             $.ajax({
								url: urltocall,
								data: data,
								type: "post",
								dataType: "json",
								async: false,
								success: function(output)
									{
										console.log(output);
									
									}
							});
	
	}
	
	function getClasses(selectedsemester)
	{
		   var urltocall =  urlpath + "/back/get.php?f=getClasses";
		   var data = {ucid:"<?php echo ($_GET['ucid']);?>" , semesterid:selectedsemester, flag_ajax:"getClasses", urlPath_ajax: urlpath};
		
		             $.ajax({
								url: urltocall,
								data: data,
								type: "post",
								dataType: "json",
								async: false,
								success: function(output)
									{
									//console.log(output);
									//console.log(output.classes[0][0]);
									$("#courses").html('');
										for(var i =0; i<output.classes.length;i++)
										{
											$("#courses").append($('<button>' + output.classes[i][0] + '</button>').attr( "onClick", 'getPosts("'  + output.classes[i][2] + '");'  ));
											$("#courses").append('<br>');
										}
									}
							});
	}
</script>
</body>  

</html>
