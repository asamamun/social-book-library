<?php
require '../../DB/db.php';
// require './upload.php'; 
// echo "hello";
// parse_str($_POST, $output);
// var_dump($_POST);
// exit;
if(isset($_POST['name'])){

    $name =$_POST['name'];
    $description =$_POST['description'];
    $price =$_POST['price'];
    $sellprice =$_POST['sellprice'];
    $categoryId =$_POST['categoryId'];
    $subcategoryId =$_POST['subcategoryId'];
    $Writer =$_POST['Writer'];
    $publisher =$_POST['publisher'];
    $edition =$_POST['edition'];
    $user =$_POST['user'];
    $location =$_POST['location'];
    
    $sql ="INSERT INTO `books` (name,description,price,sellprice,user_id ,category_id ,subcategory_id ,writer_id ,publisher_id ,edition,location) VALUES ('$name','$description','$price','$sellprice','$user','$categoryId','$subcategoryId','$Writer','$publisher','$edition','$location') ";
    
    // $sql ="INSERT INTO books (name,description,price,sellprice,user_id ,category_id ,subcategory_id ,writer_id ,publisher_id ,edition,location) VALUES ('$name','$description','$price','$sellprice','','$categoryId','$subcategoryId','$Writer','$publisher','$edition','$location') ";
     
    $result =mysqli_query($conn,$sql);
    echo "added succesfuly";
    // echo $sql;
    mysqli_close($conn);
}