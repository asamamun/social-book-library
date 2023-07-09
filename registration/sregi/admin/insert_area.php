<?php
require 'connDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $areaname = $_POST['areaname'];
    $areadesc = $_POST['areadesc'];
    $division = $_POST['division'];
    $district = $_POST['district'];

    // Insert the data into the area table
    $query = "INSERT INTO area (areaname, areadesc, divid, distid) VALUES ('$areaname', '$areadesc', $division, $district)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Data inserted successfully
        echo "Data inserted successfully!";
    } else {
        // Failed to insert data
        echo "Error: " . mysqli_error($conn);
    }
}
?>
