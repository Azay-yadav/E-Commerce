<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce website using php and mysql.</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
    crossorigin="anonymous">
     <!-- Font awesome link -->
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
  <div class="container-fluid">
    <img src="./images/shopping-cart.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php
            cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>/-</a>
        </li>
        
        
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" 
        placeholder="Search" aria-label="Search" name="search_data">
         <input type="submit" value="Search" class="btn 
         btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
cart();
 ?>

<!-- Second child -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">

  <ul class="navbar-nav me-auto">
 
        <?php
     If(!isset($_SESSION['username'])){
      echo " <li class='nav-item'>
      <a class='nav-link' href='#'>Welcome Guest</a>
    </li>";
    }else{
      echo "<li class='nav-item'>
      <a class='nav-link' href='#'>Welcome ". $_SESSION['username']."</a>
    </li>";
    }


        If(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_login.php'>Login</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/logout.php'>Logout</a>
        </li>";
        }
        ?>
  </ul>
  </nav>

  <!-- Third child -->
   <div class="bg-light">
    <h3 class="text-center">Azax store</h3>
    <p class="text-center">Communications is at the heart of e-commerce and community</p>
   </div>

   <!-- Fourth child -->
    <div class="row px-1" >
      <div class="col-md-10">
        <!-- Products -->
         <div class="row">
<!-- fetching products -->
<?php
// calling function
view_details();
get_unique_categories();
get_unique_brands();

          ?>
<!-- row end -->
</div>
<!-- col end -->
</div>
     
     
        <!-- sidenav -->
         <div class="col-md-2 bg-secondary p-0">
          <!-- brands to be displayed -->
          <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
              <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
            </li>
            <?php
getbrands();

?>
        
          </ul>
          <!-- categories to be displayed -->
          <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
              <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
            </li>
            <?php

getcategories();


?>
      
          </ul>
        
      </div>
    </div>
   
   

<!-- last child -->
<!-- include footer -->
 <?php include("./includes/footer.php") ?>
     </div>





<!-- Bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
 crossorigin="anonymous"></script>
</body>
</html>