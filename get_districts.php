<?php
require 'connDB.php';

if (isset($_POST['divid'])) {
    $divisionId = $_POST['divid'];

    // Retrieve districts based on the selected division
    $query = "SELECT * FROM district WHERE divid = $divisionId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $districts = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $districts[] = $row;
        }

        echo json_encode(array('success' => true, 'districts' => $districts));
    } else {
        echo json_encode(array('success' => false));
    }
} else {
    echo json_encode(array('success' => false));
}
?>
