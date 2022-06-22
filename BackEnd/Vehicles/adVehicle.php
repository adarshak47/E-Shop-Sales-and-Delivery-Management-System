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
</head>
    
<body>
    
<div class="container my-4 ">
    
    <h1 class="text-center">Enter Vehicle Details</h1> 
    <form action="../BE/VEHICLES/addVehicle.php" method="post">
    
        <div class="form-group"> 
            <label for="vehicle_no">Vehicle Registration No</label> 
        <input type="text" class="form-control" id="vehicle_no"
            name="vehicle_no" aria-describedby="emailHelp" required>    
        </div>

        <div class="form-group"> 
            <label for="employee_id">Employee</label><br>
            <select class="form-control" name="employee_id" id="employee_id" >
                <option selected>-- Select Employee --</option>
                
 <!-- php code for employee dropdown starts -->
                <?php
                $fetch_employee_id="SELECT * FROM `employees`";
                $res1=mysqli_query($conn,$fetch_employee_id);
                
                
                if(mysqli_num_rows($res1)>0)
                {
                
                    while($row = $res1->fetch_assoc()) {
                        echo "<option value=".$row['emp_id'].">".$row['emp_name']."</option>";
                        
                    }
                }
                ?>
                <!-- php code for employee dropdown ends -->
             </select>
         </div>
 

        <div class="form-group"> 
            <label for="employee_id">Employee ID</label><br>
            <input type="number" class="form-control" id="employee_id" name="employee_id" required>
        </div>
        
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