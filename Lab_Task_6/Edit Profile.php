<html>
<body>
<fieldset>
<?php
session_start();
include 'head.php';
 require_once 'model/db_connect.php';
 require_once 'model/model.php';
if(!isset($_SESSION["usname"]))
{
    header("Location: Lab4_login.php");
}
?>

</fieldset>
<table>
<td>
<fieldset style="height:270px;width:300px">
<h3>Account</h3> &nbsp &nbsp 
<hr/>
<ul>
<li><a href="Account.php">Dashboard</a></li>
<li><a href="Profile.php">View Profile</a></li>
<li><a href="Edit Profile.php">Edit Profile</a></li>
<li><a href="Change Propic.php">Change Profile Picture</a></li>
<li><a href="Change Pass.php">Change Password</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</fieldset>
</td>
<td>
<fieldset style="height:270px">
<fieldset>    
<legend>Profile</legend>
<form method="POST">
Name:<input type="text"  name="name"value="<?php echo $_SESSION['name'];?>"><br>
User Name:<input type="text"  name="usname"value="<?php echo $_SESSION['usname'];?>"><br>
Email: <input type="text" name="email"value="<?php echo $_SESSION['email'];?>"><br>
Date of Birth: <input type = "text" name = "dd" value="" width=100>/&nbsp <input type = "text" name = "mm" width=100>/&nbsp <input type = "text" name="yy" width=100> (dd/mm/yyyy)</fieldset>

<!-- Date of Birth:<input type="text" value="<?php echo "".$_SESSION['dd']."/".$_SESSION['mm']."/".$_SESSION['yy'].""?>"><br> -->
Gender: <input type="radio"  name="gender"value="male" id="male" <?php if($_SESSION['gender']=='Male') echo "checked";?>>Male
 <input type="radio" name="gender"value="female" id="female" <?php if($_SESSION['gender']=='female') echo "checked";?>>Female
 <input type="radio" name="gender"value="other" id="other" <?php if($_SESSION['gender']=='other') echo "checked";?>>Other
 <br>
 <input type="submit" name="submit">

</fieldset>
</form>
</fieldset>
<?php

 
 $conn = db_conn();
    $selectQuery = "SELECT * FROM `user_info`  ";

 

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //return $rows;


 foreach($data as $row)
 {
	                             $_SESSION['usname'] = $row['usname'];
	                             $_SESSION['pass'] = $row['pass'];
	                             $_SESSION['name'] = $row['name'];
	                             $_SESSION['email'] = $row['email'];
									$_SESSION['pass']=$row['pass'];
									$_SESSION['gender']=$row['gender'];
									$_SESSION['dd']=$row['dd'];
									$_SESSION['mm']=$row['mm'];
									$_SESSION['yy']=$row['yy'];
								
									break;
	 
 }
	if($_SERVER["REQUEST_METHOD"]=="POST"){	

	
	

	$data['name'] = $_POST['name'];
	$data['usname'] = $_POST['usname'];
	$data['email'] = $_POST['email'];
	
	$data['gender'] = $_POST['gender'];
	$data['dd'] = $_POST['dd'];
	$data['mm'] = $_POST['mm'];
	$data['yy'] = $_POST['yy'];

	if (updateInfo($data)) {
		echo 'Info updated.';
	}
  
  else {
	  echo 'While there is an error';
  }
}

			
	
?>
</td>
</table>
<fieldset>
<?php include 'footer.php'?>
</fieldset>
</body>

</html>