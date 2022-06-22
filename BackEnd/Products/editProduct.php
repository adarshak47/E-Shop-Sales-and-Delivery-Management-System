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
        <link rel="stylesheet" href="style1.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Acme&family=Cabin:ital,wght@1,600&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Cabin:ital,wght@1,600&display=swap" rel="stylesheet">
</head>
    
<body>
    
<!-- get product details starts -->
<img class="bg" src="img2.jpg" alt="Grocery shoping">

<?php 

include '../dbconnection.php';


//if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
     
    
    // $namee="'".$_POST["product_name"]."'";
    // $descriptione="'".$_POST["description"]."'";

    $id=$_GET["id"];


//$fetch_product_details_sql="SELECT * from `products` WHERE `prod_name`=$namee AND `prod_description`=$descriptione";

$fetch_product_details_sql="SELECT * from `products` WHERE `prod_id`=$id";


$result=mysqli_query($conn,$fetch_product_details_sql);

$num = mysqli_num_rows($result); 


if($num == 1)
{

   
    $prouct_details=mysqli_fetch_assoc($result);

        $id=$prouct_details["prod_id"];
        $name=$prouct_details["prod_name"];
        $category=$prouct_details["prod_category"];
        $price=$prouct_details["prod_price"];
        $description=$prouct_details["prod_description"];
        $stock=$prouct_details["prod_availability"];
        //echo $id;
}




//}

?>

<!--  get product details ends-->


<div class="container my-4 ">
    
    <h1 class="text-center">Edit Product Details</h1> 
    <form action="../../BE/PRODUCTS/updateProduct.php" method="post">
    
        <div class="form-group"> 
            <label for="product_name">Name</label> 
        <input type="text" class="form-control" id="product_name"
            name="product_name" aria-describedby="emailHelp"  required disabled     value=<?php echo $name; ?>>
<!-- value=<?php echo $name; ?> -->
            <!-- product id field -->

            <input type="text" class="form-control" id="product_id"
            name="product_id" aria-describedby="emailHelp" value= <?php echo $id; ?> hidden
            >   
              <!--value=<?php echo $id; ?>   -->
            
            <!-- product id field -->

        </div>

        <!-- <div class="form-group"> 
            <label for="category">Category</label><br>
            <select class="form-control" name="category" id="category">
                <option value="Fruits">Fruits</option>
                <option value="Vegtables">Vegtables</option>
                <option value="dairyProducts">Dairy Products</option>
                <option value="Staples">Staples</option>
            </select>
        </div> -->
       

        <div class="form-group"> 
            <label for="description">Description</label><br>
           <textarea type="textarea" class="form-control" name="description" id="description"   >
            <?php echo $description; ?>
               </textarea>
        </div>

        <!-- <?php echo $description; ?>   -->

        <div class="form-group"> 
            <label for="price">Price</label> 
             <input type="number" class="form-control" id="price" 
            name="price" aria-describedby="emailHelp"
            value=<?php echo $price; ?>
            required>    
        </div>

       <!-- value=<?php echo $price; ?> -->

        <div class="form-group"> 
            <label for="stock">Stock</label> 
        <input type="text" class="form-control" id="stock"
            name="stock" aria-describedby="emailHelp" value=<?php echo $stock; ?> required 
            
            >    
        </div>

        <!-- value=<?php echo $stock; ?> -->
        
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

