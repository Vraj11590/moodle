<?php
	include('../../resources/header.php');
?>
<script src="../js/jquery.js"></script>

<center>

<hr>
<label> <b> <h3> Here you can Add, Delete and Modify Assignments  </h3>  </b> </label>
<hr>
</center>
<table border = "1px">
<th> <label> Assignment Functions: </label> </th> 
<tr>
	<td>
		<a href="#" id="add"> Add Assignment </a><br>
		<a href="#" id="view"> View All Assignments </a>
		
	</td>
</tr>
</table>
<br> 
<br>

<div id="adiv">
		<table border = "1px">
		<th> <label> Adding Assignment: </label> </th> 
		<tr>
			<td>
			<form id="test1form" action="middle/control.php?f=insertAssignment" method="post">
				<input type="text" name="name" placeholder="Enter assignment name..."/><br>
				<input type="text" name="content" placeholder="Enter assignment content..." /><br>
				<input type="text" name="deadline" placeholder="Enter deadline (YYYY-MM-DD)..." /><br>
				<input type="submit" value="test" name="assntest" style="padding:5px;"/>
			</form>
			</td>
		</tr>
		</table>
</div>





