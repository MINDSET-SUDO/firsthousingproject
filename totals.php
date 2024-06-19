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

// Calculate totals
$sql = "SELECT 
            SUM(plotMonthlyRent) AS totalRent,
            SUM(monthlyIncome) AS totalIncome,
            SUM(maintenanceFees) AS totalFees
        FROM agents";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $totals = $result->fetch_assoc();
} else {
    $totals = array(
        'totalRent' => 0,
        'totalIncome' => 0,
        'totalFees' => 0
    );
}

$conn->close();

// JSON response
echo json_encode($totals);

?>
