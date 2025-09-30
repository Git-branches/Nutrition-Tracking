<?php 
include '../connection/conn.php';
if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


        $query = "UPDATE users SET name='$name', username='$username', password='$password'
                WHERE user_id='$id'";
        mysqli_query($conn, $query);
        header('location: customers.php');
}
?>