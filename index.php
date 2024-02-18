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
      <img src="assets/img/loader.gif">
   </div>
   <!-- Loader End -->
   <!-- Header Start -->
   <?php require 'partials/header.php'; ?>
   <!-- Header End -->
   <!-- Hero Start -->
   <div class="hero"></div>
   <div class="hero-content">
      <div class="container">
         <div class="box-1">
            <h2>START THE MORNING <span>WITH A COFFEE</span></h2>
            <p>A place to experience the delights of modern coffee art! It offers its guest scrumption dessert,
               tasty coffee and, of course, warmth</p>
            <div class="more-btn">
               <a href="menu.php" class="btn"><i class="fas fa-shopping-cart me-3"></i>Orders</a>
            </div>
         </div>
         <div class="box-2">
            <div class="social-media">
               <i class="fas fa-brands fa-instagram me-3"></i>
               <i class="fas fa-brands fa-square-facebook me-3"></i>
               <i class="fas fa-brands fa-square-twitter me-3"></i>
            </div>
            <div class="download">
               <a href="menu.php" class=" btn btn-secondary"><i class="fas fa-brands fa-apple me-3"></i>Apple</a>
               <a href="menu.php" class=" btn btn-secondary"><i class="fas fa-brands fa-android me-3"></i>Play Store</a>
            </div>
         </div>
      </div>
   </div>
   <!-- Hero End -->
   <!-- Overview Start -->
   <section class="overview" id="overview">
      <div class="col-md-12">
         <div class="row m-0 p-0">
            <div class="col-md-6 p-0">
               <img src="assets/img/img-history.png">
            </div>
            <div class="col-md-6">
               <div class="content">
                  <div class="title">Our History</div>
                  <div class="subtitle">Introduction in <span>Chill & Burn</span></div>
                  <p>Coffee Shop Chill&Burn is a trendy and vibrant coffee shop that aims to create a welcoming and
                     relaxed atmosphere for coffee enthusiasts and those looking to unwind. Our coffee shop is
                     designed to be a perfect blend of a cozy space for chilling out and a hub for coffee lovers who
                     seek the perfect brew.</p>
                  <p>At Chill&Burn, we take pride in our exceptional coffee, diverse menu, and
                     commitment to creating memorable experiences for our customers.</p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Overview End -->
   <div class="container">
      <!-- Category Start -->
      <section class="category">
         <h1 class="title">POPULAR <span>MENU</span></h1>
         <div class="container" x-data="{ tab: 'coffee' }">
            <!-- Menu -->
            <ul class="menu">
               <li>
                  <a :class="{'active': tab === 'coffee'}" href="#" @click.prevent="tab = 'coffee'">Coffee</a>
               </li>
               <li>
                  <a :class="{'active': tab === 'tea'}" href="#" @click.prevent="tab = 'tea'">Tea</a>
               </li>
               <li>
                  <a :class="{'active': tab === 'dessert'}" href="#" @click.prevent="tab = 'dessert'">Dessert</a>
               </li>
            </ul>
            <div class="content">
               <!-- coffee Start -->
               <div x-show="tab === 'coffee'" class="my-5">
                  <div class="box-container">
                     <?php
                     $sql_product = "SELECT * FROM tbl_product WHERE category = 'coffee' LIMIT 6";
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
                           <img src="assets/img/menu/<?= $product['image']; ?>" alt="<?= $product['name'] ?>"
                              height="200" width="200">
                           <div class="text">
                              <div class="name"><?= $product['name']; ?></div>
                              <p>Rp <span><?= number_format($product['price'], 0, ',', '.'); ?></span></p>
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
                        echo '<p class="empty">No products added yet!</p>';
                     }
                     ?>
                  </div>
                  <a href="category.php?category=coffee">
                     <button class="btn">View All</button>
                  </a>
               </div>
               <!-- coffee End -->
               <!-- tea Start -->
               <div x-show="tab === 'tea'" class="my-5">
                  <div class="box-container">
                     <?php
                     $sql_product = "SELECT * FROM tbl_product WHERE category = 'tea' LIMIT 6";
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
                           <img src="assets/img/menu/<?= $product['image']; ?>" alt="<?= $product['name']; ?>"
                              height="200" width="200">
                           <div class="text">
                              <div class="name"><?= $product['name']; ?></div>
                              <p>Rp <span><?= number_format($product['price'], 0, ',', '.'); ?></span></p>
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
                        echo '<p class="empty">No products added yet!</p>';
                     }
                     ?>
                  </div>
                  <a href="category.php?category=tea">
                     <button class="btn">View All</button>
                  </a>
               </div>
               <!-- tea End -->
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
                           <img src="assets/img/menu/<?= $product['image']; ?>" alt="<?= $product['name']; ?>"
                              height="200" width="200">
                           <div class="text">
                              <div class="name"><?= $product['name']; ?></div>
                              <p>Rp <span><?= number_format($product['price'], 0, ',', '.'); ?></span></p>
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
                        echo '<p class="empty">No products added yet!</p>';
                     }
                     ?>
                  </div>
                  <a href="category.php?category=dessert">
                     <button class="btn">View All</button>
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
            <h1 class="title">MENU OF THE <span>WEEK</span></h1>
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
                  <button type="button" data-bs-toggle="modal" data-bs-target="#modal<?= $product['id']; ?>"
                     class="fas fa-eye"></button>
                  <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                  <img src="assets/img/menu/<?= $product['image']; ?>" width="300" height="300">
                  <div class="content">
                     <a href="category.php?category=<?= $product['category']; ?>"
                        class="cat"><?= $product['category']; ?></a>
                     <p class="name"><?= $product['name']; ?></p>
                     <div class="flex">
                        <p class="price">Rp <span><?= number_format($product['price'], 0, ',', '.'); ?></span></p>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                     </div>
                  </div>
               </form>
               <!-- Modal Start -->
               <div class="modal fade" id="modal<?= $product['id']; ?>" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h1 class="modal-title" id="exampleModalLabel">Menu <span><?= $product['name'] ?></span></h1>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <div class="text-center mb-3">
                              <img src="assets/img/menu/<?= $product['image']; ?>" alt="Image <?= $product['name']; ?>">
                           </div>
                           <div class="d-flex">
                              <label style="width: 150px;">Name</label>
                              <p class="mx-3">:</p>
                              <p><?= $product['name']; ?></p>
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
                              <p>Rp <?= $product['price']; ?></p>
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
               <a href="menu.php" class="btn">View All</a>
            </div>
         </div>
      </section>
      <!-- Product End -->
      <!-- Blog Start -->
      <section class="blog">
         <div class="container">
            <div class="grid-container">
               <div class="grid-item item1">
                  <div class="content">
                     <h1 class="title">READ OUR <span>BLOG</span></h1>
                     <p>Contains hot news from various regions about coffee and for coffee lovers</p>
                     <div class="more-btn">
                        <a href="menu.php" class="btn">View All</a>
                     </div>
                  </div>
               </div>
               <div class="grid-item item2">
                  <img src="assets/img/blog/blog 1.png" alt="">
                  <div class="content">
                     <h3>WHEN THE BEST TIME TO DRINK COFFEE ?</h3>
                     <div class="line"></div>
                  </div>
               </div>
               <div class="grid-item item3">
                  <img src="assets/img/blog/blog 2.png" alt="">
                  <div class="content">
                     <h3>HOW TO MAKE DELICIOUS COFFEE AT HOME ?</h3>
                     <div class="line"></div>
                  </div>
               </div>
               <div class="grid-item item4">
                  <img src="assets/img/blog/blog 3.png" alt="">
                  <div class="content">
                     <h3>IS IT HEALTHY TO DRINK TEA ?</h3>
                     <div class="line"></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Blog End -->
   </div>
   <!-- Subscribe Start -->
   <section id="subscribe">
      <div class="subscribe"></div>
      <div class="content">
         <h1 class="title">SUBSCRIBE TO OUR NEWSLETTER AND <span>YOUTUBE</span></h1>
         <form action="" method="">
            <input type="text" placeholder="Your email">
            <button type="submit" class="send">
               <i class="fa fa-send"></i>
            </button>
         </form>
      </div>
   </section>
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