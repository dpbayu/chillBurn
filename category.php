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
               <h3>food category</h3>
               <p><a href="home.php">home</a> <span> / food category</span></p>
            </div>
         </div>
      </div>
   </div>
   <section class="menu">
      <h1 class="title">food category</h1>
      <div class="box-container">
         <?php
            // PDO Method
            // $category = $_GET['category'];
            // $select_products = $conn->prepare("SELECT * FROM tbl_product WHERE category = ?");
            // $select_products->execute([$category]);
            // if ($select_products->rowCount() > 0) {
            //    while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            // Mysqli Method
            $category = $_GET['category'];
            $sql_category = "SELECT * FROM tbl_product WHERE category = '$category'";
            $query_category = mysqli_query($conn, $sql_category);
            if (mysqli_num_rows($query_category) > 0) {
               while ($category_product = mysqli_fetch_array($query_category)) {
         ?>
         <form action="" method="POST" class="box">
            <input type="hidden" name="product_id" value="<?= $category_product['id']; ?>">
            <input type="hidden" name="name" value="<?= $category_product['name']; ?>">
            <input type="hidden" name="price" value="<?= $category_product['price']; ?>">
            <input type="hidden" name="image" value="<?= $category_product['image']; ?>">
            <a href="quick_view.php?product_id=<?= $category_product['id']; ?>" class="fas fa-eye"></a>
            <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
            <img src="assets/img/uploaded_img/<?= $category_product['image']; ?>" alt="" height="300" width="300">
            <div class="name"><?= $category_product['name']; ?></div>
            <div class="flex">
               <div class="price"><span>$</span><?= $category_product['price']; ?></div>
               <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
            </div>
         </form>
         <?php
         }
         } else {
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>
      </div>
   </section>
   <!-- Footer Start -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>