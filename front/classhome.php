<?php ?>

 <script src="js/jquery.js"></script>
<style type="text/css">
table.ann {
	border-width: 2px;
	border-spacing: 1px;
	border-style: dotted;
	border-color: gray;
	border-collapse: collapse;
	background-color: rgb(250, 240, 230);
}
table.ann th {
	border-width: 0px;
	padding: 4px;
	border-style: groove;
	border-color: gray;
	background-color: white;
	-moz-border-radius: ;
}
table.ann td {
	border-width: px;
	padding: 4px;
	border-style: groove;
	border-color: gray;
	background-color: white;
	-moz-border-radius: ;
}
</style>




<div id = "anno"> 

	<div id = "title"> </div>
	<div id = "text"> </div>
</div>

<script>

var crn = "<?php echo($_GET['crn']); ?>";
var ucid = "<?php echo ($_GET['ucid']); ?>";

window.onLoad = loadAnno(crn);

function loadAnno(selectedcrn)
	{
		urlpath = "http://web.njit.edu/~vp78/moodle";
		console.log("loadAnno Executed..");
		//alert(selectedcrn);
		var urltocall =  urlpath + "/back/get.php?f=getAnno";
		console.log(urltocall);
			   var data = {crn:selectedcrn, ucid: ucid};
			
				$.ajax({
							url: urltocall,
							data: data,
							type: "post",
							dataType: "json",
							async: false,
							success: function(output)
								{
								console.log(output);
									if(output.anno != 0)
									{
									//alert("here");
									console.log(output);
									$("#anno").html('');
									console.log(output.anno.length);
										for(var i = 0; i < output.anno.length; i++)
										{


												$("#anno").append('<center><table class="ann"> <th>' + output.anno[i][2] + '</th> </table></center>');



										}
									}
									else{
										$("#anno").html('');
										$("#anno").html('<br> <br><b>  <h1> <center> No Announcements Posted Yet.. </b> </center> </h1>');
								
									}
								}
					});
		
	
	}


</script>