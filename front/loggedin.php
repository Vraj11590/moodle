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
	
	function getClasses(selectedsemester)
	{
		    var urltocall =  urlpath + "/front/return.php";
		    var data = {ucid_ajax:"<?php echo ($_GET['ucid']);?>" , semesterid_ajax:selectedsemester, flag_ajax:"getClasses", urlPath_ajax: urlpath};

		              $.ajax({
				url: urltocall,
				data: data,
				type: "post",
				//dataType: "json",
				async: false,
				success: function(output)
				 	{
					       alert(output);
					       console.log(output);
					}
				});
	}
</script>
</body>  

</html>
