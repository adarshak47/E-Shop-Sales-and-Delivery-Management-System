<!doctype html>
    
<html lang="en">
  
<head>
    
    <!-- Required meta tags --> 
    <meta charset="utf-8"> 
    <meta name="viewport" content=
        "width=device-width, initial-scale=1, 
        shrink-to-fit=no">
    
    <!-- Bootstrap CSS --> 
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity=
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">  
</head>
    
<body>
    
<!-- get product details starts -->

<?php 

include '../dbconnection.php';


//if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
     
    
    // $namee="'".$_POST["product_name"]."'";
    // $descriptione="'".$_POST["description"]."'";

    $id=$_GET["id"];


//$fetch_product_details_sql="SELECT * from `products` WHERE `prod_name`=$namee AND `prod_description`=$descriptione";

$fetch_orders_details_sql="SELECT * from `orders` WHERE `order_id`=$id";


$result=mysqli_query($conn,$fetch_orders_details_sql);

$num = mysqli_num_rows($result); 


if($num == 1)
{

   
    $prouct_details=mysqli_fetch_assoc($result);

        $order_id=$prouct_details["order_id"];
        $cust_id=$prouct_details["cust_id"];
        $order_date=$prouct_details["order_date"];
        $bill_amount=$prouct_details["bill_amount"];
        $delivery_status=$prouct_details["delivery_status"];
        $emp_id=$prouct_details["emp_id"];
        //echo $id;
}





//}

?>

<!--  get product details ends-->


<div class="container my-4 ">
    
    <h1 class="text-center">Order Details</h1> 
    <form action="../../BE/ORDERS/updateOrder.php?order_id=<?php echo $order_id;?>" method="post">
    
        <div class="form-group"> 
            <label for="order_id">Order Number</label> 
        <input type="text" class="form-control" id="order_id"
            name="order_id" aria-describedby="emailHelp"  required disabled     value=<?php echo $order_id; ?>>
            </div>
<!-- value=<?php echo $name; ?> -->
            <!-- product id field -->

            <div class="form-group"> 
            <label for="customer_id">Customer ID</label> 
        <input type="text" class="form-control" id="customer_id"
            name="customer_id" aria-describedby="emailHelp"  required disabled     value=<?php echo $cust_id; ?>>
            </div>

            <div class="form-group"> 
            <label for="order_date">Order Date</label> 
        <input type="date" class="form-control" id="order_date"
            name="order_date" aria-describedby="emailHelp"  required disabled     value=<?php echo $order_date; ?>>
            </div>


            <div class="form-group"> 
            <label for="bill_amount">Bill Amount</label> 
        <input type="number" class="form-control" id="bill_amount"
            name="bill_amount" aria-describedby="emailHelp"  required disabled     value=<?php echo $bill_amount; ?>>
            </div>


        



            <div class="form-group"> 
            <label for="delivery_status">Status</label><br>
            <select class="form-control" name="delivery_status" id="delivery_status">
                <option value="In Process">In Process</option>
                <option value="Not Delivered">Not Delivered</option>
                <option value="Delivered">Delivered</option>
                <option selected>-- Select Status --</option>
            </select>
        </div>
          
            
            <!-- <label for="emp_id">Employee ID</label> 
        <input type="number" class="form-control" id="emp_id"
            name="emp_id" aria-describedby="emailHelp"  required    value=<?php echo $emp_id; ?>>

           -->
           <div class="form-group"> 
           <label for="employee_id">Employee</label><br>
           <select class="form-control" name="employee_id" id="employee_id" >
               <option selected>-- Select Employee --</option>
               
<!-- php code for employee dropdown starts -->
               <?php
               $fetch_employee_id="SELECT * FROM `employees`";
               $res1=mysqli_query($conn,$fetch_employee_id);
               
               
               if(mysqli_num_rows($res1)>0)
               {
               
                   while($row = $res1->fetch_assoc()) {
                       echo "<option value=".$row['emp_id'].">".$row['emp_name']."</option>";
                       
                   }
               }
               ?>
               <!-- php code for employee dropdown ends -->
            </select>
        </div>

       
        
        <button type="submit" class="btn btn-primary">
        Save
        </button>
            <button type="reset" class="btn btn-primary">Reset
            </button> 
            
    </form> 
</div>
    
<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
<script src="
https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="
sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous">
</script>
    
<script src="
https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity=
"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous">
</script>
    
<script src="
https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" 
    integrity=
"sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous">
</script> 
</body> 
</html>

