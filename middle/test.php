<h1>CONTROL TEST PAGE</h1><br>
tests insert functions as prof. theo for CS490-001 CRN:4<br><hr>

<?php
	include('../resources/header.php');
	include('functions.php');
	$functionCall = false;
	$auth = false;
	$data = $_POST;
	$_POST['ucid'] = 'theo';
	$_POST['semesterid'] = 'spring2013';
	$_POST['crn'] = '4';
	//$_POST['name'] = 'Theodore Nicholson';
	$type = 't';
	echo '$_POST array: ';
	print_r($_POST);
	echo '<br><hr>';
	include('insert.php');
?>
Test assignment insertion:

<form id="loginform" action="test.php?function=insertAssignment" method="post">
	<input type="text" name="name" placeholder="Enter assignment name..."/>
	<input type="text" name="content" placeholder="Enter assignment content..." />
	<input type="text" name="deadline" placeholder="Enter deadline (YYYY-MM-DD)..." />
	<input type="submit" value="test" name="assntest" style="padding:5px;"/>
</form><hr>
Test post insertion: new topics will have parent value set to 0 in table

<form id="loginform" action="test.php?function=insertPost" method="post">
	<input type="text" name="title" placeholder="Enter post name..."/>
	<input type="text" name="content" placeholder="Enter post content..." />
	<input type="text" name="parent" placeholder="Reply to..." />
	<input type="submit" value="test" name="posttest" style="padding:5px;"/>
</form><hr>
Test Quiz creation: (registers quiz into quiz master table) NOT FUNCITONAL YET
<form id="loginform" action="test.php?function=createQuiz" method="post">
	<input type="text" name="name" placeholder="Enter quiz name..."/>
	<input type="submit" value="test" name="qctest" style="padding:5px;"/>
</form><hr>
Test Quiz Question creation: NOT FUNCTIONAL YET
<form id="loginform" action="test.php?function=createQQ" method="post">
	<input type="text" name="quizID" placeholder="Enter QuizID to edit..."/>
	<input type="text" name="question" placeholder="Enter question..." />
	<input type="text" name="a" placeholder="Enter answer A..." />
	<input type="text" name="b" placeholder="Enter answer B..." />
	<input type="text" name="c" placeholder="Enter answer C..." />
	<input type="text" name="d" placeholder="Enter answer D..." />
	<input type="text" name="ans" placeholder="Enter correct answer..." />
	<input type="submit" value="test" name="assntest" style="padding:5px;"/>
</form><hr>