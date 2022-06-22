<?php

include '../dbconnection.php'; 

$order_id=$_GET["order_id"];
$prod_id=$_GET["prod_id"];
$order_quantity=$_GET["order_quantity"];
$quantity=$_GET["quantity"];



    $insert_into_order_details_query="INSERT INTO `return_details`(`order_id`,`prod_id`,`quantity`) VALUES('$order_id','$prod_id','$order_quantity')";
    $result1=mysqli_query($conn,$insert_into_order_details_query);

    $updated_quantity=$order_quantity+$quantity;
    $update_product_quantity="UPDATE `products` SET prod_availability=$updated_quantity WHERE prod_id=$prod_id" ;
    $result=mysqli_query($conn,$update_product_quantity);

    $prod_price_query="SELECT * FROM `products`WHERE prod_id=$prod_id";
    $result=mysqli_query($conn,$prod_price_query);
    $row = $result->fetch_assoc();
    $price=$row["prod_price"];

    $remove_from_order_details="DELETE FROM `order_details` WHERE order_id=$order_id AND prod_id=$prod_id";
    mysqli_query($conn,$remove_from_order_details);

    $fetch_order="SELECT * FROM `orders` WHERE order_id=$order_id";
    $result=mysqli_query($conn,$fetch_order);
    $row = $result->fetch_assoc();
    $bill_amount=$row["bill_amount"];



    $updated_bill_amount=$bill_amount-$price*$order_quantity;
    $update_bill_amount="UPDATE `orders` SET bill_amount=$updated_bill_amount WHERE order_id=$order_id";
    mysqli_query($conn,$update_bill_amount);

    header("Location: http://localhost/DBMS_PRO/PROJECT/BE/ORDERS/viewOrder.php?id=$order_id");

?>