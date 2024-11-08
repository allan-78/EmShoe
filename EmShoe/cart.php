<?php
    // Include database connection
    require_once('includes/connect.php');

    // Start the session
    session_start();

    // Check if the user added a product to the cart
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $quantity = 1; // Default quantity

        // Check if the product already exists in the cart
        if (isset($_SESSION['cart'][$product_id])) {
            // If yes, update the quantity
            $_SESSION['cart'][$product_id] += $quantity;
        } else {
            // If no, add the product to the cart
            $_SESSION['cart'][$product_id] = $quantity;
        }

        // Redirect back to the product page or wherever you want
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
?>