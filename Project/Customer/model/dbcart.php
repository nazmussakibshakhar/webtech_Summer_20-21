<?php 
	 include "dbconnection.php";
 
	function getBookId($bookid)
	 {
 		$conn = connect();  
 		$statement = $conn->prepare("SELECT * FROM books WHERE bookid = ?");
 		$statement->bind_param("i", $bookid);
		$statement->execute(); 
		$records = $statement->get_result();
		return $records->fetch_all(MYSQLI_ASSOC); // associative array.
	} 


	function AddCart($bookname,$authorname,$edition,$numberofcopy,$shelfno,$bookid)
	{
		$conn = connect(); // from include dbconnection
		$statement = $conn->prepare("INSERT INTO cart (bookname,authorname,edition,numberofcopy,shelfno,bookid)VALUES(?,?,?,?,?,?)"); 
	 	$statement->bind_param("sssiii",$bookname,$authorname,$edition,$numberofcopy,$shelfno,$bookid);
		return $statement->execute();
  	}

	

  	function getAllcart()
	 {
 		$conn = connect();  
 		$statement = $conn->prepare("SELECT * FROM cart");
		$statement->execute(); 
		$records = $statement->get_result();
		return $records->fetch_all(MYSQLI_ASSOC); 
	} 

	

	function removeBook($userId)
	 {
 		$conn = connect(); 
 		$statement = $conn->prepare("DELETE FROM cart WHERE bookid = ?");  
	 	$statement->bind_param("i", $userId);
		return ($statement->execute()); 
 	}

 

 


 ?>