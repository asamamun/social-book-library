<?php
require 'connDB.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];

// Validate password and confirm password match
if ($password !== $confirmPassword) {
    header("Location: register.php");
    exit();
}

// Insert user into the database
$query = "INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$password')";

if ($conn->query($query) === TRUE) {
    // Registration successful, redirect to login page with success parameter
    header("Location: login.php?success=true");
    exit();
} else {
    echo 'Error: ' . $conn->error;
}

$conn->close();
?>
