<?php
// require '../../DB/db.php'; 

// $sql = "SELECT * FROM categories"; 
// $result = mysqli_query($conn, $sql);

// $options = '';
// while ($row = mysqli_fetch_assoc($result)) {
//     $categoryId = $row['id'];
//     $categoryName = $row['name'];

//     $options .= "<option value='$categoryId'>$categoryName</option>";
// }

// mysqli_close($conn);

// echo $options;
?>
<?php
require '../../DB/db.php';

// Retrieve divisions from the database
$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);

if ($result) {
    $divisions = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }

    echo json_encode(array('success' => true, 'categories' => $categories));
} else {
    echo json_encode(array('success' => false));
}
?>