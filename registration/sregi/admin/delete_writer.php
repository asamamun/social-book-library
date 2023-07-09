<?php
require 'connDB.php';

$writerId = $_POST['writerId'];

$sql = "DELETE FROM writers WHERE id = '$writerId'";

if (mysqli_query($conn, $sql)) {
    echo "Writer deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
