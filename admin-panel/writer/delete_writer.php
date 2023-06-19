<?php
require 'connDB.php';

$writerId = $_POST['writerId'];

$sql = "DELETE FROM writers WHERE id = '$writerId'";

if (mysqli_query($connection, $sql)) {
    echo "Writer deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>
