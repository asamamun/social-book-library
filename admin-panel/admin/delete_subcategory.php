<?php
require 'connDB.php';

$subcategoryId = $_POST['subcategoryId'];

$sql = "DELETE FROM subcategories WHERE id='$subcategoryId'";
$result = mysqli_query($conn, $sql);

// if ($result) {
//     echo "Subcategory deleted successfully";
// } else {
//     echo "Error deleting subcategory: " . mysqli_error($connection);
// }

mysqli_close($conn);
?>
