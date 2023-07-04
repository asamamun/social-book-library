<?php
require '../../DB/db.php';
// $conn =new mysqli("localhost","root","","publiclibrary");

$sql = "SELECT * FROM publishers";
// $result = mysqli_query($connection, $sql);
$result = mysqli_query($conn, $sql);

$options = '';
while ($row = mysqli_fetch_assoc($result)) {
    $publisherId = $row['id'];
    $publisherName = $row['name'];

    $publisher .= "<option value='$publisherId'>$publisherName</option>";
}

mysqli_close($conn);

echo $publisher;
?>
