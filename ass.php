<?php 
include 'connection/conn.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM assign WHERE ass_id = '$id'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    echo json_encode($row);

}

if(isset($_POST["read"])){
    $id = $_POST["id"];
    $status = 'Done';
    $sql = "UPDATE assign SET status = '$status' WHERE ass_id = '$id'";
    $query = $conn->query($sql);

    header("location: task.php");
}

if(isset($_POST["delete"])){
    $id = $_POST["id"];
   
    
    $sql = "DELETE FROM `assign` WHERE ass_id = '$id'";
    $query = $conn->query($sql);
    header("location: task.php");
}
?>