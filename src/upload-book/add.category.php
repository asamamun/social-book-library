<?php
require '../../DB/db.php';
// $conn =new mysqli("localhost","root","","publiclibrary");

$sql = "SELECT * FROM categories";
// $result = mysqli_query($connection, $sql);
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
