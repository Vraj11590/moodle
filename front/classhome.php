<?php ?>

 <script src="js/jquery.js"></script>




<div id = "anno"> 

	<div id = "title"> </div>
	<div id = "text"> </div>
</div>

<script>

var crn = "<?php echo($_GET['crn']); ?>";

window.onLoad = loadAnno(crn);

function loadAnno(selectedcrn)
	{
		//alert(selectedcrn);
		var urltocall =  urlpath + "/back/get.php?f=getAnno";
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
									$("#anno").append('<center>'+output.anno[0][1]+ '<br></center>');
									$("#anno").append('<center><h1>' + output.anno[0][2] + '</h1></center>');
									}
									else{
										$("#anno").html('');
										$("#anno").html('<br> <br><b>  <h1> <center> No Announcements Posted Yet. </b> </center> </h1>');
								
									}
								}
					});
		
	
	}


</script>