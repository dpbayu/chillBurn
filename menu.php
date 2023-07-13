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
   <div class="menu-hero">
      <div class="container">
         <div class="content">
            <div class="heading">
               <h3>menu</h3>
               <p><a href="home.php">home</a> <span> / menu</span></p>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <!-- Menu Start  -->
      <section class="menu">
         <h1 class="title">latest dishes</h1>
         <div class="box-container">
               <?php
               // PDO Method
               // $select_products = $conn->prepare("SELECT * FROM tbl_product ORDER BY id DESC LIMIT 3");
               // $select_products->execute();
               // if ($select_products->rowCount() > 0) {
               //    while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
               // Mysqli Method
               $sql_product = "SELECT * FROM tbl_product ORDER BY id DESC LIMIT 3";
               $query_product = mysqli_query($conn, $sql_product);
               if (mysqli_num_rows($query_product) > 0) {
                  while ($product = mysqli_fetch_array($query_product)) {
               ?>
               <form action="" method="POST" class="box">
                  <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                  <input type="hidden" name="name" value="<?= $product['name']; ?>">
                  <input type="hidden" name="price" value="<?= $product['price']; ?>">
                  <input type="hidden" name="image" value="<?= $product['image']; ?>">
                  <a href="quick_view.php?product_id=<?= $product['id']; ?>" class="fas fa-eye"></a>
                  <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                  <img src="assets/img/uploaded_img/<?= $product['image']; ?>" alt="" width="300" height="300">
                  <br>
                  <a href="category.php?category=<?= $product['category']; ?>"
                     class="cat"><?= $product['category']; ?></a>
                  <div class="name"><?= $product['name']; ?></div>
                  <div class="flex">
                     <div class="price"><span>$</span><?= $product['price']; ?></div>
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
      <!-- Menu End -->
      <section class=" my-5">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-6">
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
               </div>
               <div class="col-md-6">
                  <img src="assets/img/img-1.png" alt="" style="width: 100%;">
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <img src="assets/img/img-1.png" alt="" style="width: 100%;">
               </div>
               <div class="col-md-6">
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                     <p class="fs-2">thai tea</p>
                     <p class="fs-2">90.000</p>
                  </div>
               </div>
               <div class="col-md-6">
                  <img src="assets/img/img-1.png" alt="" style="width: 100%;">
               </div>
            </div>
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