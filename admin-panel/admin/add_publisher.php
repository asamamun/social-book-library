<?php
require 'connDB.php';

$publisherName = $_POST['publisherName'];
$publisherAddress = $_POST['publisherAddress'];
$publisherPhone = $_POST['publisherPhone'];

$sql = "INSERT INTO publishers (name, address, phone) VALUES ('$publisherName', '$publisherAddress', '$publisherPhone')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Publisher added successfully";
} else {
    echo "Error adding publisher: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
