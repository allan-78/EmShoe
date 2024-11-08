<?php 
    // Include database connection file
    require_once('../includes/connect.php');

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize user input
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']); // Remember to hash the password before storing!
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        // ... (get other user data)

        // Validation (add more validation as needed)
        if (empty($username) || empty($password) || empty($email)) {
            $error = "Please fill out all fields.";
        } else {
            // Check if username or email already exists
            $checkUsername = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
            $checkEmail = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
            if (mysqli_num_rows($checkUsername) > 0) {
                $error = "Username already exists.";
            } else if (mysqli_num_rows($checkEmail) > 0) {
                $error = "Email already exists.";
            } else {
                // Hash the password using a strong algorithm like bcrypt
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                // Insert user into the database
                $sql = "INSERT INTO users (username, password, email, first_name, last_name, phone, address) VALUES ('$username', '$hashedPassword', '$email', '', '', '', '')";
                if (mysqli_query($conn, $sql)) {
                    // Success
                    $success = "User added successfully.";
                } else {
                    $error = "Error: " . mysqli_error($conn);
                }
            }
        }
    } 

    // Include the header (assuming you have a header.php)
    require_once('../layout/header.php'); 
?>

<h2>Add User</h2>
<?php 
    if (isset($error)) {
        echo '<div class="error">' . $error . '</div>';
    }
    if (isset($success)) {
        echo '<div class="success">' . $success . '</div>';
    }
?>
<form method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <!-- Add input fields for other user details -->

    <button type="submit">Add User</button>
</form>

<?php 
    // Include the footer (assuming you have a footer.php)
    require_once('../layout/footer.php'); 
?>