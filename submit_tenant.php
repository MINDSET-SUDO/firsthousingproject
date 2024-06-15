<?php
// Database configuration
$servername = "localhost"; // Replace with your database server hostname
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "tenants_database"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Include database connection
    // Adjust this according to your database connection script

    // Initialize variables to store form data
    $errors = [];
    $tenant_name = $room_number = $room_status = $monthly_rent = $monthly_payment = $house_deposit = $balances_per_month = $maintenance_fees = $total_arrears = "";

    // Function to sanitize and validate inputs
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Sanitize and validate each form field
    if (isset($_POST['tenant_name'])) {
        $tenant_name = sanitize_input($_POST['tenant_name']);
    } else {
        $errors[] = "Tenant name is required";
    }

    if (isset($_POST['room_number'])) {
        $room_number = sanitize_input($_POST['room_number']);
    } else {
        $errors[] = "Room number is required";
    }

    if (isset($_POST['room_status'])) {
        $room_status = sanitize_input($_POST['room_status']);
    } else {
        $errors[] = "Room status is required";
    }

    if (isset($_POST['monthly_rent'])) {
        $monthly_rent = floatval($_POST['monthly_rent']);
    } else {
        $errors[] = "Monthly rent is required";
    }

    if (isset($_POST['monthly_payment'])) {
        $monthly_payment = floatval($_POST['monthly_payment']);
    } else {
        $monthly_payment = 0;
    }

    if (isset($_POST['house_deposit'])) {
        $house_deposit = floatval($_POST['house_deposit']);
    } else {
        $house_deposit = 0;
    }

    if (isset($_POST['balances_per_month'])) {
        $balances_per_month = floatval($_POST['balances_per_month']);
    } else {
        $balances_per_month = 0;
    }

    if (isset($_POST['maintenance_fees'])) {
        $maintenance_fees = floatval($_POST['maintenance_fees']);
    } else {
        $maintenance_fees = 0;
    }

    if (isset($_POST['total_arrears'])) {
        $total_arrears = floatval($_POST['total_arrears']);
    } else {
        $total_arrears = 0;
    }

    // If there are errors, display them and terminate processing
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
        die();
    }

    // Calculate total monthly payment and monthly income
    $total_monthly_payment = $monthly_payment + $house_deposit + $balances_per_month + $maintenance_fees;
    $monthly_income = $monthly_rent - $total_monthly_payment;
    $total_arrears += $total_monthly_payment;

    // Insert data into database
    $query = "INSERT INTO tenants (tenant_name, room_number, room_status, monthly_rent, monthly_payment, house_deposit, balances_per_month, maintenance_fees, total_arrears)
              VALUES ('$tenant_name', '$room_number', '$room_status', '$monthly_rent', '$monthly_payment', '$house_deposit', '$balances_per_month', '$maintenance_fees', '$total_arrears')";

    if (mysqli_query($conn, $query)) {
        // Redirect to output page with calculated values
        header("Location: output.php?tenant_name=$tenant_name&room_number=$room_number&room_status=$room_status&monthly_rent=$monthly_rent&monthly_payment=$monthly_payment&total_monthly_payment=$total_monthly_payment&monthly_income=$monthly_income&total_arrears=$total_arrears");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>
