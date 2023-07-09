<?php
// Establish database connection
require 'connDB.php';

// Get form data
$categoryName = $_POST['categoryName'];
$categoryDescription = $_POST['categoryDescription'];
$categoryImage = $_FILES['categoryImage'];

// Perform necessary validation and sanitization

// Move the uploaded image to the desired location
$targetDirectory = 'uploads/';
$targetFile = $targetDirectory . basename($categoryImage['name']);
move_uploaded_file($categoryImage['tmp_name'], $targetFile);

// Insert the category into the database
$sql = "INSERT INTO categories (name, description, image) VALUES ('$categoryName', '$categoryDescription', '$targetFile')";
$result = mysqli_query($conn, $sql);

// Check if the insertion was successful
if ($result) {
    echo "Category added successfully";
} else {
    echo "Error adding category: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
