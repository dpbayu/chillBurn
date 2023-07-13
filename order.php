<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
      header('location:home.php');
   };
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
   <div class="search-hero">
      <div class="container">
         <div class="content">
            <div class="heading">
               <h3>orders</h3>
               <p><a href="home.php">home</a> <span> / order</span></p>
            </div>
         </div>
      </div>
   </div>
   <section class="orders">
      <h1 class="title">your orders</h1>
      <div class="container">
         <div class="box-container">
               <?php
                  if ($user_id == '') {
                     echo '<p class="empty">please login to see your orders</p>';
                  } else {
                  // PDO Method
                  // $select_orders = $conn->prepare("SELECT * FROM tbl_order WHERE user_id = ?");
                  // $select_orders->execute([$user_id]);
                  // if ($select_orders->rowCount() > 0) {
                  //    while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                  // Mysqli Method
                  $sql_order = "SELECT * FROM tbl_order WHERE user_id = '$user_id'";
                  $query_order = mysqli_query($conn, $sql_order);
                  if (mysqli_num_rows($query_order) > 0) {
                     while ($order = mysqli_fetch_assoc($query_order)) {
               ?>
               <div class="box">
                  <p>placed on : <span><?= $order['placed_on']; ?></span></p>
                  <p>name : <span><?= $order['name']; ?></span></p>
                  <p>email : <span><?= $order['email']; ?></span></p>
                  <p>number : <span><?= $order['number']; ?></span></p>
                  <p>address : <span><?= $order['address']; ?></span></p>
                  <p>payment method : <span><?= $order['method']; ?></span></p>
                  <p>your orders : <span><?= $order['total_products']; ?></span></p>
                  <p>total price : <span>$<?= $order['total_price']; ?>/-</span></p>
                  <p> payment status : <span
                        style="color:<?php if($order['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $order['payment_status']; ?></span>
                  </p>
               </div>
               <?php
               }
               } else {
                  echo '<p class="empty">no orders placed yet!</p>';
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