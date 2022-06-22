<?php
include '../dbconnection.php';      
// $showAlert = false; 
// $showError = false; 
// $exists=false;

if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
     
    
    $name=$_POST["employee_name"];
    $dob=$_POST["birthday"];
    $doj=$_POST["join_date"];
    $gender=$_POST["gender"];
    $address=$_POST["address"];
    $contact=$_POST["contact"];
    $salary = $_POST["salary"]; 
    


    $add_employee_query="INSERT INTO `employees`(`emp_name`,`emp_gender`,`emp_dob`,`emp_phno`,`emp_address`,`emp_join_date`,`emp_salary`)
    VALUES ('$name','$gender','$dob','$contact','$address','$doj','$salary')";



    $result = mysqli_query($conn, $add_employee_query);
    


    echo'<script>alert("Employee Added Successfully")</script>';
    header("Location: http://localhost/DBMS_PRO/PROJECT/BE/EMPLOYEES/employee.php");


    
}
    
?>

