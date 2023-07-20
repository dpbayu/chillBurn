<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
      header('location:index.php');
   };
   if (isset($_POST['submit'])) {
      $address = $_POST['street'].', '.$_POST['district'].', '.$_POST['subdistrict'] .', '. $_POST['city'] .' - '. $_POST['pin_code'];
      $sql_address = "UPDATE tbl_user SET address = '$address' WHERE id = '$user_id'";
      $query_address = mysqli_query($conn, $sql_address);
      $message[] = 'Address saved!';
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
      <img src="assets/img/loader.gif" alt="">
   </div>
   <!-- Loader End -->
   <!-- Header Start  -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <section class="form-container">
      <div class="container">
         <form action="" method="POST">
            <h3>your address</h3>
            <div class="mb-3">
               <label class="form-label">Street</label>
               <input type="text" class="form-control" placeholder="Street" name="street" required>
            </div>
            <div class="mb-3">
               <label class="form-label">District</label>
               <input type="text" class="form-control" placeholder="District" name="district" required>
            </div>
            <div class="mb-3">
               <label class="form-label">Subdistrict</label>
               <input type="text" class="form-control" placeholder="Subdistrict" name="subdistrict" required>
            </div>
            <div class="mb-3">
               <label class="form-label">City</label>
               <input type="text" class="form-control" placeholder="City" name="city" required>
            </div>
            <div class="mb-3">
               <label class="form-label">Pin Code</label>
               <input type="number" class="form-control" placeholder="Pin Code" name="pin_code" maxlength="50" required>
            </div>
            <input type="submit" value="Save Address" name="submit" class="btn">
         </form>
      </div>
   </section>
   <!-- Footer Start  -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>