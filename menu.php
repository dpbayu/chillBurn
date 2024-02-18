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
   $page = 'menu';
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
      <img src="assets/img/loader.gif" alt="">
   </div>
   <!-- Loader End -->
   <!-- Header Start  -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <div class="menu-hero"></div>
   <div class="menu-content">
      <div class="container">
         <h3>MENU</h3>
         <p><a class="text-decoration-none" href="index.php">Home</a> <span> / Menu</span></p>
      </div>
   </div>
   <div class="container">
      <!-- Menu Latest Dishes Start  -->
      <section class="menu">
         <h1 class="title">LATEST <span>DISHES</span></h1>
         <div class="box-container">
            <?php
               $sql_product = "SELECT * FROM tbl_product ORDER BY id DESC LIMIT 3";
               $query_product = mysqli_query($conn, $sql_product);
               if (mysqli_num_rows($query_product) > 0) {
                  while ($product = mysqli_fetch_array($query_product)) {
               ?>
            <form class="box" action="" method="POST">
               <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
               <input type="hidden" name="name" value="<?= $product['name']; ?>">
               <input type="hidden" name="price" value="<?= $product['price']; ?>">
               <input type="hidden" name="image" value="<?= $product['image']; ?>">
               <button type="button" data-bs-toggle="modal" data-bs-target="#modal<?= $product['id'] ?>"
                  class="fas fa-eye"></button>
               <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
               <img src="assets/img/menu/<?= $product['image']; ?>" alt="" width="300" height="300">
               <div class="content">
                  <a href="category.php?category=<?= $product['category']; ?>"
                     class="cat"><?= $product['category']; ?></a>
                  <p class="name"><?= $product['name']; ?></p>
                  <div class="flex">
                     <div class="price">Rp <span><?= number_format($product['price'], 0, ',', '.'); ?></span></div>
                     <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                  </div>
               </div>
            </form>
            <!-- Modal Start -->
            <div class="modal fade" id="modal<?= $product['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
               aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Menu <span><?= $product['name'] ?></span>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <div class="text-center mb-3">
                           <img src="assets/img/menu/<?= $product['image']; ?>" width="250" height="250"
                              alt="Image <?= $product['name'] ?>">
                        </div>
                        <div class="d-flex">
                           <label style="width: 150px;">Name</label>
                           <p class="mx-3">:</p>
                           <p><?= $product['name'] ?></p>
                        </div>
                        <div class="d-flex">
                           <label style="width: 150px;">Category</label>
                           <p class="mx-3">:</p>
                           <a href="category.php?category=<?= $product['category']; ?>"><?= $product['category'] ?></a>
                        </div>
                        <div class="d-flex">
                           <label style="width: 150px;">Price</label>
                           <p class="mx-3">:</p>
                           <p>Rp <?= number_format($product['price'], 0, ',', '.'); ?></p>
                        </div>
                        <div class="d-flex">
                           <label style="width: 150px;">Quantity</label>
                           <p class="mx-3">:</p>
                           <p>1</p>
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
            }
            } else {
               echo '<p class="empty">no products added yet!</p>';
            }
            ?>
         </div>
      </section>
      <!-- Menu Latest Dishes End -->
      <!-- List Menu Start -->
      <section class="list-menu">
      <h1 class="title">OUR <span>MENU</span></h1>
         <div class="col-md-12">
            <div class="row content">
               <div class="col-md-6 m-0 menu">
                  <h3>Coffee</h3>
                  <?php
                     $sql_product = "SELECT * FROM tbl_product WHERE category = 'coffee' ORDER BY id DESC LIMIT 10";
                     $query_product = mysqli_query($conn, $sql_product);
                     if (mysqli_num_rows($query_product) > 0) {
                        while ($product = mysqli_fetch_array($query_product)) {
                        ?>
                  <div class="d-flex w-100 justify-content-between">
                     <p><?= $product['name']; ?></p>
                     <p>Rp <?= number_format($product['price'], 0, ',', '.'); ?></p>
                  </div>
                  <?php
                     }
                     } else {
                        echo '<p class="empty">no products added yet!</p>';
                     }
                  ?>
                  <div class="d-flex w-100 justify-content-center my-3">
                     <a href="category.php?category=coffee">
                        <button class="btn">View All</button>
                     </a>
                  </div>
               </div>
               <div class="col-md-6 p-0 m-0 image-menu">
                  <img src="assets/img/menu-img1.png">
               </div>
            </div>
            <div class="row content">
               <div class="col-md-6 p-0 m-0 image-menu">
                  <img src="assets/img//menu-img2.png">
               </div>
               <div class="col-md-6 m-0 menu">
                  <h3>Tea</h3>
                  <?php
                     $sql_product = "SELECT * FROM tbl_product WHERE category = 'tea' ORDER BY id DESC LIMIT 10";
                     $query_product = mysqli_query($conn, $sql_product);
                     if (mysqli_num_rows($query_product) > 0) {
                        while ($product = mysqli_fetch_array($query_product)) {
                        ?>
                  <div class="d-flex w-100 justify-content-between">
                     <p><?= $product['name']; ?></p>
                     <p>Rp <?= number_format($product['price'], 0, ',', '.'); ?></p>
                  </div>
                  <?php
                     }
                     } else {
                        echo '<p class="empty">no products added yet!</p>';
                     }
                  ?>
                  <div class="d-flex w-100 justify-content-center my-3">
                     <a href="category.php?category=tea">
                        <button class="btn">View All</button>
                     </a>
                  </div>
               </div>
            </div>
            <div class="row content">
               <div class="col-md-6 m-0 menu">
                  <h3>Dessert</h3>
                  <?php
                     $sql_product = "SELECT * FROM tbl_product WHERE category = 'dessert' ORDER BY id DESC LIMIT 10";
                     $query_product = mysqli_query($conn, $sql_product);
                     if (mysqli_num_rows($query_product) > 0) {
                        while ($product = mysqli_fetch_array($query_product)) {
                        ?>
                  <div class="d-flex w-100 justify-content-between">
                     <p><?= $product['name']; ?></p>
                     <p>Rp <?= number_format($product['price'], 0, ',', '.'); ?></p>
                  </div>
                  <?php
                     }
                     } else {
                        echo '<p class="empty">no products added yet!</p>';
                     }
                  ?>
                  <div class="d-flex w-100 justify-content-center my-3">
                     <a href="category.php?category=dessert">
                        <button class="btn">View All</button>
                     </a>
                  </div>
               </div>
               <div class="col-md-6 p-0 m-0 image-menu">
                  <img src="assets/img/menu-img3.png">
               </div>
            </div>
         </div>
      </section>
      <!-- List Menu End -->
   </div>
   <!-- Footer Start  -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>