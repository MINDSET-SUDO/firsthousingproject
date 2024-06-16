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

$sql = "SELECT agentName, plotNumber, plotMonthlyRent, monthlyIncome, date, maintenanceFees, transactionCost FROM agents";
$result = $conn->query($sql);

$agents = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $agents[] = $row;
    }
}

$conn->close();

echo json_encode($agents);
?>
