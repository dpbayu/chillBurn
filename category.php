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
               <h3>FOOD CATEGORY</h3>
               <p><a href="home.php">Home</a> <span> / Food Category</span></p>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <section class="menu">
         <h1 class="title">FOOD <span>CATEGORY</span></h1>
         <div class="box-container">
            <?php
               $category = $_GET['category'];
               $sql_category = "SELECT * FROM tbl_product WHERE category = '$category'";
               $query_category = mysqli_query($conn, $sql_category);
               if (mysqli_num_rows($query_category) > 0) {
                  while ($category = mysqli_fetch_array($query_category)) {
               ?>
                  <form class="box" action="" method="POST">
                     <input type="hidden" name="product_id" value="<?= $category['id']; ?>">
                     <input type="hidden" name="name" value="<?= $category['name']; ?>">
                     <input type="hidden" name="price" value="<?= $category['price']; ?>">
                     <input type="hidden" name="image" value="<?= $category['image']; ?>">
                     <button type="button" data-bs-toggle="modal" data-bs-target="#modal<?= $category['id'] ?>"
                        class="fas fa-eye"></button>
                     <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                     <img src="assets/img/uploaded_img/<?= $category['image']; ?>" alt="" width="300" height="300">
                     <div class="content">
                        <a href="category.php?category=<?= $category['category']; ?>"
                           class="cat"><?= $category['category']; ?></a>
                        <p class="name"><?= $category['name']; ?></p>
                        <div class="flex">
                           <div class="price"><span>$ </span><?= $category['price']; ?></div>
                           <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                        </div>
                     </div>
                  </form>
                  <!-- Modal Start -->
                  <div class="modal fade" id="modal<?= $category['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Menu <span
                                    class="fw-bold"><?= $category['name']; ?></span></h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <div class="text-center mb-3">
                                 <img src="assets/img/uploaded_img/<?= $category['image']; ?>" width="250" height="250"
                                    alt="Image <?= $category['name'] ?>">
                              </div>
                              <div class="d-flex">
                                 <label style="width: 150px;">Name</label>
                                 <p class="mx-3">:</p>
                                 <p><?= $category['name']; ?></p>
                              </div>
                              <div class="d-flex">
                                 <label style="width: 150px;">Category</label>
                                 <p class="mx-3">:</p>
                                 <a href="category.php?category=<?= $category['category']; ?>"><?= $category['category'] ?></a>
                              </div>
                              <div class="d-flex">
                                 <label style="width: 150px;">Price</label>
                                 <p class="mx-3">:</p>
                                 <p>$ <?= $category['price']; ?></p>
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
                  echo '<p class="empty">No products</p>';
               }
               ?>
         </div>
      </section>
   </div>
   <!-- Footer Start -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>