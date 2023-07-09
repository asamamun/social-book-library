<?php
require 'connDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $areaid = $_POST['areaid'];
    $areaname = $_POST['areaname'];
    $areadesc = $_POST['areadesc'];
    $division = $_POST['division'];
    $district = $_POST['district'];

    // Update the area record in the database
    $query = "UPDATE area SET areaname = '$areaname', areadesc = '$areadesc', divid = $division, distid = $district WHERE areaid = $areaid";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Data updated successfully
        echo json_encode(array('success' => true));
    } else {
        // Failed to update data
        echo json_encode(array('success' => false));
    }
}
?>
