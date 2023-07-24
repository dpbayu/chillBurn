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

   if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $number = $_POST['number'];
      $email = $_POST['email'];
      $method = $_POST['method'];
      $address = $_POST['address'];
      $total_products = $_POST['total_products'];
      $total_price = $_POST['total_price'];
      $sql_check = "SELECT * FROM tbl_cart WHERE user_id = '$user_id'";
      $query_check = mysqli_query($conn, $sql_check);
      if (mysqli_num_rows($query_check) > 0) {
         if ($address == '') {
            $message[] = 'Please add your address!';
         } else {
            $sql_insert = "INSERT INTO tbl_order (user_id, name, number, email, method, address, total_products, total_price) VALUES ('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$total_price')";
            $query_insert = mysqli_query($conn, $sql_insert);
            $sql_delete = "DELETE FROM tbl_cart WHERE user_id = '$user_id'";
            $query_delete = mysqli_query($conn, $sql_delete);
            $message[] = 'Order placed successfully!';
         }
      } else {
         $message[] = 'Your cart is empty';
      }
   }
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">

</html>
<!-- Head Start -->
<?php include 'partials/head.php'; ?>
<!-- Head End -->

<body>
   <!-- Loader Start -->
   <div class="loader">
      <img src="assets/img/loader.gif" alt="">
   </div>
   <!-- Loader End -->
   <!-- Header Start  -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <div class="simple-hero">
      <div class="container">
         <div class="content">
            <div class="heading">
               <h3>CHECKOUT CART</h3>
               <p><a href="index.php">Home</a> <span> / Checkout</span></p>
            </div>
         </div>
      </div>
   </div>
   <section class="checkout">
      <div class="container">
         <h1 class="title">ORDER <span>SUMMARY</span></h1>
         <form action="" method="POST">
            <div class="cart-items">
               <h3>Cart Items</h3>
               <?php
                  $grand_total = 0;
                  $cart_items[] = '';
                  $sql_cart = "SELECT * FROM tbl_cart WHERE user_id = '$user_id'";
                  $query_cart = mysqli_query($conn, $sql_cart);
                  if (mysqli_num_rows($query_cart) > 0) {
                     while ($cart = mysqli_fetch_assoc($query_cart)) {
                     $cart_items[] = $cart['name'].' ('.$cart['quantity'].' x '. $cart['price'].') - ';
                     $total_products = implode($cart_items);
                     $grand_total += ($cart['quantity'] * $cart['price']);
               ?>
               <p><span class="name"><?= $cart['name']; ?></span><span class="price"><?= $cart['quantity']; ?> x Rp
                     <?= number_format($cart['price'], 0, ',', '.'); ?></span></p>
               <?php
               }
               } else {
                  echo '<p class="empty">Your cart is empty!</p>';
               }
               ?>
               <p class="grand-total"><span class="name">GRAND TOTAL :</span><span class="price">Rp
                     <?= number_format($grand_total, 0, ',', '.'); ?></span></p>
               <a href="cart.php" class="btn">View Cart</a>
            </div>
            <input type="hidden" name="total_products" value="<?= $total_products; ?>">
            <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
            <input type="hidden" name="name" value="<?= $user['name'] ?>">
            <input type="hidden" name="number" value="<?= $user['number'] ?>">
            <input type="hidden" name="email" value="<?= $user['email'] ?>">
            <input type="hidden" name="address" value="<?= $user['address'] ?>">
            <div class="user-info">
               <h3>Your Info</h3>
               <p><i class="fas fa-user"></i><span><?= $user['name'] ?></span></p>
               <p><i class="fas fa-phone"></i><span><?= $user['number'] ?></span></p>
               <p><i class="fas fa-envelope"></i><span><?= $user['email'] ?></span></p>
               <a href="profile.php" class="btn">Update Info</a>
               <h3>Delivery Address</h3>
               <p><i
                     class="fas fa-map-marker-alt"></i><span><?php if ($user['address'] == '') { echo 'Please enter your address'; } else { echo $user['address']; } ?></span>
               </p>
               <a href="update_address.php" class="btn">Update Address</a>
               <select name="method" class="box" required>
                  <option value="" disabled selected>select payment method --</option>
                  <option value="cash on delivery">cash on delivery</option>
                  <option value="credit card">credit card</option>
                  <option value="paytm">paytm</option>
                  <option value="paypal">paypal</option>
               </select>
               <input type="submit" value="Place Order"
                  class="btn <?php if ($user['address'] == '') { echo 'disabled'; } ?>"
                  style="width:100%; background:var(--black); color:var(--white);" name="submit">
            </div>
         </form>
      </div>
   </section>
   <!-- Footer Start -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>