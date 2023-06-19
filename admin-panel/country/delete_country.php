<?php
require 'connDB.php';

$countryId = $_POST['countryId'];

$sql = "DELETE FROM countries WHERE id='$countryId'";
if (mysqli_query($connection, $sql)) {
    // echo "Country deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>
