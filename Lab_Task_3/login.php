<!doctype html>
<html>
<body>
<?php $name = $pass = $name_err = $pass_err = "";
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
	 if(empty($_POST["uname"]))
		 $name_err = "Username is required";
	 else
	 {
		 $name = $_POST["uname"];
		if(!preg_match("/^[a-zA-Z-0-9_]{2,}$/",$name))
				$name_err = "Password is invalid";
			else
				$name_err = "";
	 }
	  if(empty($_POST["pass"]))
		 $pass_err = "Passowrd is required";
	 else
	 {
		 $pass = $_POST["pass"];
		if(!preg_match("/^(?=.*?[A-Za-z])(?=.*?[$@#%]).{8,}$/",$_POST["pass"]))
				$pass_err = "Password must contain at least one special character and password must have at least 8 characters";
			else
				$pass_err = "";
	 
	 }
 }
 ?>
<form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset>
<legend>LOGIN</legend>
Username:<input type = "text" name="uname"><?php echo $name_err?><br>
Password:<input type = "text" name="pass"><?php echo $pass_err?>
<hr/>
<input type = "checkbox">Remember me<br>
<input type = "submit"><a href="">Forgot Password</a>

</fieldset>
</form>
</body></html>