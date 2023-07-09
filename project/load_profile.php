<?php
require 'connDB.php';

// Retrieve user ID from session variable
session_start();
$userId = $_SESSION['user_id'];

// Prepare query to fetch profile information
// Modify this query based on your database schema
$query = "SELECT * FROM profile WHERE user_id = '$userId'";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
    echo json_encode($row);
} else {
    echo false;
}
?>
