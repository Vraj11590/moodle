	<?php include('../resources/header.php'); ?>

<html>  
<head>  
<style>

  
  
#forumcontent {  
    font-family: Arial;  
    padding: 20px 30px;  
    text-align: left;  
}  
  
#menu {  
    height:20px;  
    padding: 0 30px;  
    text-align: left;  
    font-size: 85%;  
}  
  
#menu a:hover {  
    background-color: #009FC1;  
}  
  
#userbar {  
    width: 250px;  
}  
  
  
/* begin table styles */  
table {  
    border-collapse: collapse;  
    width: 100%;  
}  
  
table a {  
    color: #000;  
}  
  
table a:hover {  
    color:#373737;  
    text-decoration: none;  
}  
  
th {  
    background-color: #B40E1F;  
    color: #F0F0F0;  
}  
  
td {  
    padding: 5px;  
}  
  
/* Begin font styles */  
h1, #footer {  
    font-family: Arial;  
    color: #F1F3F1;  
}  
  
h3 {margin: 0; padding: 0;}  
  
/* Menu styles */  
.item {  
    background-color: #00728B;  
    border: 1px solid #032472;  
    color: #FFF;  
    font-family: Arial;  
    padding: 3px;  
    text-decoration: none;  
}  
  
.leftpart {  
    width: 70%;  
}  
  
.rightpart {  
    width: 30%;  
}  
  
.small {  
    font-size: 75%;  
    color: #373737;  
}  
  
.topic-post {  
    height: 100px;  
    overflow: auto;  
}  
  
.post-content {  
    padding: 30px;  
}  
  
textarea {  
    width: 500px;  
    height: 200px;  
}  


</style>
 <script src="../js/jquery.js"></script>
<body>  
<h1><?php echo($_GET['cname']); ?></h1>  
    <div id="wrapper">  
    <div id="menu">  
        <a id="topic" href="">Create a topic</a> 
        <a class="cat" href="forum/create_cat.php">Create a category</a>  
          
    </div>  
        <div id="forumcontent"> 
	</div><!-- content -->  
</div><!-- wrapper -->  
</body>  



</html> 



<script>
	$('#topic').on('click', function(e){
				//alert("link clicked");
				e.preventDefault();
				$('#forumcontent').append('<form id = "createpost">' +
											'<input id = "ptitle"type = "text" placeholder="title_"> </input>' +
					'<br>' +
				'<textarea id="pdata"> </textarea>' +
				'<input type="submit"/></form>');
				
			$('#createpost').submit(function(e){
	
		alert("called");
		e.preventDefault();
		var title = $('#ptitle').val();
		var crn = <?php echo ($_GET['selectedcrn']); ?>;
		var ucid = "<?php echo ($_GET['ucid']); ?>";
		var details = $('#pdata').val();
		
		console.log(title + details + crn + ucid);
		
		
		var urltocall =  "http://web.njit.edu/~vp78/moodle" + "/back/get.php?f=AddTopic";
		console.log(urltocall);
		var data = {crn:crn, ucid:ucid, topic: title, detail:details};
			
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
								
		
	
	});	
		
	



	});
	

	



	//WECLOME TO CLASS FORUM FOR CRN : <?php echo($_GET['crn']); ?>
	//<?php  echo ($_GET['ucid']);?>
	//<h1> FORUM GOES HERE </h1>
</script>