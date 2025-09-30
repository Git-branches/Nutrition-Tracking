<?php
include "connection/conn.php";

if(isset($_POST['add'])){
    $dateReg = date('Y-m-d');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    

    $duplicate = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $duplicate);
    if(mysqli_num_rows($result) > 0){
        echo"<script> alert('Username has already been taken')</script>";
    }else{
        $sql = "INSERT INTO users (user_id, name, email, username, password, dateReg) VALUES ('','$name','$email','$username','$password', '$dateReg')";
        mysqli_query($conn, $sql);
        $_SESSION['success'] = 'Registered Successfully';
        header('location: login.php');
    }
    $_SESSION['error'] = $conn->error;
    
}
?>