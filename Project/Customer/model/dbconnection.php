<?php 

function connect()
{
 	 $conn = new mysqli("localhost","root","","library"); // host, user, user pass, database name.
	 if($conn->connect_errno)
	 {
	 	die ("Connection failed due to ". $conn->connect_error);
	 }
	 
	 // echo "Database connetion successful";
	 // $conn->close();

	 return $conn;
	}
?>