<?php 
require '../connection/conn.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM inquiries WHERE inq_id = '$id'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    echo json_encode($row);

}

if(isset($_POST["read"])){
    $id = $_POST["id"];
    $status = 'read';
    $sql = "UPDATE inquiries SET status = '$status' WHERE inq_id = '$id'";
    $query = $conn->query($sql);

    header("location: inquiries.php");
}

if(isset($_POST["assign"])){
    $id = $_POST["id"];
    $ass = $_POST["type"];
    
    $sql = "INSERT INTO assign(ass_id, user_id, task_id, status) VALUES ('','$id', '$ass','Pending')";
    $query = $conn->query($sql);
    header("location: customers.php");
}
?>