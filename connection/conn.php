<?php
	$conn = mysqli_connect('localhost', 'root', '', 'health');
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>