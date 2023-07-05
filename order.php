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
   <div class="heading">
      <h3>orders</h3>
      <p><a href="html.php">home</a> <span> / orders</span></p>
   </div>
   <section class="orders">
      <h1 class="title">your orders</h1>
      <div class="box-container">
            <?php
               if ($user_id == '') {
                  echo '<p class="empty">please login to see your orders</p>';
               } else {
               $select_orders = $conn->prepare("SELECT * FROM tbl_order WHERE user_id = ?");
               $select_orders->execute([$user_id]);
               if ($select_orders->rowCount() > 0) {
                  while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="box">
               <p>placed on : <span><?= $fetch_orders['placed_on']; ?></span></p>
               <p>name : <span><?= $fetch_orders['name']; ?></span></p>
               <p>email : <span><?= $fetch_orders['email']; ?></span></p>
               <p>number : <span><?= $fetch_orders['number']; ?></span></p>
               <p>address : <span><?= $fetch_orders['address']; ?></span></p>
               <p>payment method : <span><?= $fetch_orders['method']; ?></span></p>
               <p>your orders : <span><?= $fetch_orders['total_products']; ?></span></p>
               <p>total price : <span>$<?= $fetch_orders['total_price']; ?>/-</span></p>
               <p> payment status : <span
                     style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span>
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
   </section>
   <!-- Footer Start  -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>