<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <span style="font-size:40px;color:green">X</span><span style="font-size:25px">Company</span> &nbsp;&nbsp;
    <style>
        a {
            font-size: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php
    
    $home = "home.php";
    $login = "login.php";
    $reg = "registration.php";
    $blank = "";
    $logout = "logout.php";
        if(!($_SESSION['flag']))
	       echo "<a href='$home'>Home</a>|<a href='$login'>Login</a>|<a href='$reg'>Registration</a>";
        else 
	       echo"Logged in as <a href=$blank>".$_SESSION['uname']."</a>|<a href='$logout'>Logout</a>";
        
    ?>
</body>
</html>