<!doctype html>
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

$_SESSION['uname'] = "";
$_SESSION['flag'] = 0;
include 'head.php'?>
<br>
</fieldset>
<fieldset style="height:100px;">
<center><h2>Welcome to xCompany</h2></center>
</fieldset>
<fieldset>
<?php include 'footer.php' ?>
</fieldset>
</body>
</html>