<!-- PHP -->
<?php
   session_start();
   require '../include/connect.php';
   $admin_id = $_SESSION['admin_id'];
   if (!isset($admin_id)) {
      header('location:login.php');
   }
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
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
      <div class="box-container">
         <div class="box">
            <h3>welcome!</h3>
            <p><?= $admin['name']; ?></p>
            <a href="update_profile.php" class="btn">update profile</a>
         </div>
         <div class="box">
            <?php
               // PDO Method
               // $total_pendings = 0;
               // $select_pendings = $conn->prepare("SELECT * FROM tbl_order WHERE payment_status = ?");
               // $select_pendings->execute(['pending']);
               // while ($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)) {
               //    $total_pendings += $fetch_pendings['total_price'];
               // }
               // Mysqli Method
               $total_pendings = 0;
               $sql_pending = "SELECT * FROM tbl_order WHERE payment_status = 'pending'";
               $query_pending = mysqli_query($conn, $sql_pending);
               while ($pending = mysqli_fetch_assoc($query_pending)) {
                  $total_pendings += $pending['total_price'];
               }
            ?>
            <h3><span>$</span><?= $total_pendings; ?><span>/-</span></h3>
            <p>total pendings</p>
            <a href="order.php" class="btn">see orders</a>
         </div>
         <div class="box">
            <?php
               // PDO Method
               // $total_completes = 0;
               // $select_completes = $conn->prepare("SELECT * FROM tbl_order WHERE payment_status = ?");
               // $select_completes->execute(['completed']);
               // while ($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)) {
               //    $total_completes += $fetch_completes['total_price'];
               // }
               // Mysqli Method
               $total_completes = 0;
               $sql_complete = "SELECT * FROM tbl_order WHERE payment_status = 'completed'";
               $query_complete = mysqli_query($conn, $sql_complete);
               while ($complete = mysqli_fetch_assoc($query_complete)) {
                  $total_completes += $complete['total_price'];
               }
            ?>
            <h3><span>$</span><?= $total_completes; ?><span>/-</span></h3>
            <p>total completes</p>
            <a href="order.php" class="btn">see orders</a>
         </div>
         <div class="box">
            <?php
               // PDO Method
               // $select_orders = $conn->prepare("SELECT * FROM tbl_order");
               // $select_orders->execute();
               // $numbers_of_orders = $select_orders->rowCount();
               // Mysqli Method
               $sql_order = "SELECT *FROM tbl_order";
               $query_order = mysqli_query($conn, $sql_order);
               $order = mysqli_num_rows($query_order);
            ?>
            <h3><?= $order; ?></h3>
            <p>total orders</p>
            <a href="order.php" class="btn">see orders</a>
         </div>
         <div class="box">
            <?php
               // PDO Method
               // $select_products = $conn->prepare("SELECT * FROM tbl_product");
               // $select_products->execute();
               // $numbers_of_products = $select_products->rowCount();
               // Mysqli Method
               $sql_product = "SELECT * FROM tbl_product";
               $query_product = mysqli_query($conn, $sql_product);
               $product = mysqli_num_rows($query_product);
            ?>
            <h3><?= $product; ?></h3>
            <p>products added</p>
            <a href="product.php" class="btn">see products</a>
         </div>
         <div class="box">
            <?php
               // PDO Method
               // $select_users = $conn->prepare("SELECT * FROM tbl_user");
               // $select_users->execute();
               // $numbers_of_users = $select_users->rowCount();
               // Mysqli Method
               $sql_user = "SELECT * FROM tbl_user";
               $query_user = mysqli_query($conn, $sql_user);
               $user = mysqli_num_rows($query_user);
            ?>
            <h3><?= $user; ?></h3>
            <p>users accounts</p>
            <a href="user.php" class="btn">see users</a>
         </div>
         <div class="box">
            <?php
               // PDO Method
               // $select_admins = $conn->prepare("SELECT * FROM tbl_admin");
               // $select_admins->execute();
               // $numbers_of_admins = $select_admins->rowCount();
               // Mysqli Method
               $sql_admin = "SELECT * FROM tbl_admin";
               $query_admin = mysqli_query($conn, $sql_admin);
               $admin = mysqli_num_rows($query_admin);
            ?>
            <h3><?= $admin; ?></h3>
            <p>admins</p>
            <a href="admin.php" class="btn">see admins</a>
         </div>
         <div class="box">
            <?php
               // PDO Method
               // $select_messages = $conn->prepare("SELECT * FROM tbl_message");
               // $select_messages->execute();
               // $numbers_of_messages = $select_messages->rowCount();
               // Mysqli Method
               $sql_message = "SELECT * FROM tbl_message";
               $query_message = mysqli_query($conn, $sql_message);
               $message = mysqli_num_rows($query_message);
            ?>
            <h3><?= $message; ?></h3>
            <p>new messages</p>
            <a href="message.php" class="btn">see messages</a>
         </div>
      </div>
   </section>
   <!-- Dashboard End -->
   <!-- JS Start  -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>