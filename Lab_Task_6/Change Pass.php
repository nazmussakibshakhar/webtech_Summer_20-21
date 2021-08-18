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
 include 'model/model.php';
 $pass_error = "";
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
<form method="POST">  
<legend>Change Password</legend>
<table>
<tr><td align = "left">Current Password</td><td align = "right">:<input type = "text" name = "curpass" value="<?php echo  $_SESSION['pass'];?>"><?php echo "$pass_error"?></td><br>
<tr><td align = "left"><span style = "color:green;">New Password</span></td><td align = "right">:<input type = "text" name="newpass"></td><br>
<tr><td align = "left"><span style = "color:red;">Retype New Password</span></td><td align = "right">:<input type = "text" name="rnewpass"></td>
</table>
<br>
<hr/>
<input type = "submit" name="submit">
</form>
<?php 

if($_SERVER["REQUEST_METHOD"]=="POST")
 {
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["newpass"]))  
      {  
           $name_err = "new pass is required";  
      }
    else {
  $EmptyArr = str_word_count($_POST['newpass']);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z- ]*$/",$_POST['newpass']) || $EmptyArr<2) 
      $name_err = "Only can contain whitespace,period,dash and alphabetic letter. Name must be consits of at least two words";
    
    
  }
       if(empty($_POST["rnewpass"]))  
      {  
           $email_err = "re new pass is required";  
      }  

       
      else  
      {  
          
if (isset($_POST['submit'])) {
     $data['newpass'] = $_POST['newpass'];
     $data['curpass'] = $_POST['curpass'];
     $data['rnewpass'] = $_POST['rnewpass'];
   
    
 
 
   if (changepass($data)) {
    echo 'You have  password your password.';

       
   }
 } else {
     echo 'There is an occued created.';
 }

      }  
 }  
 }

?>
</fieldset>
</fieldset>
</td>
</table>
<fieldset>
<?php include 'footer.php'?>
</fieldset>
</body>

</html>