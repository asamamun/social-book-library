<?php
require 'connDB.php';

$categoryId = $_POST['categoryId'];
$subcategoryName = $_POST['subcategoryName'];
$subcategoryDescription = $_POST['subcategoryDescription'];
$subcategoryImage = $_FILES['subcategoryImage'];

$targetDirectory = 'uploads/';
$targetFile = $targetDirectory . basename($subcategoryImage['name']);
move_uploaded_file($subcategoryImage['tmp_name'], $targetFile);

$sql = "INSERT INTO subcategories (category_id, name, description, image) VALUES ('$categoryId', '$subcategoryName', '$subcategoryDescription', '$targetFile')";
$result = mysqli_query($connection, $sql);

// if ($result) {
//     echo "Subcategory added successfully";
// } else {
//     echo "Error adding subcategory: " . mysqli_error($connection);
// }

mysqli_close($connection);
?>

