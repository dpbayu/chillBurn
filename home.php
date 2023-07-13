<!-- PHP -->
<?php
   session_start();
   require 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
   };
   require 'components/add_cart.php';
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require 'partials/head.php'; ?>
<!-- Head End -->

<body>
   <!-- Loader Start -->
   <!-- <div class="loader">
      <img src="images/loader.gif">
   </div> -->
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
                  <img src="assets/img/img-1.png" alt="">
                  <div class="text">
                     <p>01</p>
                     <h3>fun hangout</h3>
                  </div>
               </div>
               <div class="box">
                  <img src="assets/img/img-2.png" alt="">
                  <div class="text">
                     <p>02</p>
                     <h3>comfortable place to be alone</h3>
                  </div>
               </div>
               <div class="box">
                  <img src="assets/img/img-3.png" alt="">
                  <div class="text">
                     <p>03</p>
                     <h3>can also be used for meetings</h3>
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
                  <img src="assets/img/Image-1.png" alt="history img">
               </div>
               <div class="col-md-6">
                  <div class="content">
                     <h3>our history</h3>
                     <h2>Cursus habitasse <span>neque</span></h2>
                     <p>Our incredibly rare beans come from humble beginnings in Yemen, where decades of political
                        turmoil once forced local farmers to start growing Khat, a narcotic native to the Arabian Peninsula.</p>
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
         <h1 class="title">popular <span>menu</span></h1>
         <div class="container" x-data="{ tab: 'fast food' }">
            <!-- Menu -->
            <ul class="menu">
               <li>
                  <a href="#" @click.prevent="tab = 'fast food'">Fast Food</a>
               </li>
               <li>
                  <a href="#" @click.prevent="tab = 'main dish'">Main Dish</a>
               </li>
               <li>
                  <a href="#" @click.prevent="tab = 'desserts'">Desserts</a>
               </li>
               <li>
                  <a href="#" @click.prevent="tab = 'drinks'">Drinks</a>
               </li>
            </ul>
            <div class="content">
               <!-- Fast Food Start -->
               <div x-show="tab === 'main dish'" class="my-5">
                  <div class="box-container">
                     <div class="box">
                        <div class="content">
                           <img src="assets/img/menu/tea/Tea.png" alt="menu">
                           <div class="text">
                              <h2>Espresso</h2>
                              <p>This most basic coffee drink is usually served in demitasse</p>
                              <h3>Rp 10.000</h3>
                           </div>
                        </div>
                     </div>
                     <div class="box">
                        <div class="content">
                           <img src="assets/img/menu/tea/Tea.png" alt="menu">
                           <div class="text">
                              <h2>Espresso</h2>
                              <p>This most basic coffee drink is usually served in demitasse</p>
                              <h3>Rp 10.000</h3>
                           </div>
                        </div>
                     </div>
                     <div class="box">
                        <div class="content">
                           <img src="assets/img/menu/tea/Tea.png" alt="menu">
                           <div class="text">
                              <h2>Espresso</h2>
                              <p>This most basic coffee drink is usually served in demitasse</p>
                              <h3>Rp 10.000</h3>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a href="category.php?category=fast food">
                     <button class="btn">view all</button>
                  </a>
               </div>
               <!-- Fast Food End -->
               <!-- Main Dish Start -->
               <div x-show="tab === 'fast food'" class="my-5">
                  <div class="box-container">
                     <div class="box">
                        <div class="content">
                           <img src="assets/img/menu/coffee/Coffee.png" alt="menu">
                           <div class="text">
                              <h2>Espresso</h2>
                              <p>This most basic coffee drink is usually served in demitasse</p>
                              <h3>Rp 10.000</h3>
                           </div>
                        </div>
                     </div>
                     <div class="box">
                        <div class="content">
                           <img src="assets/img/menu/coffee/Coffee.png" alt="menu">
                           <div class="text">
                              <h2>Espresso</h2>
                              <p>This most basic coffee drink is usually served in demitasse</p>
                              <h3>Rp 10.000</h3>
                           </div>
                        </div>
                     </div>
                     <div class="box">
                        <div class="content">
                           <img src="assets/img/menu/coffee/Coffee.png" alt="menu">
                           <div class="text">
                              <h2>Espresso</h2>
                              <p>This most basic coffee drink is usually served in demitasse</p>
                              <h3>Rp 10.000</h3>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a href="category.php?category=fast food">
                     <button class="btn">view all</button>
                  </a>
               </div>
               <!-- Main Dish End -->
               <!-- Dessert Start -->
               <div x-show="tab === 'desserts'" class="my-5">
                  <div class="box-container">
                     <div class="box">
                        <div class="content">
                           <img src="assets/img/menu/dessert/Dessert.png" alt="menu">
                           <div class="text">
                              <h2>Peanut Chessecake</h2>
                              <p>Cheesecake is a sweet dessert consisting of one or more layers</p>
                              <h3>Rp 30.000</h3>
                           </div>
                        </div>
                     </div>
                     <div class="box">
                        <div class="content">
                           <img src="assets/img/menu/dessert/Dessert.png" alt="menu">
                           <div class="text">
                              <h2>Peanut Chessecake</h2>
                              <p>Cheesecake is a sweet dessert consisting of one or more layers</p>
                              <h3>Rp 30.000</h3>
                           </div>
                        </div>
                     </div>
                     <div class="box">
                        <div class="content">
                           <img src="assets/img/menu/dessert/Dessert.png" alt="menu">
                           <div class="text">
                              <h2>Peanut Chessecake</h2>
                              <p>Cheesecake is a sweet dessert consisting of one or more layers</p>
                              <h3>Rp 30.000</h3>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a href="category.php?category=desserts">
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
            <h1 class="title">product of the <span>week</span></h1>
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
            <div class="more-btn">
               <a href="menu.php" class="btn">view all</a>
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
      </section>
      <!-- Blog End -->
   </div>
   <!-- Subscribe Start -->
   <section class="subscribe">
      <div class="content">
         <h1 class="title text-white">subscribe to our newsletter and <span>youtube</span></h1>
         <p>enter your email</p>
         <form action="">
            <input type="text" placeholder="your email">
         </form>
         <button class="btn" type="submit">subscribe</button>
      </div>
   </section> <!-- Subscribe End -->
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