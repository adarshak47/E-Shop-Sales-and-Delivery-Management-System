<!doctype html>
    
<?php
$ids=$_GET["id"];
//echo $ids;
?>

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
<script>

var product_ids=[];
var product_quantities=[];
function my_function(id) {
    
  product_ids.push(id);
  var product_quantity=document.getElementById("quantity_"+id).value;
  product_quantities.push(product_quantity);
  console.log(product_ids); 
  console.log(product_quantities);
  document.getElementById("quantity_"+id).hidden=true;
  document.getElementById('addCartBtn_'+id).hidden=true;
  document.getElementById('removeCartBtn_'+id).hidden=false;
}

function createOrder(){

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
       alert("Order Placed Successfully!!");
      //alert(this.response);
      window.location.href = 'http://localhost/DBMS_PRO/PROJECT/BE/ORDERS/orderHistory.php?id=<?php echo $ids;?>';
     }   
   };
  request.open("GET", "orderProduct.php?product_id="+product_ids+"&product_quantity="+product_quantities+"&cust_id=<?php echo $ids;?>", true);
  request.send();
}
var index;
function removeFromCart(id){
    
    for(var i=0;i<product_ids.length;i++)
    {
        if(product_ids[i]==id)
            index=i;
    }

    if (index > -1) {
  product_ids.splice(index, 1);
  product_quantities.splice(index,1);
  console.log(product_ids);
  console.log(product_quantities);

  document.getElementById("quantity_"+id).hidden=false;
  document.getElementById('addCartBtn_'+id).hidden=false;
  document.getElementById('removeCartBtn_'+id).hidden=true;

}
    
}
</script>
<body>
    
<!-- get product details starts -->

<div class="container my-4 ">

<u><h1 class="text-center">Available Products</h1></u> 

<br>
<!-- <form method="POST"> -->

<input id=cust_id value="" hidden>


<table class="table table-striped table-bordered">
<tr class="thead-dark">
<th>Name</th>
<th>Price</th>
<th>Category</th>
<th>Description</th>
<th></th>
<th></th>
</tr>

<?php 

include '../dbconnection.php';




$fetch_products_query="SELECT * from `products` WHERE prod_availability>0";

$result=mysqli_query($conn,$fetch_products_query   );

if(mysqli_num_rows($result)>0)
{

    while($row = $result->fetch_assoc()) {
//<td><a href='www.google.com'>". $row["cust_name"] ."</a></td>
        echo "<tr>
        <td>". $row["prod_name"] ."</td>
        <td>". $row["prod_price"] ."</td>
        <td>". $row["prod_category"] ."</td>
        <td>". $row["prod_description"] ."</td>
        <td>
        <select id='quantity_".$row["prod_id"]."'>
        <option value='0' selected>Select Quantity</option>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
      </select>
      </td>
      <td>
      <span></span><button class='btn btn-primary' id='addCartBtn_".$row["prod_id"]."' onclick='my_function(".$row["prod_id"].")'><i class='fa fa-cart-plus'></i> Add to cart</button
      <span></span><button class='btn btn-danger' id='removeCartBtn_".$row["prod_id"]."' hidden onclick='removeFromCart(".$row["prod_id"].")'><span class='fa fa-minus-circle' aria-hidden='true'></span>Remove from cart</button>
      </td>
        </tr>";
     
    }
}

?>

<!--  get product details ends-->
</table>

<button type="button" onclick="createOrder()" class="btn btn-primary">Place Order
<i class="fa fa-check" aria-hidden="true"></i>
                 </button>
<!-- </form> -->
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

