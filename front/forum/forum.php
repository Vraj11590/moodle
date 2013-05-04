	<?php include('../resources/header.php'); ?>

<html>  
<head>  
<style type="text/css">

#forumcontent {  
    font-family: Arial;  
    padding: 20px 30px;  
    text-align: left;  
}
</style>

<script src="../js/jquery.js"></script>

<h1><?php echo($_GET['cname']); ?></h1>  
    <div id="wrapper">  
    <div id="menu">  
        <button id="topic" onclick="")>Create a topic</button> 
       
          
    </div>  
        <div id="forumcontent"> 
	</div><!-- content -->  
</div><!-- wrapper -->  
  



</html> 



<script>
    var crn = <?php echo ($_GET['selectedcrn']); ?>;

    window.onload = getPosts(crn);
    
        function getPosts(crn)
        {
            var urltocall =  "http://web.njit.edu/~vp78/moodle" + "/back/get.php?f=getPosts";
            console.log(urltocall);
                            var data = {crn:crn};
                             $.ajax({
                                        url: urltocall,
                                       data: data,
                                       type: "post",
                                       dataType: "json",
                                       async: false,
                                       success: function(output)
                                               {
                                                       //console.log(output);
                                                       for(var i = 0; i<output.posts.length; i++)
                                                       {
                                                                        $("#forumcontent").append('Posted By: '+ output.posts[i][0]  + '<br/>');
                                                           		$("#forumcontent").append('Topic: '+output.posts[i][1]  + '<br/>');
                                                        		$("#forumcontent").append('Detail: '+output.posts[i][2]  + '<br/><hr>');


                                                       }
                                               }
                                    });
        }
    
    
    
	$('#topic').on('click', function(e){
				alert("link clicked");
				e.preventDefault();
				$('#forumcontent').append('<form id = "createpost">' +
											'Title: <input id = "ptitle"type = "text" placeholder="title_"> </input>' +
					'<br>' +
				'Desc: <textarea id="pdata"> </textarea>' +
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