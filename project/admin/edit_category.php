<?php
// Establish database connection
require 'connDB.php';

// Get form data
$categoryId = $_POST['editCategoryId'];
$categoryName = $_POST['editCategoryName'];
$categoryDescription = $_POST['editCategoryDescription'];
$categoryImage = $_FILES['editCategoryImage'];

// Perform necessary validation and sanitization

// If a new image is uploaded, move it to the desired location
if (!empty($categoryImage['name'])) {
    $targetDirectory = 'uploads/';
    $targetFile = $targetDirectory . basename($categoryImage['name']);
    move_uploaded_file($categoryImage['tmp_name'], $targetFile);

    // Update the category with the new image
    $sql = "UPDATE categories SET name='$categoryName', description='$categoryDescription', image='$targetFile' WHERE id='$categoryId'";
} else {
    // Update the category without changing the image
    $sql = "UPDATE categories SET name='$categoryName', description='$categoryDescription' WHERE id='$categoryId'";
}

$result = mysqli_query($conn, $sql);

// Check if the update was successful
if ($result) {
    echo "Category updated successfully";
} else {
    echo "Error updating category: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
