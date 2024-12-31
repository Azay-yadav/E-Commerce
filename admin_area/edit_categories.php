<?php
if(isset($_GET['edit_categories'])){
    $edit_categories=$_GET['edit_categories'];
    // echo $edit_categories;

    $get_categories="Select * from `categories` where categories_id=$edit_categories";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $categories_title=$row['categories_title'];
    // echo $categories_title;
}
if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['categories_title'];

    $update_query="update `categories` set categories_title='$cat_title' where
    categories_id=$edit_categories";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo "<script>alert('Category is been updated successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}


?>


<div class="container mt-3">
    <h1 class="text-center">Edit Categories</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="categories_title" class="form-label">Categories Title</label>
            <input type="text" name="categories_title" id="categories_title" class="form-control"
            required="required" value='<?php echo $categories_title;?>'>
        </div>
        <input type="submit" value="Update Categories" class="btn btn-info px-3 mb-3" name="edit_cat">
    </form>
</div>