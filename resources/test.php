<?php
	echo $_SERVER['DOCUMENT_ROOT'];
	echo '<br>';
	echo dirname(__FILE__);
	echo '<br>';
	echo dirname(dirname(__FILE__));
	
	echo dirname(__FILE__).'/..';
	?>