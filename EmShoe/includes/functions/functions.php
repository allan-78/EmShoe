<?php
// Database connection
function connectDB() {
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ShoeShop";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Example: User registration
function registerUser($username, $password, $email, $first_name, $last_name, $phone, $address) {
    $conn = connectDB();

    // Sanitize input
    $username = sanitizeInput($username);
    $password = password_hash($password, PASSWORD_DEFAULT); // Hash password
    $email = sanitizeInput($email);
    $first_name = sanitizeInput($first_name);
    $last_name = sanitizeInput($last_name);
    $phone = sanitizeInput($phone);
    $address = sanitizeInput($address);

    $sql = "INSERT INTO users (username, password, email, first_name, last_name, phone, address) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $username, $password, $email, $first_name, $last_name, $phone, $address);

    if ($stmt->execute()) {
        $conn->close();
        return true;
    } else {
        $conn->close();
        return false;
    }
}

// Example: User login
function loginUser($username, $password) {
    $conn = connectDB();
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        $conn->close();
        return true;
    } else {
        $conn->close();
        return false;
    }
}

// Example: User logout
function logoutUser() {
    session_start();
    session_destroy();
}

// Function to get all products
function getAllProducts() {
    $conn = connectDB();
    $sql = "SELECT p.*, c.name AS category_name FROM products p JOIN categories c ON p.category_id = c.id";
    $result = $conn->query($sql);
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    $conn->close();
    return $products;
}

// Function to get a product by its ID
function getProductById($product_id) {
    $conn = connectDB();
    $sql = "SELECT p.*, c.name AS category_name FROM products p JOIN categories c ON p.category_id = c.id WHERE p.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $conn->close();
    return $product;
}

// Function to get all categories
function getAllCategories() {
    $conn = connectDB();
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    $categories = [];
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
    $conn->close();
    return $categories;
}

// ... (Add more functions for user-related operations)
?>
