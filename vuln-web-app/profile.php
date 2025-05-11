<?php
session_start();
require_once('db/db_config.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $query = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "User not found.";
        exit();
    }
} else {
    echo "No user ID provided.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<div class="container">
        <h2>User Profile</h2>
        <div class="info">
            <p><strong>ID:</strong> <?php echo $user['id']; ?></p>
            <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
            <p><strong>Password (insecure):</strong> <?php echo $user['password']; ?></p>
        </div>

        <div class="back-link">
            <a href="dashboard.php" class="button">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
