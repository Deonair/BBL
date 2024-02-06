<?php
	require_once 'dbclass.php'; //call class file
	session_start(); //Start session
	
	
	$session = new coach();
	
	// if user session is not active(not loggedin) this page will help 'home.php and profile.php' to redirect to login page
	// put this file within secured pages that users (users can't access without login)
	
	if($session->is_loggedinLeerling())
	{
		// session no set redirects to login page
		header('index.php');
    }else{
		header('Location: /stage rockit/bbl/login.php');
	}
	
	
    ?>