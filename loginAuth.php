<?php
include "connection/conn.php";
session_start();
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' ";
    $query = $conn->query($sql);

    if($query->num_rows < 1){
        $_SESSION['error'] = 'No account';
    }
    else{
        $row = $query->fetch_assoc();
        if(password_verify($password, $row['password'])){
            $_SESSION['user'] = $row['user_id'];
            header('location: login.php');
        }
        else{
            $_SESSION['error'] = 'Incorrect password';
        }
    }
}
else{
    $_SESSION['error'] = 'Input credentials first';
}


?>