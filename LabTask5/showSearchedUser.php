
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table,td,th{
			border:1px solid black;
		}
	</style>
</head>
<body>

<?php 
    //include "nav.php";

?>

<table>
	<thead>
		<tr>
			<th>id</th>
			<th>Name</th>
			<th>Address</th>
			<th>NID</th>
			<th>Position</th>
			<th>Salary</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($allSearchedUsers as $i => $user): ?>
			<tr>
				<td><a href="../showStudent.php?id=<?php echo $user['id'] ?>"><?php echo $user['name'] ?></a></td>
				<td><?php echo $user['name'] ?></td>
				<td><?php echo $user['id'] ?></td>
				<td><?php echo $user['address'] ?></td>
				<td><?php echo $user['position'] ?></td>
				<td><?php echo $user['salary'] ?></td>
				<td><a href="../editEmployee.php?id=<?php echo $user['id'] ?>">Edit</a>&nbsp<a href="deleteEmployee.php?id=<?php echo $user['id'] ?>">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>