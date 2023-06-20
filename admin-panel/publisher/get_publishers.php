<?php
require 'connDB.php';

$sql = "SELECT * FROM publishers";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>";
        echo "<button class='btn btn-primary edit-publisher' data-id='" . $row['id'] . "' data-name='" . $row['name'] . "' data-address='" . $row['address'] . "' data-phone='" . $row['phone'] . "'>Edit</button>";
        echo "<button class='btn btn-danger delete-publisher' data-id='" . $row['id'] . "'>Delete</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No publishers found</td></tr>";
}

mysqli_close($conn);
?>
