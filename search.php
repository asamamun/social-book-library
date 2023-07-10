<?php  
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "publiclibrary";

// Retrieve the search query from the AJAX request
$searchQuery = $_POST['query'];

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Perform the database query
$sql = "SELECT name FROM books WHERE name LIKE '%$searchQuery%'";
$result = $conn->query($sql);

// Generate the list of items
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $areaname = $row['areaname'];
    echo "<li>$areaname</li>";
  }
} else {
  echo "<li>No results found.</li>";
}

// Close the database connection
$conn->close();  
?>
 