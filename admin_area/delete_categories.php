<?php 

if(isset($_GET['delete_categories'])){
    $delete_categories=$_GET['delete_categories'];
    // echo $delete_categories;


    $delete_query="Delete from `categories` where categories_id=$delete_categories";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Category is been Deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}



?>