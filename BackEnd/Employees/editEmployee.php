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
        <link rel="stylesheet" href="..\PRODUCTS\style1.css"> 
</head>
    
<body>
    
<!-- get product details starts -->

<?php 

include '../dbconnection.php';


$id=$_GET["id"];



$fetch_employee_details_sql="SELECT * from `employees` WHERE `emp_id`=$id";

//$fetch_product_details_sql="SELECT * from `products` WHERE `prod_id`=6";

$result=mysqli_query($conn,$fetch_employee_details_sql);

$num = mysqli_num_rows($result); 


if($num == 1)
{

   
    $employee_details=mysqli_fetch_assoc($result);

        $id=$employee_details["emp_id"];
        $name=$employee_details["emp_name"];
        $gender=$employee_details["emp_gender"];
        $dob=$employee_details["emp_dob"];
        $doj=$employee_details["emp_join_date"];
        $contact=$employee_details["emp_phno"];
        $address=$employee_details["emp_address"];
        $salary=$employee_details["emp_salary"];
        //echo $id;
}






?>

<!--  get product details ends-->
<div class="bg-image3">

    
        
        <h1 class="text-center heading-black">Edit Employee Details</h1> 
        <form action="../../BE/EMPLOYEES/updateEmployee.php" method="post">
    <div class="white-container3">

        <div class="form-group"> 
                <label for="employee_id"></label> 
            <input type="number" class="form-control" id="employee_id"
                name="employee_id" aria-describedby="emailHelp"  required    hidden  value=<?php echo $id; ?>>
        </div>

        
        <div class="form-group"> 
                <label for="employee_name">Name</label> 
            <input type="text" class="form-control" id="employee_name"
                name="employee_name" aria-describedby="emailHelp"  required  disabled   value=<?php echo $name; ?>>

        </div>

        
        
        <div class="form-group"> 
                <label for="employee_gender">Gender</label> 
            <input type="text" class="form-control" id="employee_gender"
                name="employee_gender" aria-describedby="emailHelp"  required disabled     value=<?php echo $gender; ?>>

                </div>


                <div class="form-group"> 
                <label for="birthday">DOB</label><br>
                <input type="date" class="form-control" id="birthday" name="birthday" required disabled   value=<?php echo $dob; ?>>
            </div>



            <div class="form-group"> 
                <label for="join_date">Joining Date</label><br>
                <input type="date" class="form-control" id="join_date" name="join_date" required  disabled   value=<?php echo $doj; ?>>
            </div>

            <div class="form-group"> 
                <label for="employee_contact">Contact</label> 
            <input type="text" class="form-control" id="employee_contact"
                name="employee_contact" aria-describedby="emailHelp"  required      value=<?php echo $contact; ?>>

                </div>

            <div class="form-group"> 
                <label for="employee_address">Address</label> 
            <input type="textarea" class="form-control" id="employee_address"
                name="employee_address" aria-describedby="emailHelp"  required     value=<?php echo $address; ?>>

                </div>


                <div class="form-group"> 
                <label for="employee_salary">Salary</label> 
            <input type="number" class="form-control" id="employee_salary"
                name="employee_salary" aria-describedby="emailHelp"  required     value=<?php echo $contact; ?>>

                </div>

    


            
            <button type="submit" class="btn btn-primary">
            Save
            </button>
                
        </form> 
    </div>
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

