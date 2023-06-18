<?php
// Connect to the MySQL database
$host = 'your_database_host';
$username = 'your_username';
$password = 'your_password';
$dbname = 'your_database_name';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch slide data from the database
$sql = "SELECT * FROM slides";
$result = $conn->query($sql);
$slides = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $slides[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return the slide data as JSON
header('Content-Type: application/json');
echo json_encode($slides);
?>
