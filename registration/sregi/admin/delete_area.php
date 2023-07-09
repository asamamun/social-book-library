<?php
require 'connDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $areaid = $_POST['areaid'];

    // Delete the area
    $query = "DELETE FROM area WHERE areaid=$areaid";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Area deleted successfully
        echo "Area deleted successfully!";
    } else {
        // Failed to delete area
        echo "Error: " . mysqli_error($conn);
    }
}
?>
