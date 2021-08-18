<?php 

 

require_once 'db_connect.php';

 


function showAllStudents(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `user_info` ';
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
    $selectQuery = "SELECT * FROM `user_info` where ID = ?";

 

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

 

    return $row;
}

 

function login($usname,$pass){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `user_info` WHERE usname LIKE '%$usname%' and pass LIKE '%$pass%' ";

 

    
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
    $selectQuery = "INSERT into user_info (name, email, usname, pass, gender, dd, mm, yy )
VALUES (:name,:email,:usname, :pass, :gender, :dd ,:mm, :yy)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':usname' => $data['usname'],
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':pass' => $data['pass'],
            ':gender' => $data['gender'],
            ':dd' => $data['dd'],
            ':mm' => $data['mm'],
            ':yy' => $data['yy']
            
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

 



function updateStudent($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set Name = ?, Surname = ?, Username = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['surname'], $data['username'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}
function updateInfo($data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set name = ?, email = ?, gender = ?, dd = ?, mm = ?, yy = ? where usname = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
          
            $data['name'], $data['email'], $data['gender'], $data['dd'], $data['mm'], $data['yy'], $data['usname']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}
function changepass($data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set pass = ? where pass = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['newpass'], $data['curpass']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

 

function deleteStudent($id){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `user_info` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

 

    return true;
}