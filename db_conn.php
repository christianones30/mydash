<?php

$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "test_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update last login time for the user
if(isset($_SESSION['name'])) {
    $username = $_SESSION['name'];
    $current_time = time();
    $sql_update_last_login = "UPDATE users SET last_login = $current_time WHERE user_name = '$username'";
    $conn->query($sql_update_last_login);
}
?>