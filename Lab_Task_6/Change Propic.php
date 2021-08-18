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
 $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 900000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
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
<form method="post">  
<legend>Change Profile Picture</legend>
<input type="file" name="fileToUpload" id="fileToUpload" value="Choose File">
<hr/>
<input type="submit"  name="submit">
</form>

</fieldset>
</fieldset>
</td>
</table>
<fieldset>
<?php include 'footer.php'?>
</fieldset>
</body>

</html>