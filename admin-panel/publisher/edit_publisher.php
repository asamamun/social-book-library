<?php
require 'connDB.php';

$publisherId = $_POST['publisherId'];
$publisherName = $_POST['publisherName'];
$publisherAddress = $_POST['publisherAddress'];
$publisherPhone = $_POST['publisherPhone'];

$sql = "UPDATE publishers SET name='$publisherName', address='$publisherAddress', phone='$publisherPhone' WHERE id='$publisherId'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Publisher updated successfully";
} else {
    echo "Error updating publisher: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
