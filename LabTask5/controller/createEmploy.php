<?php  
require_once '../model/model.php';


if (isset($_POST['addemploy'])) {
	$data['name'] = $_POST['name'];
	$data['id'] = $_POST['id'];
	$data['address'] = $_POST['address'];
	$data['nid'] = $_POST['nid'];
	$data['position'] =$_POST['position'];
	$data['salary'] = $_POST["salary"];


  if (addStudent($data)) {
  	echo 'Successfully added!!';
  }
} else {
	echo 'You are not allowed to access this page.';
}

?>