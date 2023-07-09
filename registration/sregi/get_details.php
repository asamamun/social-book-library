<?php 
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "publiclibrary";

// Retrieve the selected item from the AJAX request
$selectedItem = $_POST['selectedItem'];

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Perform the database query to get details for the selected item
$sql = "SELECT * FROM books WHERE name = '$selectedItem'";
$result = $conn->query($sql); 

// $stmt = $conn->prepare("SELECT books.*, images.image 
//                        FROM books 
//                        JOIN images ON books.id = images.book_id where books.category_id = '$cat_id' ORDER BY books.id DESC");
//                 $stmt->execute();
//                 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
// Process the query result and display the details
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  // Display the details of the selected item
  echo '
  <div class="card my-4">
  <div class="card-container">
      <img src="' . $row['image'] . '" class="book-cover" alt="Book Cover">
      <div class="card-body">
          <h5 class="card-title">' . $row['name'] . '</h5>
          <p class="card-text">Location: ' . $row['location'] . '</p>
          <p class="card-text">Price: ' . $row['price'] . ' Tk</p>
          <p class="card-text">Selling Price: ' . $row['sellprice'] . ' Tk</p>
          <p class="card-text">Time: ' . $row['created_at'] . '</p>
          <div class="text-end">
          <a href="view_book.php?book_id=' . $row['id'] . '" class="btn btn-primary">View</a>
          </div>
      </div>
  </div>
  
</div>';  
  // Add more fields as needed
} else {
  echo "No details found for $selectedItem.";
}
                // }

// Close the database connection
$conn->close();
?>