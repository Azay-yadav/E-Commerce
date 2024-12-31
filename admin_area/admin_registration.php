<?php  include('../includes/connect.php'); 
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
     <style>
        body{
            overflow: hidden;
        }
     </style>

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/adminreg.jpg" alt="Admin Registration"
                class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
               <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Admin_name</label>
                    <input type="text" id="username" name="admin_name"
                    placeholder="Enter your username" required="required"
                    class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="admin_email"
                    placeholder="Enter your email" required="required"
                    class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="admin_password"
                    placeholder="Enter your password" required="required"
                    class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirm_password" name="conf_admin_password"
                    placeholder="Enter your confirm_password" required="required"
                    class="form-control">
                </div>
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0"
                    name="admin_registration" value="Register">
                    <p class="small fw-bold mt-2 pt-1">Do you already have an account?<a 
                    href="admin_login.php" class="link-danger">Login</a></p>
                </div>
               </form>
            </div>
        </div>

    </div>
</body>
</html>

<!-- php code -->
<?php
if (isset($_POST['admin_registration'])) {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $conf_admin_password = $_POST['conf_admin_password'];

    // Check if passwords match
    if ($admin_password != $conf_admin_password) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);

        // Check if admin name or email already exists
        $stmt = $con->prepare("SELECT * FROM `admin_table` WHERE admin_name=? OR admin_email=?");
        $stmt->bind_param("ss", $admin_name, $admin_email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Admin name or email already exists');</script>";
        } else {
            // Insert into database
            $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password) VALUES (?, ?, ?)";
            $stmt = $con->prepare($insert_query);
            $stmt->bind_param("sss", $admin_name, $admin_email, $hash_password);

            if ($stmt->execute()) {
                echo "<script>alert('Registration successful');</script>";
            } else {
                echo "<script>alert('Registration failed: " . $con->error . "');</script>";
            }
        }
    }
}
?>

