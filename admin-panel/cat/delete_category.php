<?php
// Establish database connection
require 'connDB.php';

// Get the category ID from the AJAX request
$categoryId = $_POST['categoryId'];

// Delete the category from the database
$sql = "DELETE FROM categories WHERE id='$categoryId'";
$result = mysqli_query($connection, $sql);

// Check if the deletion was successful
if ($result) {
    echo "Category deleted successfully";
} else {
    echo "Error deleting category: " . mysqli_error($connection);
}

// Close database connection
mysqli_close($connection);
