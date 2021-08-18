<! doctype html>
<html>
<body>
<?php
session_start();
$error = $pass = "";
static $flag = 0;
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
 $data = file_get_contents("Lab4_data.json");  

                          $data = json_decode($data, true);  
                
                          foreach($data as $row)  
                          {  
                             if($row["e-mail"]==$_POST["email"])
							  {
									$pass = $row["password"];
									$flag= 1;
									
									break;
							  }
						  }
						  if($flag!=1)
							   $pass = "Email didn't match";
						   
}
 ?>
<fieldset>
<?php include 'head.php';?>
</fieldset>
<fieldset>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<fieldset>
<legend>Forgot Password</legend>
Enter Email:<input type="text" name="email">
<hr/>
<input type="submit">
</fieldset>
</form>
</fieldset>
<fieldset>
<?php include 'footer.php';?>
</fieldset>
<?php echo $pass;?>
</body>
</html>