<?php

include '../dbconnection.php'; 

//product_ids
$product_ids=explode(",",$_GET["product_id"]);


//prduct_quantities
$product_quantities=explode(",",$_GET["product_quantity"]);


//customer id
$cust_id=$_GET["cust_id"];
//$cust_id=id;


//calculate bill amount
$bill_amount=0;

for($i=0;$i<count($product_ids);$i++){

    $get_product_price_query="SELECT * FROM `products` WHERE `prod_id`=".$product_ids[$i];
    
    $result=mysqli_query($conn,$get_product_price_query);
    
    $num = mysqli_num_rows($result); 

    if($num == 1)
        {
            $prouct_details=mysqli_fetch_assoc($result);
            $price=$prouct_details["prod_price"];
            $bill_amount=$bill_amount+($price*$product_quantities[$i]);
        }

        $updated_quantity=$prouct_details["prod_availability"]-$product_quantities[$i];
        echo $updated_quantity;    
        $update_product_quantity="UPDATE `products` SET prod_availability=$updated_quantity WHERE prod_id=".$product_ids[$i];
        mysqli_query($conn,$update_product_quantity);

}

//get current date
$date=date("Y-m-d");

//insert into orders table
 $insert_into_orders_query="INSERT INTO `orders`(`cust_id`,`order_date`,`bill_amount`) VALUES ('$cust_id','$date','$bill_amount')";

 //print($insert_into_orders_query);

 $result=mysqli_query($conn,$insert_into_orders_query);



 // get latest order_id


 $get_latest_order_id="SELECT MAX(order_id) as order_id from orders";
 $result=mysqli_query($conn,$get_latest_order_id);
 $order_details=mysqli_fetch_assoc($result);
 $order_id=$order_details["order_id"];

 
 $insert_into_payments_query="INSERT INTO `payment`(`order_id`,`cust_id`) VALUES ('$order_id','$cust_id')";

 

 $payments=mysqli_query($conn,$insert_into_payments_query);
 print($insert_into_payments_query);

 // insert into order details

 for($i=0;$i<count($product_ids);$i++){

    $insert_into_order_details_query="INSERT INTO `order_details`(`order_id`,`prod_id`,`quantity`) VALUES('$order_id','$product_ids[$i]','$product_quantities[$i]')";
    $result1=mysqli_query($conn,$insert_into_order_details_query);
   //print($insert_into_order_details_query);

   
}



 //$insert_into_order_details_query="INSERT INTO `order_details`(``)";



 header("Location: http://localhost/DBMS_PRO/PROJECT/BE/ORDERS/orderHistory.php?id=$cust_id");

?>