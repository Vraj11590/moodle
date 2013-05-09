<?php
	include('../resources/header.php');
	include('return.php');
?>
<script src="js/jquery.js"></script>



<div id="currentAnno">
	Test post insertion: new topics will have parent value set to 0 in table
	
	<form id="addAnno" method="post">
		<input type="text" id="title" placeholder="Enter post name..."/>
		<input type="text" id="detail" placeholder="Enter post content..." />
		<input type="text" id="parent" placeholder="Reply to..." />
		<input type="submit" value="test" id="annoSubmit" style="padding:5px;"/>
	</form><hr>
</div>

<div id="addAnno">

</div>



<script type = "text/javascript">
var crn = "<?php echo($_GET['crn']); ?>";
var ucid = "<?php echo ($_GET['ucid']); ?>";
var urlPath = "<?php echo $urlPath; ?>";



$('#annoSubmit').on("click",function(e){
	e.preventDefault();
	alert("default prevented");
	var title = $('#title').val(); 
	var detail = $('#detail').val(); 
	var parent = $('#parent').val(); 

	var data = {t:title,d:detail,u:ucid,crn:crn};
	console.log(urlPath);

	
	//send data to a php file in front to convert 
	   $.ajax({
                     url: urlPath + "/front/return.php?f=addAnno",
                     data: data,
                     type: "post",
                     dataType: "json",
                     async: false,
                     success: function(output)
                     {
							console.log(output)
					 }
			});
			
	
	
	
	
	
});



</script>



