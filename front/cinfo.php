<?php  ?>

<div id = "info">



</div> 


<script>

window.onload = loadCinfo();

function loadCinfo()
{
	var urltocall =  urlpath + "/back/get.php?f=getCourseInfo";
			   var data = {crn:<?php echo($_GET['crn']); ?>};
			
						 $.ajax({
									url: urltocall,
									data: data,
									type: "post",
									dataType: "json",
									async: false,
									success: function(output)
										{
											//console.log(output);
											for(var i = 0; i<output.cinfo.length; i++)
											{
													for (var j = 0; j <= 5 ; j++)
													{
														$("#info").append(output.cinfo[i][j]  + '<br/>');
													}
											}
											
										}
								});




}





</script>