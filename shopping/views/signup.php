<?php
	include '../controllers/UserController.php';
?>

<html>
	<head>
	<script>

var hasError=false;
function get(id){
	return document.getElementById(id);
}

function validate(){
				
				refresh();
				if(get("name").value == ""){
					hasError = true;
					get("err_name").innerHTML = "*Please Enter Your Name";
				}
				else if(get("name").value.length <= 2){
					hasError = true;
					get("err_name").innerHTML = "*Name must be greater than 2 charecter";
				}
				if(get("uname").value == ""){
					hasError = true;
					get("err_uname").innerHTML = "*Please Enter Your username";
				}

				if(get("email").value == ""){
					hasError = true;
					get("err_email").innerHTML = "*Please Enter Your Email.";
				}

				if(get("pass").value == ""){
					hasError = true;
					get("err_pass").innerHTML = "Please Enter Your password";
				}

				return !hasError;
			}

			function refresh(){
				hasError=false;
				get("err_name").innerHTML="";
				get("err_uname").innerHTML = "";
				get("err_email").innerHTML = "";
				get("err_pass").innerHTML = "";
				
			}
		
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	
<form action="" onsubmit="return validate()" method="post" class="add-product-form">
<!--sign up starts -->
<div class="center-login">
	<h1 class="text text-center">Sign Up</h1>
	<h5 class="text-danger"><?php echo $err_db;?></h5>

		<div class="add-product-form">
			<h4 class="text">Name</h4> 
			<input type="text" id = "name" name="name" value ="<?php echo $name;?>"  class="form-control">
			<span id="err_name" class="text-danger"><?php echo $err_name;?></span>
		</div>
		<div class="add-product-form">
			<h4 class="text">Username</h4> 
			<input type="text" id="uname" onfocusout="checkUsername(this)" name="uname" value ="<?php echo $uname ;?>"  class="form-control">
			<span id="err_uname" class="text-danger"><?php echo $err_uname;?></span>
		</div>
		<div class="add-product-form">
			<h4 class="text">Email</h4> 
			<input type="text" id="email" name="email" value ="<?php echo $email ;?>" class="form-control">
			<span id="err_email" class="text-danger"><?php echo $err_email;?></span>
		</div>
		<div class="add-product-form">
			<h4 class="text">Password</h4> 
			<input type="password" id="pass" name="pass" value ="<?php echo $pass ;?>" class="form-control">
			<span id="err_pass" class="text-danger"><?php echo $err_pass;?></span>
		</div>
		<div class="form-group text-center">
			
			<input type="submit" name="sign_up" class="btn" value="Sign Up" class="form-control">
		</div>
		<div class="btn"><a href="../views/login.php">Log In</a></div>
	</form>
</div>
</body>
</html>
