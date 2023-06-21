<?php
//  // Replace with your actual database credentials
// $host = 'localhost';
// $db = 'publiclibrary';
// $user = 'root';
// $password = '';

// // Create a new MySQLi instance
// $mysqli = new mysqli($host, $user, $password, $db);

// // Check the connection
// if ($mysqli->connect_error) {
//     die('Connection Error: ' . $mysqli->connect_error);
// }

// // Query to count the names
// $sql = "SELECT COUNT(name) AS country FROM countries";

// // Execute the query
// $result = $mysqli->query($sql);

// // Fetch the count value
// $count = $result->fetch_assoc()['country'];

// // Return the count as JSON response
// echo json_encode($count);

// // Close the database connection
// $mysqli->close();
?>
<?php
//   $host = 'localhost';
//   $db = 'publiclibrary';
//   $user = 'root';
//   $password = '';
  
//   // Create a new MySQLi instance
//   $mysqli = new mysqli($host, $user, $password, $db);
  
//   // Check the connection
//   if ($mysqli->connect_error) {
//       die('Connection Error: ' . $mysqli->connect_error);
//   }
  
// // Query to count the names
// $sql = "SELECT COUNT(distname) AS districs FROM district";

// // Execute the query
// $result = $mysqli->query($sql);

// // Fetch the count value
// $count = $result->fetch_assoc()['districs'];

// // Return the count as JSON response
// echo json_encode($districs);

// // Close the database connection
// $mysqli->close();
?> 

<?php
// // Database connection settings
// $hostname = 'localhost';
// $username = 'root';
// $password = '';
// $database = 'publiclibrary';

// // Create connection
// $conn = new mysqli($hostname, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Query to retrieve count
// $sql = "SELECT COUNT(*) AS count FROM district";
// $result = $conn->query($sql);
// $countdistrict = $r->fetch_assoc();
// $sql = "SELECT COUNT(*) AS count FROM division";
// $result = $conn->query($sql);
// $countdivision = $r->fetch_assoc();
// $sql = "SELECT COUNT(*) AS count FROM countries";
// $result = $conn->query($sql);
// $countcountries = $r->fetch_assoc();
// $sql = "SELECT COUNT(*) AS count FROM area";
// $result = $conn->query($sql);
// $countarea = $r->fetch_assoc();
// $sql = "SELECT COUNT(*) AS count FROM publishers";
// $result = $conn->query($sql);
// $countpublishers = $r->fetch_assoc();
// $sql = "SELECT COUNT(*) AS count FROM writers";
// $result = $conn->query($sql);
// $countwriters = $r->fetch_assoc();
// $sql = "SELECT COUNT(*) AS count FROM categories";
// $result = $conn->query($sql);
// $countcategories = $r->fetch_assoc();

// $arr=[
//     'division'=> $countdivision['count'],
//     'countries'=> $countcountries['count'],
//     'area'=> $countarea['count'],
//     'publishers'=> $countpublishers['count'],
//     'writers'=> $countwriters['count'],
//     'categories'=> $countcategories['count'],
//     'district'=> $countdistrict['count']
// ];

// $row= foreach ($arr as $key => $value) {
//      echo $key;
// }
// $conn->close();

// // Return the table counts as JSON
// echo json_encode($tableCounts);

// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();
//     $count = $row["count"];
//     echo  $count;
// } else {
//     echo "No records found";
// }

// // Close connection
// $conn->close();
?>

<?php
// / Database connection settings
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'publiclibrary';

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS count FROM district";
$result = $conn->query($sql); 

// Perform the queries to count elements in different tables
$bookCount =  $r->fetch_assoc();
$userCount = // Perform query to count users
$writerCount = // Perform query to count writers
$publisherCount = // Perform query to count publishers
$last10Posts = // Perform query to fetch last 10 posts
$dailyPostCount = // Perform query to count daily posts

// Prepare the response as an array
$response = [
  'bookCount' => $bookCount,
  'userCount' => $userCount,
  'writerCount' => $writerCount,
  'publisherCount' => $publisherCount,
  'last10PostsHTML' => generateLast10PostsHTML($last10Posts),
  'dailyPosts' => $dailyPostCount
];

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);

// Helper function to generate HTML for last 10 posts
function generateLast10PostsHTML($posts) {
  $html = '<ul>';
  foreach ($posts as $post) {
    $html .= '<li>'.$post['title'].'</li>';
  }
  $html .= '</ul>';
  return $html;
}
?>
