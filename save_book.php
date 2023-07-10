<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "publiclibrary";

    // Create a new PDO instance
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Prepare SQL statement to insert the book data
    $stmt = $db->prepare("INSERT INTO books (name, description, price, sellprice, user_id, category_id, subcategory_id, writer_id, publisher_id, edition, location) 
                         VALUES (:name, :description, :price, :sellprice, :user_id, :category_id, :subcategory_id, :writer_id, :publisher_id, :edition, :location)");
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':description', $_POST['description']);
    $stmt->bindParam(':price', $_POST['price']);
    $stmt->bindParam(':sellprice', $_POST['sellprice']);
    $stmt->bindParam(':user_id', $_POST['user_id']);
    $stmt->bindParam(':category_id', $_POST['category_id']);
    $stmt->bindParam(':subcategory_id', $_POST['subcategory_id']);
    $stmt->bindParam(':writer_id', $_POST['writer_id']);
    $stmt->bindParam(':publisher_id', $_POST['publisher_id']);
    $stmt->bindParam(':edition', $_POST['edition']);
    $stmt->bindParam(':location', $_POST['location']);

    // Execute the statement
    $stmt->execute();

    // Get the ID of the last inserted book
    $bookId = $db->lastInsertId();

    // Handle file upload
    $imagePath = 'uploads/' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

    // Prepare SQL statement to insert the image data
    $stmt = $db->prepare("INSERT INTO images (book_id, image) VALUES (:bookId, :path)");
    $stmt->bindParam(':bookId', $bookId);
    $stmt->bindParam(':path', $imagePath);

    // Execute the statement
    $stmt->execute();

    // Close the database connection
    $db = null;

    // Send a success response
    echo 'success';
}
?>
