<?php
require 'connDB.php';

$sql = "SELECT id, name FROM countries";
$result = mysqli_query($conn, $sql);

$options = "<option value=''>Select Country</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}

mysqli_close($conn);

echo $options;
?>
