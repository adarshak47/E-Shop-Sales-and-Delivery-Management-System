<?php
include '../dbconnection.php'; 

if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
     
    
    $name=$_POST["product_name"];
    $category=$_POST["category"];
    $price=$_POST["price"];
    $description=$_POST["description"];
    $stock=$_POST["stock"];

    //if part to check if product already exitst

    $product_insert_query="INSERT into `products` (`prod_name`,`prod_price`,`prod_availability`,`prod_category`,`prod_description`) VALUES('$name','$price','$stock','$category','$description')";

    $result = mysqli_query($conn, $product_insert_query);

    //check if insertion was successful and then proceed

    echo'<script>alert("Product Added Successfully")</script>';

    header("Location: http://localhost/DBMS_PRO/PROJECT/BE/PRODUCTS/product.php");

   
}

?>