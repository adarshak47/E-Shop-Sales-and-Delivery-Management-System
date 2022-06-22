<?php
include '../dbconnection.php'; 

if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
     
    
    $id=$_POST["employee_id"];
    //$name="'".$_POST["employee_name"]."'";
    //$gender="'".$_POST["employee_gender"]."'";
    $contact="'".$_POST["employee_contact"]."'";
    $address="'".$_POST["employee_address"]."'";
    $salary=$_POST["employee_salary"];
   

   /* echo $id;
    echo " --------";

    echo $name;
    echo " --------";

    echo $gender;
    echo " --------";
    echo $contact;
    echo " --------";
    echo $address;
    echo " --------";
    echo $salary;*/

    //if part to check if product already exitst




    $employee_update_query="UPDATE employees SET emp_phno=$contact ,emp_address=$address, emp_salary=$salary where emp_id=$id ";

    echo $contact,$address,$salary,$id;

    //$product_update_query="UPDATE `products` SET `prod_price`=$price WHERE `prod_id`=$id";
    $result = mysqli_query($conn, $employee_update_query);

    //$num = mysqli_num_rows($result); 

    //echo $num;
    //check if insertion was successful and then proceed

    echo'<script>alert("Employee Updated Successfully")</script>';

    header("Location: http://localhost/DBMS_PRO/PROJECT/BE/EMPLOYEES/employee.php");



   
}

?>