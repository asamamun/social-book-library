<?php
// Check if the category ID is set in the request
if (isset($_POST['category_id'])) {
    $categoryId = $_POST['category_id'];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "publiclibrary";
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Retrieve subcategories based on the selected category
    $stmt = $db->prepare("SELECT * FROM subcategories WHERE category_id = :categoryId");
    $stmt->bindParam(':categoryId', $categoryId);
    $stmt->execute();

    // Generate the options for subcategories
    $options = '<option value="">Select Subcategory</option>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $options .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }

    // Send the options as the Ajax response
    echo $options;
}
?>
