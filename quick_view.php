<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
   };
      require 'function.php';
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
   <?php require 'partials/header.php'; ?>
   <!-- Header End -->
   <div class="search-hero">
      <div class="container">
         <div class="content">
            <div class="heading">
               <h3>quick view</h3>
               <p><a href="home.php">home</a> <span> / quick view</span></p>
            </div>
         </div>
      </div>
   </div>
   <section class="quick-view">
      <h1 class="title">quick view</h1>
      <?php
         $product_id = $_GET['product_id'];
         $sql_product = "SELECT * FROM tbl_product WHERE id = $product_id";
         $query_product = mysqli_query($conn, $sql_product);
         if (mysqli_num_rows($query_product) > 0) {
            while ($product = mysqli_fetch_array($query_product)) {
      ?>
      <form action="" method="POST" class="box">
         <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
         <input type="hidden" name="name" value="<?= $product['name']; ?>">
         <input type="hidden" name="price" value="<?= $product['price']; ?>">
         <input type="hidden" name="image" value="<?= $product['image']; ?>">
         <img src="assets/img/uploaded_img/<?= $product['image']; ?>" alt="">
         <a href="category.php?category=<?= $product['category']; ?>"
            class="cat"><?= $product['category']; ?></a>
         <div class="name"><?= $product['name']; ?></div>
         <div class="flex">
            <div class="price"><span>$</span><?= $product['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
         <button type="submit" name="add_to_cart" class="cart-btn">add to cart</button>
      </form>
      <?php
         }
      } else {
         echo '<p class="empty">no products added yet!</p>';
      }
   ?>
   </section>
   <!-- Footer Start -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>