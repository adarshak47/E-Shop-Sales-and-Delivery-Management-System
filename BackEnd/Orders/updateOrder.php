<?php
include '../dbconnection.php'; 

if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
     
    
    $order_id=$_GET["order_id"];
    //$cust_id=$_POST["customer_id"];
   // $date_Of_order=$_POST["order_date"];
    //$bill_amount=$_POST["bill_amount"];
    $status="'".$_POST["delivery_status"]."'";
    $employee_id=$_POST["employee_id"];


   




    $order_update_query="UPDATE `orders` SET `delivery_status`=$status ,`emp_id`=$employee_id  WHERE `order_id`=$order_id";


    //$product_update_query="UPDATE `products` SET `prod_price`=$price WHERE `prod_id`=$id";
    $result = mysqli_query($conn, $order_update_query);
    print($order_update_query);
    echo $status;

    echo $employee_id;

    //echo'<script>alert("Employee Updated Successfully")</script>';

    header("Location: http://localhost/DBMS_PRO/PROJECT/BE/ORDERS/order.php");



   
}

?>