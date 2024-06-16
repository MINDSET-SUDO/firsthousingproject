<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "agentsdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $agentName = $_POST['agentName'];
    $plotNumber = $_POST['plotNumber'];
    $plotMonthlyRent = $_POST['plotMonthlyRent'];
    $monthlyIncome = $_POST['monthlyIncome'];
    $date = $_POST['date'];
    $maintenanceFees = $_POST['maintenanceFees'];
    $transactionCost = $_POST['transactionCost'];

    $sql = "INSERT INTO agents (agentName, plotNumber, plotMonthlyRent, monthlyIncome, date, maintenanceFees, transactionCost)
    VALUES ('$agentName', '$plotNumber', '$plotMonthlyRent', '$monthlyIncome', '$date', '$maintenanceFees', '$transactionCost')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
