<!-- Footer Start -->
<footer class="footer">
   <div class="container">
      <div class="box-container">
         <div class="grid">
            <div class="box">
               <h3>OPENING HOURS</h3>
               <p>Monday - Friday: 00:07 am to 00:10 pm</p>
               <p>Saturday - Sunday: 00:07 am to 00:10 pm</p>
            </div>
            <div class="box">
               <h3>OUR ADDRESS</h3>
               <p>Zamrud VI Blok A-7 No 5</p>
               <p>Kembangan, Jakarta Barat, IDN</p>
            </div>
            <div class="box">
               <h3>CONTACT US</h3>
               <a href="tel:089604333574">089-604-333-574</a>
               <a href="mailto:dwiputrabayu19@gmail.com">Dwiputrabayu19@gmail.com</a>
            </div>
         </div>
         <div class="social-media">
            <a href=""><i class="fas fa-brands fa-instagram"></i></a>
            <a href=""><i class="fas fa-brands fa-square-facebook"></i></a>
            <a href=""><i class="fas fa-brands fa-square-twitter"></i></a>
            <a href=""><i class="fas fa-brands fa-snapchat"></i></a>
         </div>
      </div>
      <div class="flex">
         <a href="index.php"><img src="assets/img/Logo.png" alt="logo" width="100"></a>
         <nav class="navbar">
            <li class="nav-item">
               <a class="nav-link <?php if ($page == 'home') {echo 'active';} ?>" href="index.php">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link <?php if ($page == 'about') {echo 'active';} ?>" href="about.php">About</a>
            </li>
            <li class="nav-item">
               <a class="nav-link <?php if ($page == 'menu') {echo 'active';} ?>" href="menu.php">Menu</a>
            </li>
            <li class="nav-item">
               <a class="nav-link <?php if ($page == 'order') {echo 'active';} ?>" href="order.php">Order</a>
            </li>
            <li class="nav-item">
               <a class="nav-link <?php if ($page == 'contact') {echo 'active';} ?>" href="contact.php">Contact</a>
            </li>
         </nav>
      </div>
   </div>
   <div class="credit">&copy; Copyright @ <?= date('Y'); ?> by <span>Dwi Putra Bayu Oktantyo</span> | All Right
      Reserved!</div>
</footer>
<!-- Footer End -->
<!-- JS Start -->
<!-- <script src="https://kit.fontawesome.com/e4027260b9.js" crossorigin="anonymous"></script> -->
<!-- Datables -->
<!-- <script src="assets/libs/dataTables/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
   integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
   integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
   integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
   integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/e4027260b9.js" crossorigin="anonymous"></script>
<script>
   let nav = document.querySelector("nav");
   window.onscroll = function () {
      if (document.documentElement.scrollTop > 20) {
         nav.classList.add("sticky");
      } else {
         nav.classList.remove("sticky");
      }
   }
   $(function () {
      $(window).resize(function () {
         if (window.matchMedia('(max-width: 1024px)')) {
            $('#navbarSupportedContent').addClass('show');
         } else {
            $('#navbarSupportedContent').removeClass('show');
         }
      });
   });
</script>
<!-- JS End -->