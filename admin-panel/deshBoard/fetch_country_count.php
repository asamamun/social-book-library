<?php
// Fetch the count of countries from the database

// Replace <database_name> and <table_name> with your actual database and table information
$conn = new mysqli('localhost', 'root', '', 'publiclibrary');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS count FROM countries";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['count'];
} else {
    echo '0';
}

$conn->close();
?>
