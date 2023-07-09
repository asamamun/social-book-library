<?php
// Establish database connection
require 'connDB.php';

// Retrieve categories from the database
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);

// Generate HTML for category table rows
$html = '';
while ($row = mysqli_fetch_assoc($result)) {
    $categoryId = $row['id'];
    $categoryName = $row['name'];
    $categoryDescription = $row['description'];
    $categoryImage = $row['image'];

    $html .= "<tr>";
    $html .= "<td>$categoryName</td>";
    $html .= "<td>$categoryDescription</td>";
    $html .= "<td><img src='$categoryImage' height='50'></td>";
    $html .= "<td>";
    $html .= "<button class='btn btn-primary edit-category' data-id='$categoryId' data-name='$categoryName' data-description='$categoryDescription'>Edit</button> ";
    $html .= "<button class='btn btn-danger delete-category' data-id='$categoryId'>Delete</button>";
    $html .= "</td>";
    $html .= "</tr>";
}

// Send the generated HTML as the response
echo $html;

// Close database connection
mysqli_close($conn);
?>
