<?php

include 'dbconnection.php'; 


$username = $_POST["username"]; 
$password = $_POST["password"]; 



$loginQuery="select * from customer_login  where username='$username' and password='$password'";

$result = mysqli_query($conn, $loginQuery);
    
$num = mysqli_num_rows($result); 


if($num == 1)
{
    print("Login successful");
  
   

}
else
{
    print("Login unsuccessful");
}


?>