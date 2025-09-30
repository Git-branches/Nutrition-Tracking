<?php 
include '../connection/conn.php';
if(isset($_POST['delete'])){
        $id = $_POST['id'];
        
        $query1 = "DELETE FROM information
                WHERE user_id='$id'";
        mysqli_query($conn, $query1);

        $query2 = "DELETE FROM assign
        WHERE user_id='$id'";
        mysqli_query($conn, $query2);

        $query3 = "DELETE FROM history
        WHERE user_id='$id'";
        mysqli_query($conn, $query3);

        $query4 = "DELETE FROM inquiries
        WHERE user_id='$id'";
        mysqli_query($conn, $query4);
        

        $query = "DELETE FROM users
        WHERE user_id='$id'";
        mysqli_query($conn, $query);


        header('location: customers.php');
}
?>