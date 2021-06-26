<!doctype html>
<html>

<body>
<?php
  $current_pass = "sakib@1234"; $new_pass = $Rnew_pass = $pass_error = "";
if($_SERVER["REQUEST_METHOD"]== "POST"){
	if(empty($_POST["curpass"]))
		$pass_error = "currpass required";
	else{
	if($current_pass!=$_POST["curpass"])
		$pass_error = "Invalid Current Password";
		
	else{
		if($_POST["rnewpass"]==$_POST["newpass"])
			{echo "Password changed";$current_pass = $_POST["rnewpass"];$pass_error = "";}
		else
			echo "Password doesn't match try again";
	}
	}
		
		
	
	
}?>
<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST" >
<fieldset>
<legend><h3>Change Password</h3></legend>
<table>
<tr><td align = "left">Current Password</td><td align = "right">:<input type = "password" name = "curpass"><?php echo "$pass_error"?></td><br>
<tr><td align = "left"><span style = "color:green;">New Password</span></td><td align = "right">:<input type = "text" name="newpass"></td><br>
<tr><td align = "left"><span style = "color:red;">Retype New Password</span></td><td align = "right">:<input type = "text" name="rnewpass"></td>
</table>
<br>
<hr/>
<input type = "submit" name="submit">
</form>
</fieldset>
</form>
</body>
</html>