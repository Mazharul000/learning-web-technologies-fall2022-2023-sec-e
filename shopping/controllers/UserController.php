<?php
	require_once '../models/db_config.php';
	$name="";
	$err_name="";
	$uname="";
	$err_uname="";
	$email="";
	$err_email="";
	$pass="";
	$err_pass="";
	$err_db="";
	$hasError=false;

	if(isset($_POST["sign_up"])){
		if(empty($_POST["name"])){
			$err_name="Name Required";
			$hasError=true;
		}else{
			$name=$_POST["name"];
		}
		if(empty($_POST["uname"])){
			$err_uname="Username Required";
			$hasError=true;
		}else{
			$uname=$_POST["uname"];
		}

		if(empty($_POST["pass"])){
			$err_pass="password Required";
			$hasError=true;
		}else{
			$pass=$_POST["pass"];
		}

		if(empty($_POST["email"])){
			$err_email="valid email Required";
			$hasError=true;
		}else{
			$email=$_POST["email"];
		}

		if(!$hasError){
			$rs = insertUser($name,$uname,$_POST["email"],$_POST["pass"]);
			//var_dump($rs);
			if($rs === true){
				header("Location: ../views/login.php");
			}
			$err_db = $rs;
			
		}
	}
	else if (isset($_POST["btn_login"])){
		if(empty($_POST["uname"])){
			$err_uname="Username Required";
			$hasError=true;
		}else{
			$uname=$_POST["uname"];
		}
		if(empty($_POST["pass"])){
			$err_pass="Password Required";
			$hasError=true;
		}else{
			$pass=$_POST["pass"];
		}
		if(!$hasError){
			
			if($user = authenticateUser($_POST["uname"],$_POST["pass"])){
					header("Location: ../views/staff.php");

			}
			$err_db = "Username password invalid";
		}
	}
	
	function insertUser($name,$uname,$email,$pass){
		$query  = "insert into users values (NULL,'$name','$uname','$email','$pass')";
		return execute($query);	
	}
	function authenticateUser($uname,$pass){
		$query ="select * from users where username='$uname' and password='$pass'";
		$rs = get($query);
		if(count($rs)>0){
			return $rs[0];
		}
		return false;
		
	}
	function checkUsername($uname){
		$query = "select name from users where username='$uname'";
		$rs = get($query);
		if(count($rs) > 0){
			return true;
		}
		else return false;
	}
	function checkpass($pass){
		$query = "select name from users where password='$pass'";
		$rs = get($query);
		if(count($rs) > 0){
			return true;
		}
		else return false;
	}
	
?>