<?php
session_start();
require_once('db/db_config.php');

// Ensure the user is authenticated
if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Always use the session user ID instead of GET to avoid IDOR
$user_id = $_SESSION['user_id'];

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT id, username FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}

// Optional: Close statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="container">
        <h2>User Profile</h2>
        <div class="info">
            <p><strong>ID:</strong> <?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Username:</strong> <?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
        <div class="back-link">
            <a href="dashboard.php" class="button">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
