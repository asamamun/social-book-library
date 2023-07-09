<?php
require 'connDB.php';

$countryId = $_POST['countryId'];

$sql = "DELETE FROM countries WHERE id='$countryId'";
if (mysqli_query($conn, $sql)) {
    // echo "Country deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
