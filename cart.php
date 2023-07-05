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

   if (isset($_POST['delete'])) {
      $cart_id = $_POST['cart_id'];
      $delete_cart_item = $conn->prepare("DELETE FROM tbl_cart WHERE id = ?");
      $delete_cart_item->execute([$cart_id]);
      $message[] = 'cart item deleted!';
   }

   if (isset($_POST['delete_all'])) {
      $delete_cart_item = $conn->prepare("DELETE FROM tbl_cart WHERE user_id = ?");
      $delete_cart_item->execute([$user_id]);
      // header('location:cart.php');
      $message[] = 'deleted all from cart!';
   }

   if (isset($_POST['update_qty'])) {
      $cart_id = $_POST['cart_id'];
      $qty = $_POST['qty'];
      $qty = filter_var($qty, FILTER_SANITIZE_STRING);
      $update_qty = $conn->prepare("UPDATE tbl_cart SET quantity = ? WHERE id = ?");
      $update_qty->execute([$qty, $cart_id]);
      $message[] = 'cart quantity updated';
   }
   $grand_total = 0;
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
      <h3>shopping cart</h3>
      <p><a href="home.php">home</a> <span> / cart</span></p>
   </div>
   <!-- Shopping Cart Start  -->
   <section class="products">
      <h1 class="title">your cart</h1>
      <div class="box-container">
         <?php
            $grand_total = 0;
            $select_cart = $conn->prepare("SELECT * FROM tbl_cart WHERE user_id = ?");
            $select_cart->execute([$user_id]);
            if ($select_cart->rowCount() > 0){
               while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
         ?>
         <form action="" method="POST" class="box">
            <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
            <a href="quick_view.php?product_id=<?= $fetch_cart['product_id']; ?>" class="fas fa-eye"></a>
            <button type="submit" class="fas fa-times" name="delete"
               onclick="return confirm('delete this item?');"></button>
            <img src="assets/img/uploaded_img/<?= $fetch_cart['image']; ?>" alt="">
            <div class="name"><?= $fetch_cart['name']; ?></div>
            <div class="flex">
               <div class="price"><span>$</span><?= $fetch_cart['price']; ?></div>
               <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $fetch_cart['quantity']; ?>"
                  maxlength="2">
               <button type="submit" class="fas fa-edit" name="update_qty"></button>
            </div>
            <div class="sub-total"> sub total :
               <span>$<?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</span> </div>
         </form>
         <?php
            $grand_total += $sub_total;
         }
         } else {
            echo '<p class="empty">your cart is empty</p>';
         }
      ?>
      </div>
      <div class="cart-total">
         <p>cart total : <span>$<?= $grand_total; ?></span></p>
         <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
      </div>
      <div class="more-btn">
         <form action="" method="POST">
            <button type="submit" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" name="delete_all"
               onclick="return confirm('delete all from cart?');">delete all</button>
         </form>
         <a href="menu.php" class="btn">continue shopping</a>
      </div>
   </section>
   <!-- Shopping Cart End -->
   <!-- footer section starts  -->
   <?php include 'partials/footer.php'; ?>
   <!-- footer section ends -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>