<?php
session_start();
if (isset($_SESSION['user_id'])) {
    // Retrieve the user ID from the session
    $userId = $_SESSION['user_id'];
// Database connection settings
require 'connDB.php';

// Get the comment data from the AJAX request
$commentId = $_POST['comment_id'];
$bookId = $_POST['book_id'];
$comment = $_POST['comment'];

echo $commentId;
echo $bookId;
echo $comment;

if (empty($commentId)) {
    // Add new comment
    $sql = "INSERT INTO comments (book_id, user_id, comment, reply_id) 
            VALUES ('$bookId', '$userId', '$comment', NULL)";

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
}
?>
