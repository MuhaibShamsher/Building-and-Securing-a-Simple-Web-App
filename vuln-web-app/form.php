<!DOCTYPE html>
<html>
<head>
    <title>Submit Comment</title>
    <link rel="stylesheet" type="text/css" href="css/form.css">
</head>
<body>
    <div class="container">
        <h2>Leave a Comment</h2>
        <form action="submit_form.php" method="POST">
            <label for="comment">Your Comment:</label><br>
            <textarea name="comment" id="comment" rows="5" required></textarea><br><br>
            <input type="submit" value="Submit">
        </form>
        <p><a href="dashboard.php">Back to Dashboard</a></p>

        <h3>All Comments:</h3>
        <?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: login.php");
            exit();
        }

        $conn = new mysqli("localhost", "root", "", "vuln_web_app");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT comment FROM comments ORDER BY id DESC";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<div class='comment'>" . $row['comment'] . "</div>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
