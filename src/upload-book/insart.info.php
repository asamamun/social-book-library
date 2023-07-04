<?php
require '../../DB/db.php';
// require './upload.php'; 
if(isset($_POST['submit'])){

    $name =$_POST['name'];
    $description =$_POST['description'];
    $price =$_POST['price'];
    $sellprice =$_POST['sellprice'];
    $categoryId =$_POST['categoryId'];
    $subcategoryId =$_POST['subcategoryId'];
    $Writer =$_POST['Writer'];
    $publisher =$_POST['publisher'];
    $edition =$_POST['edition'];
    $location =$_POST['location'];
    
    $sql ="INSERT INTO `books` (name,description,price,sellprice,user_id ,category_id ,subcategory_id ,writer_id ,publisher_id ,edition,location) VALUES ('$name','$description','$price','$sellprice','','$categoryId','$subcategoryId','$Writer','$publisher','$edition','$location') ";
    
    // $sql ="INSERT INTO books (name,description,price,sellprice,user_id ,category_id ,subcategory_id ,writer_id ,publisher_id ,edition,location) VALUES ('$name','$description','$price','$sellprice','','$categoryId','$subcategoryId','$Writer','$publisher','$edition','$location') ";
    
    $result =mysqli_query($conn,$sql);
    echo "added succesfuly";
    mysqli_close($conn);
}