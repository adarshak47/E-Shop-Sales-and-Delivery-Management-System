<?php
include '../dbconnection.php'; 

if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
     
    
    $reg_no=$_POST["vehicle_no"];
    $vehicle_name=$_POST["vehicle_name"];

    //echo $reg_no;
    //echo $emp_ids;

    //if part to check if product already exitst

    $vehicle_insert_query="INSERT INTO `vehicles` (`vehicle_reg_no`,`vehicle_name`) VALUES('$reg_no','$vehicle_name')";

    $result = mysqli_query($conn, $vehicle_insert_query);

   
   // print($vehicle_insert_query);
    //check if insertion was successful and then proceed

    echo'<script>alert("Vehicle Added Successfully")</script>';

    header("Location: http://localhost/DBMS_PRO/PROJECT/BE/VEHICLES/vehicle.php");

   
}

?>