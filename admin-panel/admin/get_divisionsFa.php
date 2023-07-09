<?php
require 'connDB.php';

// Retrieve divisions from the database
$query = "SELECT * FROM division";
$result = mysqli_query($conn, $query);

if ($result) {
    $divisions = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $divisions[] = $row;
    }

    echo json_encode(array('success' => true, 'divisions' => $divisions));
} else {
    echo json_encode(array('success' => false));
}
?>
