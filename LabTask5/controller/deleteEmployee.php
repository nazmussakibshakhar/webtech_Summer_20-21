<?php 

require_once '../model/model.php';

if (deleteEmployee($_GET['id'])) {
    header('Location: ../showAllEmploy.php');
}

 ?>