<?php
// Establish connection to MySQL database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'test';
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
}

// Get user message from AJAX request
$message = $_POST['message'];

// Save user message to the database
$sql = "INSERT INTO messages (sender, message) VALUES ('User', '$message')";
$result = mysqli_query($conn, $sql);
if ($result) {
    // Generate chatbot response
    $response = 'Thank you for your message!';
} else {
    $response = 'Oops! Something went wrong.';
}

echo $response;
mysqli_close($conn);
?>
