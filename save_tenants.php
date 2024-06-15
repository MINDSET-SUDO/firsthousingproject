<?php
// save_tenant.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tenants_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO tenants (name, room_number, room_status, monthly_rent, monthly_payment, house_deposit, balance_per_month, maintenance_fees, total_arreas) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssddddd", $name, $room_number, $room_status, $monthly_rent, $monthly_payment, $house_deposit, $balance_per_month, $maintenance_fees, $total_arreas);

// Set parameters and execute
$name = $_POST['name'];
$room_number = $_POST['room_number'];
$room_status = $_POST['room_status'];
$monthly_rent = $_POST['monthly_rent'];
$monthly_payment = $_POST['monthly_payment'];
$house_deposit = $_POST['house_deposit'];
$balance_per_month = $_POST['balance_per_month'];
$maintenance_fees = $_POST['maintenance_fees'];
$balance = $_POST['total_arreas'];

$stmt->execute();

echo "New tenant saved successfully";

$stmt->close();
$conn->close();
?>

