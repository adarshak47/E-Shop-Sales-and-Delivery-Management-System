<?php

include '../dbconnection.php'; 

$payment_id=$_GET["id"]; 



$change_payment_status="UPDATE `payment` SET `payment_status`='Paid' WHERE `payment_id`='$payment_id'";
$result = mysqli_query($conn, $change_payment_status);
    
echo'<script>alert("Payment status upadetd successfully!!")
window.location.href = "http://localhost/DBMS_PRO/PROJECT/BE/PAYMENTS/payments.php"</script>';



?>