<?php 

require_once 'db_connect.php';


function showAllEmploy(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `info` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showStudent($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM info where id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchUser($name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `info` WHERE name LIKE '%$name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addStudent($data){
	$conn = db_conn();
    $selectQuery = "INSERT into info (name, id, address, nid, position, salary)
VALUES (:name, :id, :address, :nid ,:position, :salary)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':id' => $data['id'],
        	':address' => $data['address'],
        	':nid' => $data['nid'],
        	':position' => $data['position'],
            ':salary' => $data['salary']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateEmployee($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE info SET name=?, nid=?, address=?, position=?, salary=?  WHERE id=?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['nid'], $data['address'], $data['position'],$data['salary'],$id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteEmployee($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `info` WHERE `id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}