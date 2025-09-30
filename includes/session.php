<?php
	require './connection/conn.php';
	session_start();
	if(isset($_SESSION['user'])){
		$user_id = $_SESSION['user'];
		$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$infoSql = "SELECT * FROM information WHERE user_id = '$user_id'";
		$profQ = mysqli_query($conn, $infoSql);
		$info = $profQ->fetch_assoc();
		
	}
	else{
		header('location: logout.php');
	}

?>