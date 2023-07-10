<?php
require 'connDB.php';

// Fetch profiles from the profile table
$query = "SELECT * FROM profiles";
$result = $conn->query($query);

$profiles = '';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $profiles .= '<div class="card mb-3">';
        $profiles .= '  <div class="card-header">' . $row['user_id'] . '</div>';
        $profiles .= '  <div class="card-body">';
        $profiles .= '    <img src="uploads/' . $row['image'] . '" alt="Profile Image" class="img-fluid mb-3">';
        $profiles .= '    <p><strong>Division:</strong> ' . $row['division_id'] . '</p>';
        $profiles .= '    <p><strong>District:</strong> ' . $row['district_id'] . '</p>';
        $profiles .= '    <p><strong>Area:</strong> ' . $row['area_id'] . '</p>';
        $profiles .= '    <p><strong>Address:</strong> ' . $row['address'] . '</p>';
        $profiles .= '    <p><strong>Phone:</strong> ' . $row['phone'] . '</p>';
        $profiles .= '    <p><strong>Bio:</strong> ' . $row['bio'] . '</p>';
        $profiles .= '    <p><strong>Excerpt:</strong> ' . $row['excerpt'] . '</p>';
        $profiles .= '    <p><strong>Date of Birth:</strong> ' . $row['dob'] . '</p>';
        $profiles .= '  </div>';
        $profiles .= '</div>';
    }
}

// Close the database connection
$conn->close();

// Return the profile cards
echo $profiles;
?>

?>