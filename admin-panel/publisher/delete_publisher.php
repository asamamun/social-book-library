<?php
require 'connDB.php';

$publisherId = $_POST['publisherId'];

$sql = "DELETE FROM publishers WHERE id='$publisherId'";
$result = mysqli_query($connection, $sql);

if ($result) {
    echo "Publisher deleted successfully";
} else {
    echo "Error deleting publisher: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
