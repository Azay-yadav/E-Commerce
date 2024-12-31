<?php 
if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    
    // Ensure connection is established (assuming $con is your database connection)
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $get_data = "SELECT * FROM `products` WHERE product_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $categories_id = $row['categories_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];

        // Fetching category name
        $select_categories = "SELECT * FROM `categories` WHERE categories_id=$categories_id";
        $result_categories = mysqli_query($con, $select_categories);
        if ($result_categories && mysqli_num_rows($result_categories) > 0) {
            $row_categories = mysqli_fetch_assoc($result_categories);
            $categories_title = $row_categories['categories_title'];
        } else {
            $categories_title = "Unknown Category"; // Default value if not found
        }

        // Fetching brand name
        $select_brand = "SELECT * FROM `brands` WHERE brand_id=$brand_id";
        $result_brand = mysqli_query($con, $select_brand);
        if ($result_brand && mysqli_num_rows($result_brand) > 0) {
            $row_brand = mysqli_fetch_assoc($result_brand);
            $brand_title = $row_brand['brand_title'];
        } else {
            $brand_title = "Unknown Brand"; // Default value if not found
        }
    } else {
        echo "<script>alert('Product not found.'); window.location.href = './index.php';</script>";
        exit();
    }
}
?>

<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value="<?php echo htmlspecialchars($product_title) ?>" name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" id="product_description" value="<?php echo htmlspecialchars($product_description) ?>" name="product_description" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" value="<?php echo htmlspecialchars($product_keywords) ?>" name="product_keywords" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_categories" class="form-label">Product Categories</label>
            <select name="product_categories" class="form-select">
                <option value="<?php echo htmlspecialchars($categories_id) ?>"><?php echo htmlspecialchars($categories_title) ?></option>
                <?php 
                  $select_categories_all = "SELECT * FROM `categories`";
                  $result_categories_all = mysqli_query($con, $select_categories_all);
                  while ($row_categories_all = mysqli_fetch_assoc($result_categories_all)) {
                    $categories_title = $row_categories_all['categories_title'];
                    $categories_id = $row_categories_all['categories_id'];
                    echo "<option value='$categories_id'>$categories_title</option>";
                  }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Product Brands</label>
            <select name="product_brands" class="form-select">
                <option value="<?php echo htmlspecialchars($brand_id) ?>"><?php echo htmlspecialchars($brand_title) ?></option>
                <?php 
                  $select_brand_all = "SELECT * FROM `brands`";
                  $result_brand_all = mysqli_query($con, $select_brand_all);
                  while ($row_brand_all = mysqli_fetch_assoc($result_brand_all)) {
                    $brand_title = $row_brand_all['brand_title'];
                    $brand_id = $row_brand_all['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                  }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo htmlspecialchars($product_image1) ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo htmlspecialchars($product_image2) ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
                <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo htmlspecialchars($product_image3) ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" required="required" value="<?php echo htmlspecialchars($product_price) ?>">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_products" value="Update product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>

<!-- editing products -->
<?php
if(isset($_POST['edit_products'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_categories = $_POST['product_categories'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // Checking for fields empty or not
    if ($product_title == '' || $product_description == '' || $product_keywords == '' || $product_categories == '' || $product_brands == '' || $product_image1 == '' || $product_image2 == '' || $product_image3 == '' || $product_price == '') {
        echo "<script>alert('Please fill all the fields and continue the process.');</script>";
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // Query to update products
        $update_product = "UPDATE `products` SET 
            product_title='$product_title',
            product_description='$product_description',
            product_keywords='$product_keywords',
            categories_id='$product_categories',
            brand_id='$product_brands',
            product_image1='$product_image1',
            product_image2='$product_image2',
            product_image3='$product_image3',
            product_price='$product_price',
            date=NOW() 
            WHERE product_id=$edit_id";
        $result_update = mysqli_query($con, $update_product);
        
        if ($result_update) {
            echo "<script>alert('Product updated successfully');</script>";
            echo "<script>window.open('./index.php','_self');</script>";
        }
    }
}
?>
