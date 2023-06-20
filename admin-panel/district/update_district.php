<?php
require 'connDB.php';

// Get form data
$editDistrictId = $_POST['editDistrictId'];
$editDistName = $_POST['editDistName'];
$editDistDesc = $_POST['editDistDesc'];
$editDivisionId = $_POST['editDivisionId'];

// Update district in the database
$sql = "UPDATE district SET distname = '$editDistName', distdesc = '$editDistDesc', divid = $editDivisionId WHERE distid = $editDistrictId";
if ($conn->query($sql) === TRUE) {
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false]);
}

$conn->close();
?>
