<?php
require 'connDB.php';

$subcategoryId = $_POST['editSubcategoryId'];
$subcategoryName = $_POST['editSubcategoryName'];
$subcategoryDescription = $_POST['editSubcategoryDescription'];

$sql = "UPDATE subcategories SET name='$subcategoryName', description='$subcategoryDescription' WHERE id='$subcategoryId'";
$result = mysqli_query($connection, $sql);

// if ($result) {
//     echo "Subcategory updated successfully";
// } else {
//     echo "Error updating subcategory: " . mysqli_error($connection);
// }

mysqli_close($connection);
?>
