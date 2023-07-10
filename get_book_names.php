<?php
// Connect to the database
require 'connDB.php';

// Retrieve book names from the database
$sql = "SELECT name FROM books";
$result = $conn->query($sql);

$bookNames = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookNames[] = $row['name'];
    }
}

// Close the database connection
$conn->close();

// Return book names as JSON response
echo json_encode($bookNames);
?>
