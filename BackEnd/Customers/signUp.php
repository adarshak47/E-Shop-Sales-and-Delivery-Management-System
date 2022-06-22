
<?php
include 'dbconnection.php';      
// $showAlert = false; 
// $showError = false; 
// $exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
     
    
    $name=$_POST["cust_name"];
    $gender=$_POST["gender"];
    $dob=$_POST["birthday"];
    $address=$_POST["address"];
    $contact=$_POST["contact"];
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"];
            
    

    $sql = "Select * from customer_login where username='$username'";
    
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
    
    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
    if($num == 0) {
        if($password == $cpassword) {
    
            //print($sql_customer_login);

            
            
            $sql_customer_data="INSERT INTO `customers` (`cust_name`,`cust_gender`,`cust_dob`,`cust_phno`,`cust_address`) VALUES ('$name','$gender','$dob','$contact','$address')";
            print($sql_customer_data);
            $result_cust_data=mysqli_query($conn,$sql_customer_data);

            $result_cust_id_query="select max(cust_id) from customers";
            $result = mysqli_query($conn, $result_cust_id_query);
           // $obj = mysqli_fetch_object($result);
            while ($row = mysqli_fetch_row($result)) {
                  $cust_id=$row[0];
              }
           

              $sql_customer_login = "INSERT INTO `customer_login` ( `username`, 
              `password`,`cust_id`) VALUES ('$username', 
              '$password','$cust_id')";

            $result = mysqli_query($conn, $sql_customer_login);

            header("Location: http://localhost/DBMS_PRO/PROJECT/FE/loginPage.html");
            exit();
         }
         
         else
         {
            echo'<script>alert("Passwords do not match")
            window.location.href = "http://localhost/DBMS_PRO/PROJECT/FE/signUpPage.html"</script>';

         }
    }// end if 
    
   if($num>0) 
   {
      echo'<script>alert("Username already exists :)")
      window.location.href = "http://localhost/DBMS_PRO/PROJECT/FE/signUpPage.html"</script>';
   } 
    
}//end if   
    
?>

