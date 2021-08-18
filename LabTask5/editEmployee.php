<?php 

require_once 'controller/employInfo.php';
$employee = fetchEmployee($_GET['id']);


 include "nav.php";



 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form action="controller/updateEmployee.php" method="POST" enctype="multipart/form-data">
 <label for="name">Name:</label><br>
  <input value="<?php echo $employee['name'] ?>" type="text" id="name" name="name"><br>
  <label for="id">ID:</label><br>
  <input type="text" name="id" value="<?php echo $_GET['id'] ?>"> <br>
  <label for="address">Address:</label><br>
  <input value="<?php echo $employee['address'] ?>" type="text" id="address" name="address"><br>
  <label for="nid">NID:</label><br>
  <input  value="<?php echo $employee['nid'] ?>" type="text" name="nid"><br><br>
  <label for="position">Position:</label><br>
  <input  value="<?php echo $employee['position'] ?>"type="text" name="position"><br><br>
  <label for="salary">salary:</label><br>
  <input  value="<?php echo $employee['salary'] ?>" type="text" name="salary"><br><br>
  <input type="submit" name = "updateEmployee" value="Update">
  <input type="reset"> 
</form> 

</body>
</html>

