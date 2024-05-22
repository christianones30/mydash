<?php
session_start();
include "db_conn.php";

// Count online users (within the last 5 minutes)
$time_threshold = time() - 300; // 5 minutes threshold
$sql_online_users = "SELECT COUNT(*) AS online_count FROM users WHERE last_login > $time_threshold";
$result_online_users = $conn->query($sql_online_users);
$row_online_users = $result_online_users->fetch_assoc();
$online_users = $row_online_users['online_count'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="home">
        <?php 
        // Check if user is logged in
        if(isset($_SESSION['name'])) { 
            // Display username if logged in
            ?>
            <h2>Hello, <?php echo $_SESSION['name']; ?></h2>
        <?php } else { 
            // Display as guest if not logged in
            ?>
            <h2>Hello, Guest</h2>
        <?php } ?>

        <?php 
        // Database connection
        include "db_conn.php";

        // Fetch number of users
        $sql_users = "SELECT COUNT(*) AS user_count FROM users";
        $result_users = $conn->query($sql_users);
        $row_users = $result_users->fetch_assoc();
        $user_count = $row_users['user_count'];

        // Fetch total number of visits
        $sql_visits = "SELECT COUNT(*) AS visit_count FROM visits";
        $result_visits = $conn->query($sql_visits);
        $row_visits = $result_visits->fetch_assoc();
        $visit_count = $row_visits['visit_count'];
        ?>

        <p>Total Users: <?php echo $user_count; ?></p>
        <p>Total Visits: <?php echo $visit_count; ?></p>
        <p>Online user: <?php echo $online_users;?></p>
    </div>
    <div class="logout-container">
        <a class="logout" href="logout.php">Log out</a>
    </div>
</body>
<style>
    
    .home {
        display: block;
        border: 2px solid #ccc;
        width: 30%;
        height: 70%;
        padding: 10px;
        margin: 10px auto;
        border-radius: 5px;
        backdrop-filter: blur(10px);
    }

    h2 {
        font-size: 40px;
        padding: 50px;
    }

    .logout-container {
        text-align: center;
        margin-top: 20px;
    }

    a.logout {
        text-decoration: none;
        font-size: 30px;
        background: #555;
        padding: 20px 15px;
        color: #fff;
        border-radius: 5px;
        border: none;
        height: 10%;
        width: 20%;
    }
</style>
</html>
