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
			<div id = "links"></div>

	<div id = "content">

			<div id = "addNewTopic">
						<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
						<tr>
						<form id="form1" name="form1" method="post" action="add_topic.php">
						<td>
						<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
						<tr>
						<td colspan="3" bgcolor="#E6E6E6"><strong>Create New Topic</strong> </td>
						</tr>
						<tr>
						<td width="14%"><strong>Topic</strong></td>
						<td width="2%">:</td>
						<td width="84%"><input name="topic" type="text" id="topic" size="50" /></td>
						</tr>
						<tr>
						<td valign="top"><strong>Detail</strong></td>
						<td valign="top">:</td>
						<td><textarea name="detail" cols="50" rows="3" id="detail"></textarea></td>
						</tr>
						<tr>
						<td><strong>Name</strong></td>
						<td>:</td>
						<td><input name="name" type="text" id="name" size="50" /></td>
						</tr>
						<tr>
						<td><strong>Email</strong></td>
						<td>:</td>
						<td><input name="email" type="text" id="email" size="50" /></td>
						</tr>
						<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><input type="submit" name="Submit" value="Submit" /> <input type="reset" name="Submit2" value="Reset" /></td>
						</tr>
						</table>
						</td>
						</form>
						</tr>
						</table>



			</div>
			
    </div>

    
    <script>
	$("#addNewTopic").hide();

	
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
	
	function createLinks(selectedcrn)
	{

		$("#links").html('');
		$("#links").append('<a href="#" onclick="loadForum('+selectedcrn+');"> Class Forum </a> <br>' );
		$("#links").append('<a href="#" onclick=""> Class Assignments </a>');
		
	
	
	}

	function loadForum(selectedcrn)
	{
		$("#content").append('<button id="addTopic">' + "Add Topic" +'</button>')
		$("#addTopic").click(function(){
			$("#addNewTopic").show();
		});
	}

	function getQuiz(selectedcrn)
	{
		var urltocall =  urlpath + "/back/get.php?f=getQuiz";
			   var data = {crn:selectedcrn, ucid: "<?php echo ($_GET['ucid']); ?>"};
			
						 $.ajax({
									url: urltocall,
									data: data,
									type: "post",
									dataType: "json",
									async: false,
									success: function(output)
										{
										console.log(output);
											$("#quiz").html('');
											for(var i = 0; i<output.quiz.length; i++)
											{
												//$("#quiz").append(output.quiz[i][0] + '<br>' );
													for (var j = 1; j < 5 ; j++)
													{
														//$("#quiz").append('<input type="button" id='+ i +' onclick="selectedAnswer('+output.quiz[i][5] + ');" value="'+ output.quiz[i][j]+'">' );
														//$("#quiz").append($('<button>' + output.quiz[i][j] + '</button>').attr( "onClick", 'checkAnswer("'  + output.quiz[i][5] + '");'));
														//$("#quiz").append('<br>');
													}
											}
										}
								});
	
	}
	function selectedAnswer(qid)
	{
		
		
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
											$("#courses").append($('<button>' + output.classes[i][0] + '</button>').attr( "onClick", 'createLinks("'  + output.classes[i][2] + '");'  ));
											$("#courses").append('<br>');
										}
									}
							});
	}
</script>
</body>  

</html>
