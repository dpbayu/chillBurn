<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
      header('location:index.php');
   };
   $page = 'order';
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php include 'partials/head.php'; ?>
<!-- Head End -->

<body>
   <!-- Loader Start -->
   <div class="loader">
      <img src="images/loader.gif" alt="">
   </div>
   <!-- Loader End -->
   <!-- Header Start  -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <div class="simple-hero">
      <div class="container">
         <div class="content">
            <div class="heading">
               <h3>Orders</h3>
               <p><a href="index.php">Home</a> <span> / Orders</span></p>
            </div>
         </div>
      </div>
   </div>
   <section class="orders">
      <h1 class="title">YOUR <span>ORDER</span></h1>
      <div class="container">
         <div class="box-container">
               <?php
                  if ($user_id == '') {
                     echo '<p class="empty">please login to see your orders</p>';
                  } else {
                  $sql_order = "SELECT * FROM tbl_order WHERE user_id = '$user_id'";
                  $query_order = mysqli_query($conn, $sql_order);
                  if (mysqli_num_rows($query_order) > 0) {
                     while ($order = mysqli_fetch_assoc($query_order)) {
               ?>
               <div class="box">
                  <p>Placed On : <span><?= $order['placed_on']; ?></span></p>
                  <p>Name : <span><?= $order['name']; ?></span></p>
                  <p>Email : <span><?= $order['email']; ?></span></p>
                  <p>Number : <span><?= $order['number']; ?></span></p>
                  <p>Address : <span><?= $order['address']; ?></span></p>
                  <p>Payment : <span><?= $order['method']; ?></span></p>
                  <p>Your Order : <span><?= $order['total_products']; ?></span></p>
                  <p>Total Price : <span>$ <?= $order['total_price']; ?>/-</span></p>
                  <p> Payment Status : <span
                        style="color:<?php if($order['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $order['payment_status']; ?></span>
                  </p>
               </div>
               <?php
               }
               } else {
                  echo '<p class="empty">No orders placed yet!</p>';
               }
            }
         ?>
         </div>
      </div>
   </section>
   <!-- Footer Start  -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>