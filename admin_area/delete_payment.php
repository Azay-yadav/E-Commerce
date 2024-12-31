<?php 

if(isset($_GET['delete_payment'])){
    $delete_payment=$_GET['delete_payment'];
    // echo $delete_order;


    $delete_query="Delete from `user_payments` where payment_id=$delete_payment";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Payment is been Deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_payments','_self')</script>";
    }
}



?>