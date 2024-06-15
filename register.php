<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username, user_id, and password from POST request
$user = $_POST['username'];
$user_id = $_POST['user_id'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

// SQL query to insert new user
$sql = "INSERT INTO users (user_id, username, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $user_id, $user, $pass);

if ($stmt->execute()) {
    echo "New record created successfully";
    // Redirect to login page or display success message
    header("Location: login.html");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
