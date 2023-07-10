<?php
// Database connection settings
require 'connDB.php';

// Get the comment ID from the AJAX request
$commentId = $_POST['comment_id'];

// Delete the comment from the database
$sql = "DELETE FROM comments WHERE id = '$commentId'";

if ($conn->query($sql) === TRUE) {
    // Success response
    echo "success";
} else {
    // Error response
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
