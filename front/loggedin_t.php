<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php


	include('../resources/header.php');
	include('return.php');
	//include('dataget.php')
	$arr = array('ucid' => $_GET['ucid']);
	$crn = array('crn' => '4');
	//echo '<br><a a href = '.$urlPath.'/front/index.php?logout> Logout </a><br>';
	//echo'<a a href = '.$urlPath.'> Check Session </a>';

	
?>

<html>    
<head>
    <title> Moodle++ Teacher</title>

    <link href="css/structure_t.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.js"></script>   
    <script src="js/teacher/assignment.js"></script>   



	
	<!--<script src="js/main.js" type="text/javascript"> </script>-->
	

</head>    

<body>
    <div id="container">
		<div id="header">	
			<div id="userpanel">
				<label>Hello, <?php echo($_GET['name']); ?>
				<?php echo '<a href = '.$urlPath.'/front/index.php?logout> Logout </a>'; ?>
				</label>
			</div>
		</div>
		<div id="nav">
			<div id="semesters">
			
				<select id="sel_semester"></select>
			</div>
			<div id = "courses"></div>
			
			<div id = "links">
				
				<a href = "forum/forum.php" id="forum"> Class Forum (Moderate *.*) </a><br>
				<a href = "assignments.php" id="assignment"> Class Assignments (Add / Del) </a><br>
				<a href = "grades.php" id="grades"> Grades (View/Change)</a><br>
				<a href = "cinfo.php" id="cinfo"> Course Information (Manage) </a><br>

			</div>
			<br>
			<div id = "upcoming">
			
				<b> <label> <font color="red"> Upcoming Deadlines </font> <label> </b>
				<hr>
				Friday - PHYS111-003 Homework 5 Due! 
				<hr>
				Monday - CS100-001 Programming Assignment 4 Due! 
			</div>
			<br>
			<div id = "participants">
					
					<label> Participants : </label><hr>
					
					Vrajesh Patel
					<hr>
					Giaspur Tabangay
					<hr>
					Mike Smith
					<hr>
					John Doe
					
			</div>
			

		</div>
		<div id="dynadiv"> Dynamic div for all Links </div>
	<div id = "content">
		<div id = "title">  Welcome to Moodle  </div>
		<div id = "anno">
			Please select a course to being.

		</div>
		
	</div>
    
    <script>
	var classarray;
	var selectedcrn;
	var semester;
	var urlpath = "<?php echo $urlPath; ?>";
	var ucid = "<?php echo ( $_GET['ucid'] ); ?>";
	window.onload = getSemester(ucid);
	$('#dynadiv').hide();
	
	
	function getSemester(ucid)
	{
		urltocall = urlpath + "/back/get.php?f=getSemesters_t"
		//alert(urltocall);
		$.ajax({
					url: urltocall,
					data: {ucid:ucid},
					type: "post",
					dataType: "json",
					async: false,
					success: function(output)
					{
											console.log(output);
											semester=output;
					}
				});
	}
	
	
	console.log (urlpath);
	$("#title").hide();
	$('#cinfo').on('click', function(e){
			//alert("link clicked");
			if(!selectedcrn)
			{
				alert("You must select a class");
				e.preventDefault();
			}
			else
			{
				e.preventDefault();
				var page_url=$(this).prop('href');
				page_url = page_url + '?crn=' +selectedcrn;
				//alert(page_url);
				$('#content').load(page_url);
			}
		});
	$('#grades').on('click', function(e){
				//alert("link clicked");
				if(!selectedcrn)
				{
					alert("You must select a class");
					e.preventDefault();
				}
				else
				{
					e.preventDefault();
					var page_url=$(this).prop('href');
					page_url = page_url + '?crn=' +selectedcrn;
					//alert(page_url);
					$('#content').load(page_url);
				}
			});

	$('#forum').on('click', function(e){
			//alert("link clicked");
			e.preventDefault();
			if(!selectedcrn)
			{
				alert("You must select a class");
				e.preventDefault();
			}
			else
			{
				//console.log('http://web.njit.edu/~vp78/moodle/front/forum/forum.php?selectedcrn=' + selectedcrn + '&ucid=' + ucid);
				e.preventDefault();
				//var page_url=$(this).prop('href');
				//page_url = page_url + '?selectedcrn=' +selectedcrn+'&ucid='+ ucid + '&cname=Coursename';
				////alert(page_url);
				//$('#content').load(page_url);
				
				
				
				          var urltocall =  "http://web.njit.edu/~vp78/moodle" + "/back/get.php?f=getPosts";
				 console.log(urltocall);
                            var data = {crn:selectedcrn};
                             $.ajax({
                                        url: urltocall,
                                       data: data,
                                       type: "post",
                                       dataType: "json",
                                       async: false,
                                       success: function(output)
                                               {
                                                       //console.log(output);
						       $('#content').html('');
                                                       for(var i = 0; i<output.posts.length; i++)
                                                       {
                                                                        $("#content").append('Posted By: '+ output.posts[i][0]  + '<br/>');
                                                           		$("#content").append('Topic: '+output.posts[i][1]  + '<br/>');
                                                        		$("#content").append('Detail: '+output.posts[i][2]  + '<br/><hr>');


                                                       }
                                               }
                                    });
			}
		});
	$('#assignment').on('click', function(e){
			//alert("link clicked");
			if(!selectedcrn)
			{
				alert("You must select a class");
				e.preventDefault();
			}
			else
			{
				loadAssigns(selectedcrn);
				e.preventDefault();
				$.getScript("/js/teacher/assignment.js");
				page_url = urlPath + '/front/teacher/assignment_t.php?crn=' +selectedcrn;
				//alert(page_url);
				$('#content').load(page_url);
				$('#dynadiv').show();
			}
		});
		
		
	function loadAssigns(crn)
	{
				var url_call = urlPath + "/middle/control.php?f=encodeAssignments";
				var data_give = {crn:crn};
				console.log(crn + url_call + data_give);
				$.ajax({
							url: url_call,
							data: data_give,
							type: "post",
							dataType: "json",
							async: false,
							success: function(output)
							{
									console.log(output);
										
							}
					  });


	
	}

	var len = semester.semesters.length;
	//alert(len);
	
	for(var i = 0; i<len; i++)
	{
	    $("#sel_semester").append($('<option></option>').attr("value", semester.semesters[i]).text(semester.semesters[i]));
	}
	var selectedsemester = $("#sel_semester").val();
	getClasses(selectedsemester);
	$("#sel_semester").change(function(){
		    var selectedsemester = $("#sel_semester").val();
		    getClasses(selectedsemester);
	});

	function loadClass(h)
	{
		console.log(classarray);
		selectedcrn = h;
					page_url = urlpath + '/front/classhome_t.php?crn='+selectedcrn+'&ucid=' +ucid;
					//alert(page_url);
					$('#content').load(page_url);

	//	$("#title").show();
	//	$("#title").html('');
	//	$("#title").append('<b> Selected Class:  </b>' + classarray.classes[h][1] + ' <br> <b> Instructor: </b> ' + classarray.classes[h][8] );
		
	//	loadAnno(classarray.classes[h][2]);


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
	function getClasses(selectedsemester)
	{
		   var urltocall =  urlpath + "/back/get.php?f=getClasses_t";
		   var data = {ucid:"<?php echo ($_GET['ucid']);?>" , semesterid:selectedsemester};
		
		             $.ajax({
								url: urltocall,
								data: data,
								type: "post",
								dataType: "json",
								async: false,
								success: function(output)
									{
									classarray=output;
									console.log(output);
									//console.log(output.classes[0][0]);
									$("#courses").html('<label style="color:red;">**' + selectedsemester + '**</label><br>');
										for(var i =0; i<output.classes.length;i++)
										{
											$("#courses").append($('<button id="">' + output.classes[i][0] + '-' + output.classes[i][2] + '</button>').attr( "onClick", 'loadClass("' + output.classes[i][1] + '");'  ));
											$("#courses").append('<br>');

										}
									}
							});
	}
</script>
</body>  

</html>
