<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cart</title>
   <link rel="stylesheet" href="../View/css/cart.css?v <?php echo time(); ?>">
    <script src="../View/js/cart.js"></script>


</head>
<body>

	<?php

    /// redirect login for no session
    session_start();
    if(!isset($_SESSION['s_id']))
        header("location:../");

	// header file.
	$page = 'updatebook';
	include('../View/html/header.php');
	include('../Model/dbproduct.php');

	?>

<div class ="cart">
   <p>Your cart will be displayed here</p>
</div>
 
  <!-- ///////////////////////////////////////////////// -->

		<?php
		// header file.
		include('../View/html/footer.html');
		?>

	</body>
	</html>