<!-- PHP -->
<?php
   session_start();
   require 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
   };
   require 'function.php';
   $page = 'home';
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require 'partials/head.php'; ?>
<!-- Head End -->

<body>
   <!-- Loader Start -->
   <div class="loader">
      <img src="images/loader.gif">
   </div>
   <!-- Loader End -->
   <!-- Header Start -->
   <?php require 'partials/header.php'; ?>
   <!-- Header End -->
   <!-- Hero Start -->
   <div class="hero">
      <div class="container">
         <div class="content">
            <div class="box-1">
               <h2>START THE MORNING <span>WITH A COFFEE</span></h2>
               <p>A place to experience the delights of modern coffee art! It offers its guest scrumption dessert,
                  tasty coffee and, of course, warmth</p>
               <div class="more-btn">
                  <a href="menu.php" class="btn"><i class="fas fa-shopping-cart me-3"></i>orders</a>
               </div>
            </div>
            <div class="box-2">
               <div class="social-media">
                  <i class="fas fa-brands fa-instagram me-3"></i>
                  <i class="fas fa-brands fa-square-facebook me-3"></i>
                  <i class="fas fa-brands fa-square-twitter me-3"></i>
               </div>
               <div class="download">
                  <a href="menu.php" class="btn"><i class="fas fa-brands fa-apple me-3"></i>apple</a>
                  <a href="menu.php" class="btn"><i class="fas fa-brands fa-android me-3"></i>play store</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Hero End -->
   <div class="container">
      <!-- Section 1 Start -->
      <section class="section-1">
         <div class="container">
            <div class="box-container">
               <div class="box">
                  <img src="assets/img/img-1.png">
                  <div class="text">
                     <p>01</p>
                     <h5>Fun hangout</h5>
                  </div>
               </div>
               <div class="box">
                  <img src="assets/img/img-2.png">
                  <div class="text">
                     <p>02</p>
                     <h5>Comfortable place to be alone</h5>
                  </div>
               </div>
               <div class="box">
                  <img src="assets/img/img-3.png">
                  <div class="text">
                     <p>03</p>
                     <h5>Can also be used for meetings</h5>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Section 1 End -->
      <!-- Section 2 Start -->
      <section class="section-2">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-6">
                  <img src="assets/img/image-1.png">
               </div>
               <div class="col-md-6">
                  <div class="content">
                     <h3>Our History</h3>
                     <h4>Cursus habitasse <span>neque</span></h4>
                     <p>Our incredibly rare beans come from humble beginnings in Yemen, where decades of political
                        turmoil once forced local farmers to start growing Khat, a narcotic native to the Arabian
                        Peninsula.</p>
                     <p>The Dawoodi Bohra Community changed this, removing all the Khat plants and replacing the with
                        coffee, bringing this humble brew back to its roots.</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Section 2 End -->
      <!-- Category Start -->
      <section class="category">
         <h1 class="title">POPULAR <span>MENU</span></h1>
         <div class="container" x-data="{ tab: 'main dish' }">
            <!-- Menu -->
            <ul class="menu">
               <li>
                  <a :class="{'active': tab === 'main dish'}" href="#" @click.prevent="tab = 'main dish'">Main
                     Dish</a>
               </li>
               <li>
                  <a :class="{'active': tab === 'drink'}" href="#" @click.prevent="tab = 'drink'">Drink</a>
               </li>
               <li>
                  <a :class="{'active': tab === 'dessert'}" href="#" @click.prevent="tab = 'dessert'">Dessert</a>
               </li>
            </ul>
            <div class="content">
               <!-- Main Dish Start -->
               <div x-show="tab === 'main dish'" class="my-5">
                  <div class="box-container">
                     <?php
                     $sql_product = "SELECT * FROM tbl_product WHERE category = 'main dish' LIMIT 6";
                     $query_product = mysqli_query($conn, $sql_product);
                     if (mysqli_num_rows($query_product) > 0) {
                        while ($product = mysqli_fetch_array($query_product)) {
                     ?>
                     <form class="box" action="" method="POST">
                        <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                        <input type="hidden" name="name" value="<?= $product['name']; ?>">
                        <input type="hidden" name="price" value="<?= $product['price']; ?>">
                        <input type="hidden" name="image" value="<?= $product['image']; ?>">
                        <div class="box-content">
                           <img src="assets/img/uploaded_img/<?= $product['image']; ?>" alt="<?= $product['name'] ?>"
                              height="200" width="200">
                           <div class="text">
                              <h6><?= $product['name'] ?></h6>
                              <p>$ <span><?= $product['price'] ?></span></p>
                              <div class="quantity">
                                 <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                                 <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                              </div>
                           </div>
                        </div>
                     </form>
                     <?php
                     }
                     } else {
                        echo '<p class="empty">No products!</p>';
                     }
                     ?>
                  </div>
                  <a href="category.php?category=main dish">
                     <button class="btn">view all</button>
                  </a>
               </div>
               <!-- Main Dish End -->
               <!-- Drink Start -->
               <div x-show="tab === 'drink'" class="my-5">
                  <div class="box-container">
                     <?php
                     $sql_product = "SELECT * FROM tbl_product WHERE category = 'drink' LIMIT 6";
                     $query_product = mysqli_query($conn, $sql_product);
                     if (mysqli_num_rows($query_product) > 0) {
                        while ($product = mysqli_fetch_array($query_product)) {
                     ?>
                     <form action="" method="POST" class="box">
                        <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                        <input type="hidden" name="name" value="<?= $product['name']; ?>">
                        <input type="hidden" name="price" value="<?= $product['price']; ?>">
                        <input type="hidden" name="image" value="<?= $product['image']; ?>">
                        <div class="box-content">
                           <img src="assets/img/uploaded_img/<?= $product['image']; ?>" alt="<?= $product['name'] ?>"
                              height="200" width="200">
                           <div class="text">
                              <h6><?= $product['name'] ?></h6>
                              <p>$ <span><?= $product['price'] ?></span></p>
                              <div class="quantity">
                                 <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                                 <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                              </div>
                           </div>
                        </div>
                     </form>
                     <?php
                     }
                     } else {
                        echo '<p class="empty">no products added yet!</p>';
                     }
                     ?>
                  </div>
                  <a href="category.php?category=drink">
                     <button class="btn">view all</button>
                  </a>
               </div>
               <!-- Drink End -->
               <!-- Dessert Start -->
               <div x-show="tab === 'dessert'" class="my-5">
                  <div class="box-container">
                     <?php
                     $sql_product = "SELECT * FROM tbl_product WHERE category = 'dessert' LIMIT 6";
                     $query_product = mysqli_query($conn, $sql_product);
                     if (mysqli_num_rows($query_product) > 0) {
                        while ($product = mysqli_fetch_array($query_product)) {
                     ?>
                     <form action="" method="POST" class="box">
                        <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                        <input type="hidden" name="name" value="<?= $product['name']; ?>">
                        <input type="hidden" name="price" value="<?= $product['price']; ?>">
                        <input type="hidden" name="image" value="<?= $product['image']; ?>">
                        <div class="box-content">
                           <img src="assets/img/uploaded_img/<?= $product['image']; ?>" alt="<?= $product['name'] ?>"
                              height="200" width="200">
                           <div class="text">
                              <h6><?= $product['name'] ?></h6>
                              <p>$ <span><?= $product['price'] ?></span></p>
                              <div class="quantity">
                                 <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                                 <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                              </div>
                           </div>
                        </div>
                     </form>
                     <?php
                     }
                     } else {
                        echo '<p class="empty">no products added yet!</p>';
                     }
                     ?>
                  </div>
                  <a href="category.php?category=dessert">
                     <button class="btn">view all</button>
                  </a>
               </div>
               <!-- Dessert End -->
            </div>
         </div>
      </section>
      <!-- Category End -->
      <!-- Product Start -->
      <section class="menu my-5">
         <div class="container">
            <h1 class="title">PRODUCT OF THE <span>WEEK</span></h1>
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
                  <img src="assets/img/uploaded_img/<?= $product['image']; ?>" width="300" height="300">
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
                              <img src="assets/img/uploaded_img/<?= $product['image']; ?>"
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
                              <a
                                 href="category.php?category=<?= $product['category']; ?>"><?= $product['category'] ?></a>
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
                  echo '<p class="empty">no products added yet!</p>';
               }
               ?>
            </div>
            <div class="more-btn">
               <a href="menu.php" class="btn">view all</a>
            </div>
         </div>
      </section>
      <!-- Product End -->
      <!-- Blog Start -->
      <!-- <section class="blog">
         <div class="container">
            <div class="grid-container">
               <div class="grid-item item1">
                  <div class="content">
                     <h1 class="title">read our <span>blog</span></h1>
                     <p>Contains hot news from various regions about coffee and for coffee lovers</p>
                     <div class="more-btn">
                        <a href="menu.php" class="btn">view all</a>
                     </div>
                  </div>
               </div>
               <div class="grid-item item2">
                  <img src="assets/img/blog/blog 1.png" alt="">
                  <h3>WHEN THE BEST TIME TO DRINK COFFEE</h3>
               </div>
               <div class="grid-item item3">
                  <img src="assets/img/blog/blog 2.png" alt="">
                  <h3>HOW TO MAKE DELICIOUS COFFEE AT HOME ?</h3>
               </div>
               <div class="grid-item item4">
                  <img src="assets/img/blog/blog 3.png" alt="">
                  <h3>IS IT HEALTHY TO DRINK TEA ?</h3>
               </div>
            </div>
         </div>
      </section> -->
      <!-- Blog End -->
   </div>
   <!-- Subscribe Start -->
   <div class="subscribe">
      <div class="content">
         <h1 class="title text-white">SUBSCRIBE TO OUR NEWSLETTER AND <span>youtube</span></h1>
         <p>ENTER YOUR EMAIL</p>
         <form action="">
            <input type="text" placeholder="Your Email">
         </form>
         <button class="btn" type="submit">subscribe</button>
      </div>
   </div>
   <!-- Subscribe End -->
   <!-- Footer Start -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
   <script src="assets/js/script.js"></script>
   <script>
      var swiper = new Swiper(".hero-slider", {
         loop: true,
         grabCursor: true,
         effect: "flip",
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
      });
   </script>
   <!-- JS End -->
</body>

</html>