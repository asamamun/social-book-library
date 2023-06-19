<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "publiclibrary";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the submitted credentials
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute a query to check the user's credentials
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists and the password matches
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if ($user['password'] === $password) {
        echo "Login successful!";
    } else {
        echo "Invalid password";
    }
} else {
    echo "Invalid email";
}

// Close the statement and the database connection
$stmt->close();
$conn->close();
?>
