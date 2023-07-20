<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
   };
   include 'function.php';
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
   <div class="simple-hero">
      <div class="container">
         <div class="content">
            <div class="heading">
               <h3>SEARCH</h3>
               <p><a href="index.php">Home</a> <span> / Search</span></p>
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
               $sql_product = "SELECT * FROM tbl_product WHERE name LIKE '%{$search_box}%'";
               $query_product = mysqli_query($conn, $sql_product);
               if (mysqli_num_rows($query_product) > 0) {
                  while ($product = mysqli_fetch_assoc($query_product)) {
            ?>
            <form class="box" action="" method="POST">
               <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
               <input type="hidden" name="name" value="<?= $product['name']; ?>">
               <input type="hidden" name="price" value="<?= $product['price']; ?>">
               <input type="hidden" name="image" value="<?= $product['image']; ?>">
               <button type="button" data-bs-toggle="modal" data-bs-target="#modal<?= $product['id'] ?>"
                  class="fas fa-eye"></button>
               <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
               <img src="assets/img/uploaded_img/<?= $product['image']; ?>" alt="" width="300" height="300">
               <div class="content">
                  <a href="category.php?category=<?= $product['category']; ?>"
                     class="cat"><?= $product['category']; ?></a>
                  <p class="name"><?= $product['name']; ?></p>
                  <div class="flex">
                     <p class="price">$ <span><?= $product['price']; ?></span></p>
                     <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                  </div>
               </div>
            </form>
            </form>
            <!-- Modal Start -->
            <div class="modal fade" id="modal<?= $product['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
               aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Menu <span><?= $product['name'] ?></span></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <div class="text-center mb-3">
                           <img src="assets/img/uploaded_img/<?= $product['image']; ?>" width="250" height="250"
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
                           <p>$ <?= $product['price'] ?></p>
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
               echo '<p class="empty">no products yet!</p>';
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