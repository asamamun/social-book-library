<?php
require 'connDB.php';

$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);

$options = '';
while ($row = mysqli_fetch_assoc($result)) {
    $categoryId = $row['id'];
    $categoryName = $row['name'];

    $options .= "<option value='$categoryId'>$categoryName</option>";
}

mysqli_close($conn);

echo $options;
?>
