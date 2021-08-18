	<?php 

	/// redirect login for no session
	session_start();
	if(!isset($_SESSION['s_id']))
		header("location:../");

			$success = $failed = "";
 			include '../Model/dbproduct.php';
			// if(empty(basic_validation($_GET[''])))
			// {
				$bookList = getAllBooks();			
			// }
		 	
			// else 
			// {
			// 	$bookList = getBookId(basic_validation($_GET['']));
 			// }
			// 	$bookid = $_GET[''];

			// if(!empty(basic_validation($_GET[''])))
			// {
 			// 	$response = removeBook($_GET['']);
			// 	if ($response) 
			// 	{
			// 		$success = "Book remove successfull"; 
			// 		$bookList = getAllBooks(); // auto refresh / update.
			// 	}
			// 	else
			// 		$failed = "Error while removing user";
			// }

		function basic_validation($data)
	    {
		    $data = trim($data);
		    $data = htmlspecialchars($data);
		    $data = stripcslashes($data);
		    return $data;
	    }
	     
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Product</title>
	<link rel="stylesheet" href="../View/css/viewproduct.css?v <?php echo time(); ?>">
    <script src="../View/js/viewproduct.js"></script>

</head>
<body>

	<?php
 	$page = 'viewbook';
	include('../View/html/header.php');
	?>
 
 	<div class="table">
	<table>
		<thead>
			<tr>
				<th>ProductName</th>
				<th>Description</th> 
				<th>Price</th>
				<th>Quantity</th>
				<!-- <th>Add To Cart</th> -->
			</tr>
		</thead>

		<tbody  id="result">
			<?php
		 		foreach ($bookList as $arr  )
				{
		  			foreach ($arr as $key => $value)
		  			{
		  				echo  "<td>".$value."</td>";
		   				if($key == "bookid")
		   				{
		  					echo "<td><a href = '".$_SERVER['PHP_SELF']."?uid=".$arr["bookid"] ."'>Add To Cart</a></td><tr>"; //get id
		   				}
					}
		 		}
			?>
		</tbody>
	</table>
	</div>

<?php include('../View/html/footer.html');?>
</body>
</html>
