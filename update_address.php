<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
      header('location:home.php');
   };
   if (isset($_POST['submit'])) {
      $address = $_POST['flat'] .', '.$_POST['building'].', '.$_POST['area'].', '.$_POST['town'] .', '. $_POST['city'] .', '. $_POST['state'] .', '. $_POST['country'] .' - '. $_POST['pin_code'];
      $address = filter_var($address, FILTER_SANITIZE_STRING);
      $update_address = $conn->prepare("UPDATE tbl_user set address = ? WHERE id = ?");
      $update_address->execute([$address, $user_id]);
      $message[] = 'address saved!';
      header('location:checkout.php');
   }
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
   <section class="form-container">
      <form action="" method="POST">
         <h3>your address</h3>
         <input type="text" class="box" placeholder="flat no." required maxlength="50" name="flat">
         <input type="text" class="box" placeholder="building no." required maxlength="50" name="building">
         <input type="text" class="box" placeholder="area name" required maxlength="50" name="area">
         <input type="text" class="box" placeholder="town name" required maxlength="50" name="town">
         <input type="text" class="box" placeholder="city name" required maxlength="50" name="city">
         <input type="text" class="box" placeholder="state name" required maxlength="50" name="state">
         <input type="text" class="box" placeholder="country name" required maxlength="50" name="country">
         <input type="number" class="box" placeholder="pin code" required max="999999" min="0" maxlength="6"
            name="pin_code">
         <input type="submit" value="save address" name="submit" class="btn">
      </form>
   </section>
   <!-- Footer Start  -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>