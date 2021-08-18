<?php 
	 include "dbconnection.php";
 
	function getProfileData($profileID)
	 {
 		$conn = connect();  
 		$statement = $conn->prepare("SELECT * FROM registration WHERE Username = ?");
 		$statement->bind_param("s", $profileID);
		$statement->execute(); 
		$records = $statement->get_result();
		return $records->fetch_all(MYSQLI_ASSOC); // associative array.
	} 
 


 	function updateProfile($Firstname,$Lastname,$Gender,$DOB,$Phone,$Email,$Username,$id)
	 {
 		$conn = connect(); 
 		$statement = $conn->prepare("UPDATE registration SET Firstname = ?,Lastname = ?,Gender = ?,DOB = ?,Phone = ?,Email = ?,Username = ? WHERE Username = ?");  
	 	$statement->bind_param("ssssisss",$Firstname,$Lastname,$Gender,$DOB,$Phone,$Email,$Username,$id);
		return ($statement->execute()); 
 	}
 

 


 ?>