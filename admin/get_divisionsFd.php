<?php
require 'connDB.php';

// Fetch divisions from database
$sql = "SELECT * FROM division";
$result = $conn->query($sql);

$response = ['success' => false, 'divisions' => []];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $response['divisions'][] = $row;
  }
  $response['success'] = true;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
