<?php
require 'connDB.php';

$writerId = $_POST['writerId'];
$name = $_POST['name'];
$bio = $_POST['bio'];
$countryId = $_POST['countryId'];
$image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';
$imageTmp = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : '';
$targetDir = "images/";
$targetFile = $targetDir . $image;

if (!empty($imageTmp)) {
    move_uploaded_file($imageTmp, $targetFile);
    $imageQuery = "image = '$targetFile',";
} else {
    $imageQuery = "";
}

$sql = "UPDATE writers SET name = '$name', bio = '$bio', country_id = '$countryId', $imageQuery WHERE id = '$writerId'";

if (mysqli_query($connection, $sql)) {
    echo "Writer updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>
