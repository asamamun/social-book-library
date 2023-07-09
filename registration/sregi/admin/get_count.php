 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "publiclibrary";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$q = "select count(*) as total from books where 1";
$r = $conn->query($q);
$totalbooks = $r->fetch_assoc();
$q = "select count(*) as total from writers where 1";
$r = $conn->query($q);
$totalwriters = $r->fetch_assoc();
$q = "select count(*) as total from users where 1";
$r = $conn->query($q);
$totalUsers = $r->fetch_assoc();
$q = "select count(*) as total from publishers where 1";
$r = $conn->query($q);
$totalpublishers = $r->fetch_assoc();
$arr = [
'books'=>$totalbooks['total'],
'writers'=>$totalwriters['total'],
'users'=>$totalUsers['total'],
'publishers'=>$totalpublishers['total'],
]; 
?>
