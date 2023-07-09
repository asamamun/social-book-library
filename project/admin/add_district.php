<?php
require 'connDB.php';

// Get form data
$distName = $_POST['distName'];
$distDesc = $_POST['distDesc'];
$divisionId = $_POST['divisionId'];

// Insert district into database
$sql = "INSERT INTO district (distname, distdesc, divid) VALUES ('$distName', '$distDesc', $divisionId)";
if ($conn->query($sql) === TRUE) {
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false]);
}

$conn->close();
?>
