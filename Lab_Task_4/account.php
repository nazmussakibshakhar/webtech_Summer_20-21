<html>
<head>
   <title>Dashboard</title>
    <style>
        #aa {
            font-size: 40px;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
<fieldset>
<?php
session_start();
 include 'head.php'?>
</fieldset>
<table>
<td>
<fieldset style="height:270px;width:300px">
<h3>Account</h3> &nbsp &nbsp 
<hr/>
<ul>
<li><a href="account.php">Dashboard</a></li>
<li><a href="Profile.php">View Profile</a></li>
<li><a href="Edit Profile.php">Edit Profile</a></li>
<li><a href="Change Propic.php">Change Profile Picture</a></li>
<li><a href="Change Pass.php">Change Password</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</fieldset>
</td>
<td id="aa">
<?php echo "Welcome ".$_SESSION['uname']."";?>
</td>
</table>
<fieldset>
<?php include 'footer.php'?>
</fieldset>

</body>
<html>