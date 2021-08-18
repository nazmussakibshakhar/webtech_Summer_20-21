<html>
<body>
<fieldset>
<?php
session_start();
if(!isset($_SESSION["usname"]))
{
    header("Location: Lab4_login.php");
}
?>
<?php

 include 'head.php';
 require_once 'model/db_connect.php';
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
Name: <?php echo $_SESSION['name']; ?>
<?php echo "<br>" ?>
email: <?php echo $_SESSION['email']; ?>
<?php echo "<br>" ?>
username: <?php echo $_SESSION['usname']; ?>
<?php echo "<br>" ?>

Gender: <?php echo $_SESSION['gender'];?>
<?php echo "<br>" ?>

Date of Birth: <?php echo "".$_SESSION['dd']."/".$_SESSION['mm']."/".$_SESSION['yy'].""?>
</fieldset>
</fieldset>
</td>
</table>
<fieldset>
<?php include 'footer.php'?>
</fieldset>
</body>

</html>