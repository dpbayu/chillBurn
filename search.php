<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
   };
   include 'components/add_cart.php';
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
               <h3>search</h3>
               <p><a href="home.php">home</a> <span> / search</span></p>
            </div>
         </div>
      </div>
   </div>
   <!-- Search Start  -->
   <div class="container">
      <section class="search-form">
         <form method="POST" action="">
            <input type="text" name="search_box" class="box" placeholder="Search here...">
            <button type="submit" name="search_btn" class="fas fa-search"></button>
         </form>
      </section>
      <!-- Search End -->
      <section class="menu" style="min-height: 100vh; padding-top:0;">
         <div class="box-container">
            <?php
               if (isset($_POST['search_box']) OR isset($_POST['search_btn'])) {
               $search_box = $_POST['search_box'];
               $select_products = $conn->prepare("SELECT * FROM tbl_product WHERE name LIKE '%{$search_box}%'");
               $select_products->execute();
               if ($select_products->rowCount() > 0) {
                  while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <form action="" method="POST" class="box">
               <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">
               <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
               <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
               <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
               <a href="quick_view.php?product_id=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
               <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
               <img src="assets/img/uploaded_img/<?= $fetch_products['image']; ?>" alt="" width="200" height="200">
               <br>
               <a href="category.php?category=<?= $fetch_products['category']; ?>"
                  class="cat"><?= $fetch_products['category']; ?></a>
               <div class="name"><?= $fetch_products['name']; ?></div>
               <div class="flex">
                  <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
                  <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
               </div>
            </form>
            <?php
            }
            } else {
               echo '<p class="empty">no products added yet!</p>';
            }
            }
            ?>
         </div>
      </section>
   </div>
   <!-- Footer Start  -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>