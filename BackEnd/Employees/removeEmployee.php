
<?php

// $showAlert = false; 
// $showError = false; 
// $exists=false;

    include 'dbconnection.php';

    $id=$_GET["id"];
     


    $sql = "SELECT * from employees where emp_id='$id'";
    $date=date("Y-m-d");
    

    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
    
    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
    if($num > 0) 
    {
        $delete_employee_query="UPDATE `employees` SET `emp_leaving_date`='$date' WHERE emp_id='$id'";
        $result = mysqli_query($conn, $delete_employee_query);
        header("Location: http://localhost/DBMS_PRO/PROJECT/BE/EMPLOYEES/employee.php");
        echo $date;
        echo "Employee removed successfully";
    }// end if 
    

    else
    {
        echo "Employee does not exist";
    }

 
    
?>

