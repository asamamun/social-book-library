<?php
require 'connDB.php';

// Get district ID from AJAX request
$districtId = $_POST['districtId'];

// Delete district from the database
$sql = "DELETE FROM district WHERE distid = $districtId";
if ($conn->query($sql) === TRUE) {
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false]);
}

$conn->close();
?>
