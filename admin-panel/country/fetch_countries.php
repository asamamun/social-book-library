<?php
require 'connDB.php';

$sql = "SELECT * FROM countries";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['iso'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['nicename'] . "</td>";
        echo "<td>" . $row['iso3'] . "</td>";
        echo "<td>" . $row['numcode'] . "</td>";
        echo "<td>" . $row['phonecode'] . "</td>";
        echo "<td>
                <button type='button' class='btn btn-primary btn-sm editCountryBtn' data-bs-toggle='modal' data-bs-target='#editCountryModal' data-countryid='" . $row['id'] . "'>Edit</button>
                <button type='button' class='btn btn-danger btn-sm deleteCountryBtn' data-bs-toggle='modal' data-bs-target='#deleteCountryModal' data-countryid='" . $row['id'] . "'>Delete</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No countries found</td></tr>";
}

mysqli_close($connection);
?>
