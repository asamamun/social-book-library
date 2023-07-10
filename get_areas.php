<?php
require 'connDB.php';

// Retrieve areas based on the selected district
$districtId = $_POST['districtId'];

$query = "SELECT * FROM area WHERE distid = $districtId";
$result = $conn->query($query);

$options = '<option value="">Select Area</option>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['areaid'] . '">' . $row['areaname'] . '</option>';
    }
}

// Close the database connection
$conn->close();

// Return the area options
echo $options;
?>
