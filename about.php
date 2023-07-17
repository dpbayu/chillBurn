<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
   };
   $page = 'about';
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
      <img src="images/loader.gif">
   </div>
   <!-- Loader End -->
   <!-- Header Start  -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <!-- Header Start -->
   <div class="about-hero">
      <div class="container">
         <div class="content">
            <div class="heading">
               <h3>About Us</h3>
               <p><a href="home.php">home</a> <span> / about</span></p>
            </div>
         </div>
      </div>
   </div>
   <!-- Header End -->
   <div class="container">
      <!-- About Start 1 -->
      <section class="about-section1">
         <div class="row">
            <div class="grid-container">
               <div class="grid-item item1">
                  <img src="assets/img/about-img1.png">
               </div>
               <div class="grid-item item2">
                  <h3>About <span>our cafe</span></h3>
               </div>
               <div class="grid-item item3">
                  <p>This cafe was created in 2001 by an entrepreneur who wanted to create and develop his own cafe.
                     Together with his friends and support of his family, he finally managed to set up the cafe of his
                     dreams. A place that will make all who come will see and feel his struggle.</p>
                  <p>This cafe was created with a simple and attractive theme to attract customers, mostly young people.
                     In this cafe there is also a spot to take pictures to be shared with customers social media. This
                     cafe is made for those who are looking for a place to just hang out or to relax with friends.</p>
               </div>
               <div class="grid-item item4">
                  <img src="assets/img/about-img2.png">
               </div>
            </div>
         </div>
      </section>
      <!-- About End 1 -->
      <!-- Review End  -->
      <section class="reviews">
         <h1 class="title">customer's reviews</h1>
         <div class="swiper reviews-slider">
            <div class="swiper-wrapper">
               <div class="swiper-slide slide">
                  <img src="images/pic-1.png">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum molestias
                     ut earum nulla sint voluptatum labore nemo.</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
                  <h3>john deo</h3>
               </div>
               <div class="swiper-slide slide">
                  <img src="images/pic-2.png">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum molestias
                     ut earum nulla sint voluptatum labore nemo.</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
                  <h3>john deo</h3>
               </div>
               <div class="swiper-slide slide">
                  <img src="images/pic-3.png">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum molestias
                     ut earum nulla sint voluptatum labore nemo.</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
                  <h3>john deo</h3>
               </div>
               <div class="swiper-slide slide">
                  <img src="images/pic-4.png">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum molestias
                     ut earum nulla sint voluptatum labore nemo.</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
                  <h3>john deo</h3>
               </div>
               <div class="swiper-slide slide">
                  <img src="images/pic-5.png">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum molestias
                     ut earum nulla sint voluptatum labore nemo.</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
                  <h3>john deo</h3>
               </div>
               <div class="swiper-slide slide">
                  <img src="images/pic-6.png">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum molestias
                     ut earum nulla sint voluptatum labore nemo.</p>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
                  <h3>john deo</h3>
               </div>
            </div>
            <div class="swiper-pagination"></div>
         </div>
      </section>
      <!-- Reviews End -->
      <!-- About Start 2 -->
      <section class="about-section2">
         <div class="row">
            <div class="grid-container">
               <div class="grid-item item1">
                  <h3>About <span>our coffee</span></h3>
               </div>
               <div class="grid-item item2">
                  <img src="assets/img/about-img3.png" alt="">
               </div>
               <div class="grid-item item3">
                  <img src="assets/img/about-img4.png" alt="">
               </div>
               <div class="grid-item item4">
                  <p>The coffee in this cafe uses very good and good quality coffee beans. These coffee beans are
                     obtained from coffee farmers who have collaborated with this cafe to produce the best coffee.
                     This coffee bean has passed many tests and trials to produce the best coffee in this cafe.</p>
                  <p>We process coffee beans using technology to produce the best coffee. We serve the best quality
                     coffee for customers who come to our cafe. And we promise to make your moment of enjoying
                     coffee really worth enjoying.</p>
               </div>
            </div>
         </div>
      </section>
      <!-- About End 2 -->
      <!-- About Start 3 -->
      <section class="about-section3">
         <div class="row">
            <div class="col-md-4">
               <h2>Come to <span>visit us.</span></h2>
            </div>
            <div class="col-md-8">
               <img src="assets/img/about-img5.png">
            </div>
         </div>
      </section>
      <!-- About End 3 -->
   </div>
   <!-- Footer Start  -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
   <!-- Custom JS  -->
   <script src="assets/js/script.js"></script>
   <script>
      var swiper = new Swiper(".reviews-slider", {
         loop: true,
         grabCursor: true,
         spaceBetween: 20,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
         breakpoints: {
            0: {
               slidesPerView: 1,
            },
            700: {
               slidesPerView: 2,
            },
            1024: {
               slidesPerView: 3,
            },
         },
      });
   </script>
   <!-- JS End -->
</body>

</html>