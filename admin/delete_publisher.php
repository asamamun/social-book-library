<?php
require 'connDB.php';

$publisherId = $_POST['publisherId'];

$sql = "DELETE FROM publishers WHERE id='$publisherId'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Publisher deleted successfully";
} else {
    echo "Error deleting publisher: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
