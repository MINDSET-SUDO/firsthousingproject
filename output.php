<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tenant Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Tenant Information</h2>
        <p><strong>Tenant Name:</strong> <?php echo htmlspecialchars($_GET['tenant_name']); ?></p>
        <p><strong>Room Number:</strong> <?php echo htmlspecialchars($_GET['room_number']); ?></p>
        <p><strong>Room Status:</strong> <?php echo htmlspecialchars($_GET['room_status']); ?></p>
        <p><strong>Monthly Rent:</strong> $<?php echo number_format($_GET['monthly_rent'], 2); ?></p>
        <p><strong>Total Monthly Payment:</strong> $<?php echo number_format($_GET['monthly_payment'], 2); ?></p>
        <p><strong>Monthly Income:</strong> $<?php echo number_format($_GET['monthly_rent'] - $_GET['monthly_payment'], 2); ?></p>
        <p><strong>Total Arrears:</strong> $<?php echo number_format($_GET['total_arrears'], 2); ?></p>
    </div>
</body>
</html>
