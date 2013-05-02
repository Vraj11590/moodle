<?php  ?>

<div id = "grades">



</div> 


<script>

window.onload = loadCinfo();

function loadCinfo()
{
	var urltocall =  urlpath + "/back/get.php?f=getQuizScore";
			   var data = {crn:4};
			
						 $.ajax({
									url: urltocall,
									data: data,
									type: "post",
									dataType: "json",
									async: false,
									success: function(output)
										{
											console.log(output);
											//for(var i = 0; i<output.cinfo.length; i++)
											//{
											//		for (var j = 0; j <= 5 ; j++)
											//		{
											///			$("#grades").append(output.cinfo[i][j]  + '<br/>');
											//		}
											//}
											
										}
								});




}
