<?php 
	

	include "dbconnection.php";
	 
	
	function register($Firstname,$Lastname,$Gender,$DOB,$Phone,$Email,$Username,$Password)
	{
		$conn = connect(); // from include dbconnection
		$statement = $conn->prepare("INSERT INTO  registration (Firstname,Lastname,Gender,DOB,Phone,Email,Username,Password)VALUES(?,?,?,?,?,?,?,?)"); 
	 	$statement->bind_param("ssssisss",$Firstname,$Lastname,$Gender,$DOB,$Phone,$Email,$Username,$Password);
		return $statement->execute();
  	}

  	


 ?>