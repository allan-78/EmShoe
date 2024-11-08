<?php
require_once '../includes/functions/functions.php';
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: index.php");
    exit;
}

// Example: Get data for the dashboard
$totalProducts = count(getProducts());
$totalUsers = 0; // You'll need to get the number of users
$recentOrders = []; // You'll need to retrieve recent orders

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../layout/css/admin.css">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="dashboard-section">
            <h2>Key Metrics</h2>
            <div class="metric">
                <h3>Total Products</h3>
                <span><?php echo $totalProducts; ?></span>
            </div>
            <div class="metric">
                <h3>Total Users</h3>
                <span><?php echo $totalUsers; ?></span>
            </div>
            </div>
        <div class="dashboard-section">
            <h2>Recent Orders</h2>
            <!-- Display recent orders here -->
            <?php if (empty($recentOrders)): ?>
                <p>No recent orders yet.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($recentOrders as $order): ?>
                        <li><?php echo "Order #{$order['id']}"; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <!-- Add more sections for other admin functionalities -->
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>