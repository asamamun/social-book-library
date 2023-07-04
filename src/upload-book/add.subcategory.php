<?php
require '../../DB/db.php';
// $conn =new mysqli("localhost","root","","publiclibrary");

$sql = "SELECT * FROM subcategories";
// $result = mysqli_query($connection, $sql);
$result = mysqli_query($conn, $sql);

$options = '';
while ($row = mysqli_fetch_assoc($result)) {
    $subcategoryId = $row['id'];
    $subcategoryName = $row['name'];

    $options .= "<option value='$subcategoryId'>$subcategoryName</option>";
}

mysqli_close($conn);

echo $options;
?>
