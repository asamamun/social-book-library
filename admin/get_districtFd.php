<?php
require 'connDB.php';

// Get district ID from AJAX request
$districtId = $_POST['districtId'];

// Fetch district details from database
$sql = "SELECT * FROM district WHERE distid = $districtId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo json_encode($row);
} else {
  echo json_encode(null);
}

$conn->close();
?>
