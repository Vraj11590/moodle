<?php 
		$_SESSION = array();
        session_destroy();
        $user_is_logged_in = false;
        $messages[] = "You have been logged out.";
        echo"Logout finished.";
?>