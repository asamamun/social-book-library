<?php
require '../../DB/db.php';
// $conn =new mysqli("localhost","root","","publiclibrary");

$sql = "SELECT * FROM writers";
// $result = mysqli_query($connection, $sql);
$result = mysqli_query($conn, $sql);

$options = '';
while ($row = mysqli_fetch_assoc($result)) {
    $WriterId = $row['id'];
    $WriterName = $row['name'];

    $writer .= "<option value='$WriterId'>$WriterName</option>";
}

mysqli_close($conn);

echo $writer;
?>
