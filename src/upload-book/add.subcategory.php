<?php
// require '../../DB/db.php'; 

// $sql = "SELECT * FROM subcategories"; 
// $result = mysqli_query($conn, $sql);

// $options = '';
// while ($row = mysqli_fetch_assoc($result)) {
//     $subcategoryId = $row['id'];
//     $subcategoryName = $row['name'];

//     $options .= "<option value='$subcategoryId'>$subcategoryName</option>";
// }

// mysqli_close($conn);

// echo $options;
?>

<?php
require '../../DB/db.php';

// Retrieve divisions from the database
$query = "SELECT * FROM subcategories";
$result = mysqli_query($conn, $query);

if ($result) {
    $subcategories = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $subcategories[] = $row;
    }

    echo json_encode(array('success' => true, 'subcategories' => $subcategories));
} else {
    echo json_encode(array('success' => false));
}
?>

