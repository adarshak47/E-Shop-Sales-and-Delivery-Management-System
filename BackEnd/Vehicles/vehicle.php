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
        <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
    
<body>
    
<!-- get product details starts -->

<div class="container my-4 ">


<button type="button" class="btn btn-primary"><a href="http://localhost/DBMS_PRO/PROJECT/FE/addVehicle.html" style="color: white;"><i class="fa fa-plus" aria-hidden="true"></i> <strong> Add Vehicle</strong></a>
            
            </button>
     
     
           

<u><h1 class="text-center">Vehicle Details</h1></u> 

<br>

<table class="table table-striped table-bordered">

<tr class="thead-dark">
<th>Vehice Registration Number</th>
<th>Vehicle Name</th>

</tr>

<?php 

include '../dbconnection.php';

$fetch_vehicles_query="SELECT * from `vehicles` ";

$result=mysqli_query($conn,$fetch_vehicles_query);

if(mysqli_num_rows($result)>0)
{

    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>". $row["vehicle_reg_no"] ."</td>
        <td>". $row["vehicle_name"] ."</td>
       
        </tr>";
      }
}

?>

<!--  get product details ends-->
</table>


<button type="button" class="btn btn-primary"><a href="http://localhost/DBMS_PRO/PROJECT/FE/adminInterface.html" style="color: white;"><i class="fa fa-arrow-left" aria-hidden="true"></i> <strong>Back</strong></a>
            
            </button>

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

