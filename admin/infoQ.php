<?php

require '../connection/conn.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM users INNER JOIN information ON users.user_id=information.user_id WHERE information.user_id = '$id'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    echo json_encode($row);
}

?>