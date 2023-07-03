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

// Prepare and bind the data to insert into the database
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if email already exists in the database
$checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
$checkEmailResult = $conn->query($checkEmailQuery);
if ($checkEmailResult->num_rows> 0) {
    echo "Email already exists";
    exit();
}

$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $password);

// Execute the statement
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and the database connection
$stmt->close();
$conn->close();
?>
