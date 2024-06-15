<?php
session_start(); // Start or resume session

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header('Location: login.html');
    exit;
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculation Result</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <?php
        // Display output from submit_tenant.php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo $_POST["output"];
        } else {
            echo "No data received.";
        }
        ?>
    </div>
</body>
</html>

// Display output from the calculations or operations
echo "<h2>Calculation Result</h2>";
echo "<p>Output goes here...</p>";

// Provide logout option
echo "<form action='logout.php' method='post'>";
echo "<input type='submit' value='Logout'>";
echo "</form>";

?>