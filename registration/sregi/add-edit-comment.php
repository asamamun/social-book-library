<?php
// Database connection settings
require 'connDB.php';

// Get the comment data from the AJAX request
$commentId = $_POST['comment_id'];
$bookId = $_POST['book_id'];
$comment = $_POST['comment'];

if (empty($commentId)) {
    // Add new comment
    $sql = "INSERT INTO comments (book_id, user_id, comment, reply_id, created_at) 
            VALUES ('$bookId', '1', '$comment', NULL, NOW())";

    if ($conn->query($sql) === TRUE) {
        // Success response
        echo "success";
    } else {
        // Error response
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Update existing comment
    $sql = "UPDATE comments 
            SET comment = '$comment'
            WHERE id = '$commentId'";

    if ($conn->query($sql) === TRUE) {
        // Success response
        echo "success";
    } else {
        // Error response
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
