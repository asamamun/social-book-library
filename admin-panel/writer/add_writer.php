<?php
require 'connDB.php';

$name = $_POST['name'];
$bio = $_POST['bio'];
$countryId = $_POST['countryId'];
$image = $_FILES['image']['name'];
$imageTmp = $_FILES['image']['tmp_name'];
$targetDir = "images/";
$targetFile = $targetDir . $image;

move_uploaded_file($imageTmp, $targetFile);

$sql = "INSERT INTO writers (name, bio, country_id, image) VALUES ('$name', '$bio', '$countryId', '$targetFile')";

if (mysqli_query($connection, $sql)) {
    echo "Writer added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>
