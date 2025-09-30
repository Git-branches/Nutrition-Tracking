<?php
session_start();
session_destroy();
unset($_SESSION["user"]);
header("Location: login.php");
$_SESSION['response'] = "Successfully Logout";
$_SESSION['type'] = "success";
