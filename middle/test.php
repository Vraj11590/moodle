<h1>CONTROL TEST PAGE</h1>
tests insert functions as prof. theo for CS490-001 CRN:4<hr>
<b>NOTES:</b><br>
	Made new tables:<br>
	forums: ID, crn, ucid, title, parent<br>
	you can now get all replies using parent = id<br>
	quizzes: quiz master table, used to keep track of multiple quizzes in a class<br>
	Restructured tables:<br>
	quiz: (quiz question table) added quizID column to identify what quiz question belongs to
	<hr>
	<?php
		include('../resources/header.php');
		include('functions.php');
		$functionCall = false;
		$auth = false;
		$data = $_POST;
		//variable ovveride
		$_POST['ucid'] = 'theo';
		$_POST['semesterid'] = 'spring2013';
		$_POST['crn'] = '4';
		//$_POST['name'] = 'Theodore Nicholson';
		$type = 't';
		echo 'overriden $_POST array: ';
		
		print_r($_POST);
		echo'<hr><b>OUTPUT AREA:</b>';
		echo '<br><hr>';
		include('triggers.php');
	?>
	
	<hr>Test assignment insertion:
	
	<form id="test1form" action="test.php?f=insertAssignment" method="post">
		<input type="text" name="name" placeholder="Enter assignment name..."/>
		<input type="text" name="content" placeholder="Enter assignment content..." />
		<input type="text" name="deadline" placeholder="Enter deadline (YYYY-MM-DD)..." />
		<input type="submit" value="test" name="assntest" style="padding:5px;"/>
	</form><hr>
	Test post insertion: new topics will have parent value set to 0 in table
	
	<form id="test2form" action="test.php?f=insertPost" method="post">
		<input type="text" name="title" placeholder="Enter post name..."/>
		<input type="text" name="content" placeholder="Enter post content..." />
		<input type="text" name="parent" placeholder="Reply to..." />
		<input type="submit" value="test" name="posttest" style="padding:5px;"/>
	</form><hr>
	Test Quiz creation: (registers quiz into quiz master table) quiz ID auto incremented
	<form id="test3form" action="test.php?f=createQuiz" method="post">
		<input type="text" name="name" placeholder="Enter quiz name..."/>
		<input type="submit" value="test" name="qctest" style="padding:5px;"/>
	</form><hr>
	Test Quiz Question creation: need to know quizzes quizID to make a question for it
	<form id="test4form" action="test.php?f=createQQ" method="post">
		<input type="text" name="quizID" placeholder="Enter QuizID to edit..."/>
		<input type="text" name="question" placeholder="Enter question..." />
		<input type="text" name="a" placeholder="Enter answer A..." />
		<input type="text" name="b" placeholder="Enter answer B..." />
		<input type="text" name="c" placeholder="Enter answer C..." />
		<input type="text" name="d" placeholder="Enter answer D..." />
		<input type="text" name="ans" placeholder="Enter correct answer..." />
		<input type="text" name="grade" placeholder="Enter point value..." />
		<input type="submit" value="test" name="QQctest" style="padding:5px;"/>
	</form><hr>
	Test getQuestionScores function: for use in grading algorithm
	<form id="test5form" action="test.php?f=getQS" method="post">
		<input type="text" name="quizID" placeholder="Enter QuizID to test..."/>
		<input type="submit" value="test" name="QQctest" style="padding:5px;"/>
	</form><hr>
	Test getChildren function: 
	<form id="test6form" action="test.php?f=getChildren" method="post">
		<input type="text" name="postID" placeholder="Enter postID to get children..."/>
		<input type="submit" value="test" name="gctest" style="padding:5px;"/>
	</form><hr>
	File Upload Test:
	<form action="test.php?f=upload" method="post"
	enctype="multipart/form-data">
		<label for="file">Filename:</label>
		<input type="file" name="file" id="file"><br>
		<input type="submit" name="submit" value="Submit">
	</form>	