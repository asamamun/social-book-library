<?php
session_start();
require 'connDB.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Perform user authentication and role checking
$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['loggedin'] = true;

    if ($row['role'] == 1) {
        // User role
        $response = array(
            'status' => 'success',
            'message' => 'Login Successful',
            'redirect' => 'home.php'
        );
    } elseif ($row['role'] == 2) {
        // Admin role
        $response = array(
            'status' => 'success',
            'message' => 'Login Successful',
            'redirect' => 'admin.php'
        );
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Invalid credentials'
    );
}

echo json_encode($response);
$conn->close();
?>
