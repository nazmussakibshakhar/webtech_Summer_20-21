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
 include 'head.php'?>
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
<?php echo "Welcome ".$_SESSION['name']."";?>
</fieldset>
</td>
</table>
<fieldset>
<?php include 'footer.php'?>
</fieldset>

</body>
<html>