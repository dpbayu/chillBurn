<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
   };
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
   <section class="user-details">
      <div class="user">
         <img src="images/user-icon.png" alt="">
         <p><i class="fas fa-user"></i><span><span><?= $user['name']; ?></span></span></p>
         <p><i class="fas fa-phone"></i><span><?= $user['number']; ?></span></p>
         <p><i class="fas fa-envelope"></i><span><?= $user['email']; ?></span></p>
         <a href="update_profile.php" class="btn">update info</a>
         <p class="address"><i
               class="fas fa-map-marker-alt"></i><span><?php if($user['address'] == ''){echo 'please enter your address';}else{echo $user['address'];} ?></span>
         </p>
         <a href="update_address.php" class="btn">update address</a>
      </div>
   </section>
   <!-- Footer Start -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>