<?php
// require '../../DB/db.php'; 

// $sql = "SELECT * FROM publishers"; 
// $result = mysqli_query($conn, $sql);

// $options = '';
// while ($row = mysqli_fetch_assoc($result)) {
//     $publisherId = $row['id'];
//     $publisherName = $row['name'];

//     $publisher .= "<option value='$publisherId'>$publisherName</option>";
// }

// mysqli_close($conn);

// echo $publisher;
?>

<?php
require '../../DB/db.php';

// Retrieve divisions from the database
$query = "SELECT * FROM publishers";
$result = mysqli_query($conn, $query);

if ($result) {
    $publishers = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $publishers[] = $row;
    }

    echo json_encode(array('success' => true, 'publishers' => $publishers));
} else {
    echo json_encode(array('success' => false));
}
?>
