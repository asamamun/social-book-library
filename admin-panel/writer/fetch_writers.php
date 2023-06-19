<?php
require 'connDB.php';

$sql = "SELECT writers.id, writers.name, writers.bio, countries.name AS country_name, writers.image FROM writers INNER JOIN countries ON writers.country_id = countries.id";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['bio'] . "</td>";
        echo "<td>" . $row['country_name'] . "</td>";
        echo "<td><img src='" . $row['image'] . "' width='100'></td>";
        echo "<td>
                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editWriterModal' data-writerid='" . $row['id'] . "'>Edit</button>
                <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteWriterModal' data-writerid='" . $row['id'] . "'>Delete</button>
            </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No writers found</td></tr>";
}

mysqli_close($connection);
?>
