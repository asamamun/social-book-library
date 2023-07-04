<?php
// require '../../DB/db.php'; 

// $sql = "SELECT * FROM writers"; 
// $result = mysqli_query($conn, $sql);

// $options = '';
// while ($row = mysqli_fetch_assoc($result)) {
//     $WriterId = $row['id'];
//     $WriterName = $row['name'];

//     $writer .= "<option value='$WriterId'>$WriterName</option>";
// }

// mysqli_close($conn);

// echo $writer;
?>

<?php
require '../../DB/db.php';

// Retrieve divisions from the database
$query = "SELECT * FROM writers";
$result = mysqli_query($conn, $query);

if ($result) {
    $writers = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $writers[] = $row;
    }

    echo json_encode(array('success' => true, 'writers' => $writers));
} else {
    echo json_encode(array('success' => false));
}
?>


