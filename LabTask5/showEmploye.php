<?php  
require_once 'controller/employinfo.php';

$employee = fetchEmployee($_GET['id']);


    include "nav.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<tr>
		<th>Person</th>
		<th>Name</th>
		<th>id</th>
		<th>nid</th>
		<th>Address</th>
		<th>position</th>
		<th>salary</th>
	</tr>
	<tr>
		<td><a href="showEmploye.php?id=<?php echo $employee['id'] ?>"><?php echo $employee['name'] ?></a></td>
		<td><?php echo $employee['name'] ?></td>
		<td><?php echo $employee['id'] ?></td>
		<td><?php echo $employee['nid'] ?></td>
		<td><?php echo $employee['address'] ?></td>
		<td><?php echo $employee['position'] ?></td>
		<td><?php echo $employee['salary'] ?></td>
	</tr>

</table>


</body>
</html>