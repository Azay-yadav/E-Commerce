<style>
   /* General Styles */
   body{
    overflow-x: hidden;
   }
body, html {
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
}

/* Container for full height */
.container-fluid {
    min-height: 100%;
    display: flex;
    flex-direction: column;
}
.navi{
    display: flex!important;
    flex-direction: row !important;
}
/* Main content area */
.container {
    flex: 1;
}

/* Navbar */
.navbar {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  
}

.navbar .logo {
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: space-between;
    
}

/* Manage Details Section */
.bg-light {
    background-color: #f1f1f1;
    border-bottom: 2px solid #e2e2e2;
}

h3 {
    margin: 0;
    color: #333;
    font-weight: bold;
}

/* Admin Panel Styles */
.row {
    margin: 0;
}

.admin_image {
    width: 120px;
    height: 130px;
    border-radius: 50%;
    border: 3px solid #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.col-md-12 {
    border-bottom: 1px solid #ddd;
}

.button {
    flex-grow: 1;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.button button {
    margin: 5px;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.button button:hover {
    background-color: #17a2b8;
}

.button .nav-link {
    padding: 8px 15px;
    font-size: 16px;
    font-weight: 500;
    border-radius: 5px;
}

.button .nav-link.bg-info {
    background-color: #17a2b8;
}

.button .nav-link.bg-info:hover {
    background-color: #138496;
}

/* Footer */
.footer {
    background-color: #17a2b8;
    color: #fff;
    font-size: 14px;
    border-top: 2px solid #138496;
    padding: 10px 0;
    margin-top: auto;
    text-align: center;
}
.product_img{
    width: 100px;
    object-fit: contain;
}


</style>
<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
    crossorigin="anonymous">
    

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
     integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
     crossorigin="anonymous" 
     referrerpolicy="no-referrer" />

    <!-- css file -->
     <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid navi">
                <img src="../images/shopping-cart.png" alt="" class="logo">
               
                            <a href="" class="nav-link">Welcome Guest</a>
                 
            </div>
        </nav>
        <!-- second child -->
         <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
         </div>
         <!-- Third child -->
          <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/IMG_20230703_154143.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Azay Adhikari</p>
                </div>
                <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->

                <div class="button text-center">
                      <button class="my-1"><a href="insert_product.php" class="nav-link text-light
                    bg-info my-1">Insert Product</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light
                    bg-info my-1"> View Product</a></button>
                    <button><a href="index.php?insert_categories" class="nav-link text-light
                    bg-info my-1">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light
                    bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-light
                    bg-info my-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light
                    bg-info my-1">View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light
                     bg-info my-1">All orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-light
                     bg-info my-1">All payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light
                    bg-info my-1">List users</a></button>
                    <button><a href="logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
          </div>

          <!-- fourth child -->
           <div class="container my-3">
            <?php
            if(isset($_GET['insert_categories'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brands'])){
                include('insert_brands.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_product'])){
                include('delete_product.php');
            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php');
            }
            if(isset($_GET['view_brands'])){
                include('view_brands.php');
            }
            if(isset($_GET['edit_categories'])){
                include('edit_categories.php');
            }
            if(isset($_GET['edit_brands'])){
                include('edit_brands.php');
            }
            if(isset($_GET['delete_categories'])){
                include('delete_categories.php');
            }
            if(isset($_GET['delete_brands'])){
                include('delete_brands.php');
            }
            if(isset($_GET['list_orders'])){
                include('list_orders.php');
            }
            if(isset($_GET['delete_order'])){
                include('delete_order.php');
            }
            if(isset($_GET['list_payments'])){
                include('list_payments.php');
            }
            if(isset($_GET['delete_payment'])){
                include('delete_payment.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            if(isset($_GET['delete_user'])){
                include('delete_user.php');
            }
            ?>
           </div>




          <!-- last child -->
          <div class="bg-info p-3 text-center footer" >
  <p>All right reserved &copy;-Designed BY HWIC Group-2024</p>
 </div>
     </div>




 <!-- bootstrap js link -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
 crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>