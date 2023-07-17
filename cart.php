<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
      header('location: home.php');
   };
   if (isset($_POST['delete'])) {
      $cart_id = $_POST['cart_id'];
      // $delete_cart_item = $conn->prepare("DELETE FROM tbl_cart WHERE id = ?");
      // $delete_cart_item->execute([$cart_id]);
      $sql_delete_cart = "DELETE FROM tbl_cart WHERE id = '$cart_id'";
      $query_delete_cart = mysqli_query($conn, $sql_delete_cart);
      $message[] = 'Cart item deleted!';
   }
   if (isset($_POST['delete_all'])) {
      // $delete_cart_item = $conn->prepare("DELETE FROM tbl_cart WHERE user_id = ?");
      // $delete_cart_item->execute([$user_id]);
      // header('location:cart.php');
      $sql_delete_cart = "DELETE FROM tbl_cart WHERE user_id = '$user_id'";
      $query_delete_cart = mysqli_query($conn, $sql_delete_cart);
      $message[] = 'Deleted all from cart!';
   }
   if (isset($_POST['update_qty'])) {
      $cart_id = $_POST['cart_id'];
      $qty = $_POST['qty'];
      // $update_qty = $conn->prepare("UPDATE tbl_cart SET quantity = ? WHERE id = ?");
      // $update_qty->execute([$qty, $cart_id]);
      $sql_quantity = "UPDATE tbl_cart SET quantity = '$qty' WHERE id = '$cart_id'";
      $query_quantity = mysqli_query($conn, $sql_quantity);
      $message[] = 'Cart quantity updated';
   }
   $grand_total = 0;
   $page = 'cart';
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
               <h3>SHOPPING CART</h3>
               <p><a href="home.php">Home</a> <span> / Cart</span></p>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <!-- Shopping Cart Start  -->
      <section class="menu">
         <h1 class="title">YOUR <span>CART</span></h1>
         <div class="box-container">
            <?php
               $grand_total = 0;
               $sql_cart = "SELECT * FROM tbl_cart WHERE user_id = '$user_id'";
               $query_cart = mysqli_query($conn, $sql_cart);
               if (mysqli_num_rows($query_cart) > 0) {
                  while ($cart = mysqli_fetch_assoc($query_cart)) {
               ?>
               <form action="" method="POST" class="box">
                  <input type="hidden" name="cart_id" value="<?= $cart['id']; ?>">
                  <button type="button" data-bs-toggle="modal" data-bs-target="#modal<?= $cart['id'] ?>"
                     class="fas fa-eye">
                  </button>
                  <button type="submit" class="fas fa-times" name="delete" onclick="return confirm('Delete this item?');">
                  </button>
                  <img src="assets/img/uploaded_img/<?= $cart['image']; ?>" alt="<?= $cart['name']; ?>" width="300" height="300">
                  <div class="content">
                     <p class="name"><?= $cart['name']; ?></p>
                     <div class="flex">
                        <div class="price"><span>$ </span><?= $cart['price']; ?></div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $cart['quantity']; ?>"
                           maxlength="2">
                        <button type="submit" class="fas fa-edit" name="update_qty"></button>
                     </div>
                     <div class="sub-total"> Sub Total :
                        <span>$ <?= $sub_total = ($cart['price'] * $cart['quantity']); ?>/-</span>
                     </div>
                  </div>
               </form>
               <!-- Modal Start -->
               <div class="modal fade" id="modal<?= $cart['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h1 class="modal-title fs-5" id="exampleModalLabel">Menu <span
                                 class="fw-bold"><?= $cart['name']; ?></span></h1>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <div class="text-center mb-3">
                              <img src="assets/img/uploaded_img/<?= $cart['image']; ?>" width="250" height="250"
                                 alt="Image <?= $cart['name']; ?>">
                           </div>
                           <div class="d-flex">
                              <label style="width: 150px;">Name</label>
                              <p class="mx-3">:</p>
                              <p><?= $cart['name']; ?></p>
                           </div>
                           <div class="d-flex">
                              <label style="width: 150px;">Price</label>
                              <p class="mx-3">:</p>
                              <p>$ <?= $cart['price']; ?></p>
                           </div>
                           <div class="d-flex">
                              <label style="width: 150px;">Quantity</label>
                              <p class="mx-3">:</p>
                              <p><?= $cart['quantity']; ?></p>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Modal End -->
            <?php
               $grand_total += $sub_total;
            }
            } else {
               echo '<p class="empty">Your cart is empty</p>';
            }
            ?>
         </div>
         <div class="cart-total">
            <p>cart total : <span>$ <?= $grand_total; ?></span></p>
            <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">Proceed to Checkout</a>
         </div>
         <div class="more-btn">
            <form action="" method="POST" class="mb-3">
               <button type="submit" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" name="delete_all"
                  onclick="return confirm('Delete all from cart?');">Delete All</button>
            </form>
            <a href="menu.php" class="btn">Continue Shopping</a>
         </div>
      </section>
      <!-- Shopping Cart End -->
   </div>
   <!-- footer section starts  -->
   <?php include 'partials/footer.php'; ?>
   <!-- footer section ends -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>