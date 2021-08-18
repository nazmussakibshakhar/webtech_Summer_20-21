<?php  
require_once '../model/model.php';


if (isset($_POST['updateEmployee'])) {
	$data['name'] = $_POST['name'];
	$data['nid'] = $_POST['nid'];
	$data['address'] = $_POST['address'];
	$data['position'] = $_POST['position'];
	$data['salary'] = $_POST['salary'];


  if (updateEmployee($_POST['id'], $data)) {
  	echo 'Successfully updated!!';
  	
  	header('Location: ../showEmploye.php?id=' . $_POST["id"]);
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>