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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
    
<body>
    
<!-- get product details starts -->

<div class="container my-4 ">





     
     
           

<u><h1 class="text-center">Order Details</h1></u> 

<br>

<table class="table table-striped table-bordered">

<tr class="thead-dark">
<th>Product Name</th>
<th>Description</th>
<th>Price/Qty</th>
<th>Quantity</th>
<th></th>

</tr>

<?php 

include '../dbconnection.php';

$order_id=$_GET["id"];

$fetch_cust_id = "SELECT * from `orders` WHERE order_id=$order_id";

$fetch_order_details_query="SELECT * from `order_details` WHERE order_id=$order_id";


$result=mysqli_query($conn,$fetch_order_details_query);
$result2=mysqli_query($conn,$fetch_cust_id);
$row2 = $result2->fetch_assoc();
$cust_id=$row2["cust_id"];

if(mysqli_num_rows($result)>0)
{

    while($row = $result->fetch_assoc()) {
//<td><a href='www.google.com'>". $row["cust_name"] ."</a></td>

        $fetch_product_details="SELECT * FROM `products` WHERE `prod_id`=".$row["prod_id"];
        $res1=mysqli_query($conn,$fetch_product_details);
        $row1 = $res1->fetch_assoc();
        echo "<tr>
        <td>". $row1["prod_name"] ."</td>
        <td>". $row1["prod_description"] ."</td>
        <td>". $row1["prod_price"] ."</td>

        <td>". $row["quantity"] ."</td>


        <td> <a href='http://localhost/DBMS_PRO/PROJECT/BE/ORDERS/returnItem.php?order_id=".$row["order_id"]."&prod_id=".$row["prod_id"]."&order_quantity=".$row["quantity"]."&quantity=".$row1["prod_availability"]."'><i class='fa fa-undo' aria-hidden='true'></i></span>
        <span><strong>Return</strong></span></a></td>
        </tr>";
      }
}

?>

<!--  get product details ends-->
</table>
<br>
<br>
<hr>
<br>
<u><h1 class="text-center">Returns</h1></u> 

<br>

<table class="table table-striped table-bordered">
<tr class="thead-dark">
<th>Product Name</th>
<th>Description</th>
<th>Price/Qty</th>
<th>Quantity</th>
</tr>


<?php 

$fetch_return_order_details_query="SELECT * from `return_details` WHERE order_id=$order_id";

$result=mysqli_query($conn,$fetch_return_order_details_query);

if(mysqli_num_rows($result)>0)
{

    while($row = $result->fetch_assoc()) {
        $fetch_product_details="SELECT * FROM `products` WHERE `prod_id`=".$row["prod_id"];
        $res1=mysqli_query($conn,$fetch_product_details);
        $row1 = $res1->fetch_assoc();
        echo "<tr>
        <td>". $row1["prod_name"] ."</td>
        <td>". $row1["prod_description"] ."</td>
        <td>". $row1["prod_price"] ."</td>
        <td>". $row["quantity"] ."</td>
        </tr>";
      }
}

?>
</table>

<button type="button" class="btn btn-primary"><a href='http://localhost/DBMS_PRO/PROJECT/BE/ORDERS/orderHistory.php?id=<?php echo $cust_id;?>' style="color: white;"><i class="fa fa-arrow-left" aria-hidden="true"></i> <strong>Back</strong></a>
            
            </button>

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

