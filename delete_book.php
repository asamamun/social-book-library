<?php
// Retrieve the book ID from the AJAX request
$bookId = $_POST['bookId'];

// Connect to the database
require 'connDB.php';

// Delete the associated image records first
$sql = "DELETE FROM images WHERE book_id = '$bookId'";
$conn->query($sql);

// Delete the book from the database based on the book ID
$sql = "DELETE FROM books WHERE id = '$bookId'";
if ($conn->query($sql) === TRUE) {
    echo "Book deleted successfully.";
} else {
    echo "Error deleting book: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

