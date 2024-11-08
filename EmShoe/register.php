<?php
require_once 'includes/functions/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle registration form submission and create a new user in the database
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="layout/css/style.css">
</head>
<body>
    <header>
        <h1>EM' Quality Shoes</h1>
        <!-- Navigation -->
    </header>
    <main>
        <section class="register">
            <h2>Register</h2>
            <form method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </section>
    </main>
    <footer>
        <!-- Footer content -->
    </footer>
</body>
</html>