
<?php
include '../dbconnection.php';      
// $showAlert = false; 
// $showError = false; 
// $exists=false;

   $id=$_GET["id"];

   $sql = "Select * from products where prod_id='$id'";
    
   $result = mysqli_query($conn, $sql);
   
   $num = mysqli_num_rows($result); 
   if($num >0)
   {
        $delete_product_query="UPDATE products SET `prod_availability`='Out Of Stock' WHERE prod_id='$id'";
        $result = mysqli_query($conn, $delete_product_query);

        echo "Product removed successfully";

        header("Location: http://localhost/DBMS_PRO/PROJECT/BE/PRODUCTS/product.php");

       
   }


/*
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
     
    
    $name=$_POST["product_name"];
            
    

    $sql = "Select * from products where prod_name='$name'";
    
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
    
    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
    if($num > 0) 
    {
        $delete_product_query="UPDATE products SET `prod_availability`='Out Of Stock' WHERE prod_name='$name'";
        $result = mysqli_query($conn, $delete_product_query);
    
        echo "Product removed successfully";

        header("Location: http://localhost/DBMS_PRO/PROJECT/FE/adminInterface.html");
    }// end if 
    

    else
    {
        echo "Product does not exist";
    }

    
}//end if   
    */


?>

