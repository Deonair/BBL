<?php
require_once('leerlingsession.php');
require_once('dbclass.php');

// zet de gebruiker in user_logout 
$user_logout = new Leerlingen();

// als de gebruiker
if ($user_logout->is_loggedinLeerling() != "") {
	header('index.php');
}
if (isset($_GET['logout']) && $_GET['logout'] == "true") {
	$user_logout->doLogout();
	header('Location: ../index.php');
}
