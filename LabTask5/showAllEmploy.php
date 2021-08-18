<?php  
require_once 'controller/employInfo.php';

$employ = fetchAllEmploy();


    include "nav.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>Person</th>
			<th>Name</th>
			<th>ID</th>
			<th>Address</th>
			<th>NID</th>
			<th>Position</th>
			<th>Salary</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($employ as $i => $employee): ?>
			<tr>
				<td><a href="showEmploy.php?id=<?php echo $employee['id'] ?>"><?php echo $employee['name'] ?></a></td>
				<td><?php echo $employee['name'] ?></td>
				<td><?php echo $employee['id'] ?></td>
				<td><?php echo $employee['address'] ?></td>
				<td><?php echo $employee['nid'] ?></td>
				<td><?php echo $employee['position'] ?></td>
				<td><?php echo $employee['salary'] ?></td>

				<td><a href="editEmployee.php?id=<?php echo $employee['id'] ?>">Edit</a>&nbsp<a href="controller/deleteEmployee.php?id=<?php echo $employee['id'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>