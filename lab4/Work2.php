<?php
echo $_POST['password'];

?>
<html>
<body>
<h1>Changed password</h1>
<form action="Form2.php" method="post">
Currentpassword: <input type="password" name="passsword"><br>
New password: <input type="password" name="passsword"><br>
Retype New Password: <input type="password" name="passsword"><br>
<hr>
<input type="submit">
</form>
</body>
</html>