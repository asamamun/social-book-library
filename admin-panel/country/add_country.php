<?php
require 'connDB.php';

$iso = $_POST['iso'];
$name = $_POST['name'];
$nicename = $_POST['nicename'];
$iso3 = $_POST['iso3'];
$numcode = $_POST['numcode'];
$phonecode = $_POST['phonecode'];

$sql = "INSERT INTO countries (iso, name, nicename, iso3, numcode, phonecode) VALUES ('$iso', '$name', '$nicename', '$iso3', '$numcode', '$phonecode')";
if (mysqli_query($connection, $sql)) {
    echo "Country added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>
