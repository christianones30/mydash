<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password']) && isset($_POST['email'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);

    $user_data = 'uname='. $uname. '&name='. $name. '&email='. $email;

    if (empty($uname)) {
        header("Location: signup.php?error=User Name is required&$user_data");
        exit();
    } elseif(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    } elseif(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
        exit();
    } elseif(empty($name)){
        header("Location: signup.php?error=Name is required&$user_data");
        exit();
    } elseif(empty($email)) {
        header("Location: signup.php?error=Email is required&$user_data");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup.php?emailerror=Invalid email format&$user_data");
        exit();
    }

    // Hashing the password
    $pass = $pass;

    // Check if the email already exists in the database
    $sql_email_check = "SELECT * FROM users WHERE email='$email'";
    $result_email_check = mysqli_query($conn, $sql_email_check);
    if (mysqli_num_rows($result_email_check) > 0) {
        header("Location: signup.php?error=Email already exists&$user_data");
        exit();
    }

    // Insert user data into the database
    $sql = "INSERT INTO users (user_name, password, name, email) VALUES ('$uname', '$pass', '$name', '$email')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: signup.php?success=Your account has been created successfully");
        exit();
    } else {
        header("Location: signup.php?error=Unknown error occurred&$user_data");
        exit();
    }
} else {
    header("Location: signup.php");
    exit();
}
?>
