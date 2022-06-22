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


     
     
           

<u><h1 class="text-center">Orders</h1></u> 

<br>

<table class="table table-striped table-bordered">

<tr class="thead-dark">
<th>Order Date</th>
<th>Bill Amount</th>
<th>Delivery Status</th>
<th></th>
</tr>

<?php 

include '../dbconnection.php';

$cust_id=$_GET["id"];



$fetch_employees_query="SELECT * from `orders` where `cust_id`='$cust_id'";

$result=mysqli_query($conn,$fetch_employees_query   );
if(mysqli_num_rows($result)>0)
{

    while($row = $result->fetch_assoc()) {
//<td><a href='www.google.com'>". $row["cust_name"] ."</a></td>
        echo "<tr>
        <td>". $row["order_date"] ."</td>
        <td>". $row["bill_amount"] ."</td>
        <td>". $row["delivery_status"] ."</td>
       

    <td> <a href='http://localhost/DBMS_PRO/PROJECT/BE/ORDERS/viewOrder.php?id=".$row["order_id"]."'><span></span><i class='fa fa-eye' aria-hidden='true'></i>
        <span><strong>View</strong></span></a></td>
        </tr>";
      }
}

?>

<!--  get product details ends-->
</table>


<button type="button" class="btn btn-primary"><a href="http://localhost/DBMS_PRO/PROJECT/BE/CUSTOMERS/customer.php?id=<?php echo $cust_id?>" style="color: white;"><i class="fa fa-arrow-left" aria-hidden="true"></i> <strong>Back</strong></a>
            
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

