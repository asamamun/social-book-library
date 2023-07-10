<?php
require 'connDB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user ID from session variable
    session_start();
    $userId = $_SESSION['user_id'];

    // Retrieve other form inputs
    $divisionId = $_POST['division'];
    $districtId = $_POST['district'];
    $areaId = $_POST['area'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $bio = $_POST['bio'];
    $excerpt = $_POST['excerpt'];
    $dob = $_POST['dob'];

    // Process uploaded image
    $image = $_FILES['image']['name'];
    $imagePath = 'uploads/' . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

    // Prepare query to insert/update profile information
    // Modify this query based on your database schema
    $query = "REPLACE INTO profiles (user_id, image, division_id, district_id, area_id, address, phone, bio, excerpt, dob) VALUES ('$userId', '$imagePath', '$divisionId', '$districtId', '$areaId', '$address', '$phone', '$bio', '$excerpt', '$dob')";

    if (mysqli_query($conn, $query)) {
        // Handle success response
        echo "Profile saved successfully.";
    } else {
        // Handle error response
        echo "Error saving profile: " . mysqli_error($conn);
    }
}
?>
