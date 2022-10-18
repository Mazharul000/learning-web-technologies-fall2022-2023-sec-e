<?php

if (isset($_GET['name']) && isset($_GET['password']))
{
$name = $_GET['name'];
$password = $_GET['password'];

if(empty($name) && empty())
  {
  echo "Fill up all the feilds";
  }
  else
  {
    echo 'Okay';
  }

}

?>
<html>
<body>
<h1>User login</h1>
<form action="Form1.php" method="GET">
User name: <input type="name" name="name"><br>
password: <input type="password" name="password"><br>
<hr>
<input type="checkbox" id="RM" name="RM" value="Remember Me">
  <label for="Remember Me">Remember me</label><br>
<input type="submit">
<a href="">forget possword<a>
</form>
</body>
</html>