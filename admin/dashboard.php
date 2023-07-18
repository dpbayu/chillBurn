<!-- PHP -->
<?php
   session_start();
   require '../include/connect.php';
   $admin_id = $_SESSION['admin_id'];
   if (!isset($admin_id)) {
      header('location:login.php');
   }
   $page = 'dashboard';
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <!-- Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Custom CSS  -->
   <link rel="stylesheet" href="assets/css/admin_style.css">
</head>

<body>
   <!-- Header Start -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <!-- Dashboard Start  -->
   <section class="dashboard">
      <h1 class="heading">dashboard</h1>
      <div class="container">
         <div class="box-container">
            <!-- Welcome Start -->
            <div class="box">
               <h3>Welcome!</h3>
               <p><?= $admin['name']; ?></p>
               <a href="update_profile.php" class="btn">Update Profile</a>
            </div>
            <!-- Welcome End -->
            <!-- Total Pending Start -->
            <div class="box">
               <?php
                  $total_pendings = 0;
                  $sql_pending = "SELECT * FROM tbl_order WHERE payment_status = 'pending'";
                  $query_pending = mysqli_query($conn, $sql_pending);
                  while ($pending = mysqli_fetch_assoc($query_pending)) {
                     $total_pendings += $pending['total_price'];
                  }
               ?>
               <h3><span>$ </span><?= $total_pendings; ?><span>/-</span></h3>
               <p>Total Pending</p>
               <a href="order.php" class="btn">See Order</a>
            </div>
            <!-- Total Pending End -->
            <!-- Total Complete Start -->
            <div class="box">
               <?php
                  $total_completes = 0;
                  $sql_complete = "SELECT * FROM tbl_order WHERE payment_status = 'completed'";
                  $query_complete = mysqli_query($conn, $sql_complete);
                  while ($complete = mysqli_fetch_assoc($query_complete)) {
                     $total_completes += $complete['total_price'];
                  }
               ?>
               <h3><span>$ </span><?= $total_completes; ?><span>/-</span></h3>
               <p>Total Completed</p>
               <a href="order.php" class="btn">See Order</a>
            </div>
            <!-- Total Complete End -->
            <!-- Total Order Start -->
            <div class="box">
               <?php
                  $sql_order = "SELECT *FROM tbl_order";
                  $query_order = mysqli_query($conn, $sql_order);
                  $order = mysqli_num_rows($query_order);
               ?>
               <h3><?= $order; ?></h3>
               <p>Total Orders</p>
               <a href="order.php" class="btn">See Order</a>
            </div>
            <!-- Total Order End -->
            <!-- Product Start -->
            <div class="box">
               <?php
                  $sql_product = "SELECT * FROM tbl_product";
                  $query_product = mysqli_query($conn, $sql_product);
                  $product = mysqli_num_rows($query_product);
               ?>
               <h3><?= $product; ?></h3>
               <p>Product Added</p>
               <a href="product.php" class="btn">See Products</a>
            </div>
            <!-- Product End -->
            <!-- User Start -->
            <div class="box">
               <?php
                  $sql_user = "SELECT * FROM tbl_user";
                  $query_user = mysqli_query($conn, $sql_user);
                  $user = mysqli_num_rows($query_user);
               ?>
               <h3><?= $user; ?></h3>
               <p>Users Account</p>
               <a href="user.php" class="btn">See Users</a>
            </div>
            <!-- User End -->
            <!-- Admin Start -->
            <div class="box">
               <?php
                  $sql_admin = "SELECT * FROM tbl_admin";
                  $query_admin = mysqli_query($conn, $sql_admin);
                  $admin = mysqli_num_rows($query_admin);
               ?>
               <h3><?= $admin; ?></h3>
               <p>Admins</p>
               <a href="admin.php" class="btn">See Admins</a>
            </div>
            <!-- Admin End -->
            <!-- Message Start -->
            <div class="box">
               <?php
                  $sql_message = "SELECT * FROM tbl_message";
                  $query_message = mysqli_query($conn, $sql_message);
                  $message = mysqli_num_rows($query_message);
               ?>
               <h3><?= $message; ?></h3>
               <p>New Message</p>
               <a href="message.php" class="btn">See Message</a>
            </div>
            // Message End
         </div>
      </div>
   </section>
   <!-- Dashboard End -->
   <!-- JS Start  -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>