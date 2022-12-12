<?php
	include '../controllers/UserController.php';
	$uname = $_GET["uname"];
	$user = checkUsername($uname);
	if($user){
		echo "invalid username";
	}
	else echo "valid";
	$pass = $_GET["pass"];
	$user = checkpass($pass);
	if($pass){
		echo "invalid pass";
	}
	else echo "valid";
?>