<?php
require 'connDB.php';

$sql = "SELECT * FROM subcategories";
$result = mysqli_query($conn, $sql);

$rows = '';
while ($row = mysqli_fetch_assoc($result)) {
    $subcategoryId = $row['id'];
    $subcategoryName = $row['name'];
    $subcategoryDescription = $row['description'];
    $subcategoryImage = $row['image'];

    $rows .= "<tr>
                    <td>$subcategoryName</td>
                    <td>$subcategoryDescription</td>
                    <td><img src='$subcategoryImage' height='50'></td>
                    <td>
                        <button class='btn btn-primary edit-subcategory' data-id='$subcategoryId' data-name='$subcategoryName' data-description='$subcategoryDescription'>Edit</button>
                        <button class='btn btn-danger delete-subcategory' data-id='$subcategoryId'>Delete</button>
                    </td>
                </tr>";
}

mysqli_close($conn);

echo $rows;
?>
