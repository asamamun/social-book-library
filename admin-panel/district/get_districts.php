<?php
require 'connDB.php';

// Fetch districts from database
$sql = "SELECT district.*, division.divname FROM district INNER JOIN division ON district.divid = division.divid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '<table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Division</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>';

  while ($row = $result->fetch_assoc()) {
    echo '<tr>
            <td>' . $row['distid'] . '</td>
            <td>' . $row['distname'] . '</td>
            <td>' . $row['distdesc'] . '</td>
            <td>' . $row['divname'] . '</td>
            <td>
              <button class="btn btn-primary" onclick="editDistrict(' . $row['distid'] . ')">Edit</button>
              <button class="btn btn-danger" onclick="deleteDistrict(' . $row['distid'] . ')">Delete</button>
            </td>
          </tr>';
  }

  echo '</tbody>
        </table>';
} else {
  echo '<p>No districts found.</p>';
}

$conn->close();
?>
