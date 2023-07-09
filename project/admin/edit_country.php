<?php
require 'connDB.php';

$countryId = $_POST['countryId'];
$iso = $_POST['iso'];
$name = $_POST['name'];
$nicename = $_POST['nicename'];
$iso3 = $_POST['iso3'];
$numcode = $_POST['numcode'];
$phonecode = $_POST['phonecode'];

$sql = "UPDATE countries SET iso='$iso', name='$name', nicename='$nicename', iso3='$iso3', numcode='$numcode', phonecode='$phonecode' WHERE id='$countryId'";
if (mysqli_query($conn, $sql)) {
    echo "Country updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
