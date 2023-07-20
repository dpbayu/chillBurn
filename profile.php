<!-- PHP -->
<?php
   session_start();
   require 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
   };
   if (isset($_POST['update_profile'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $number = $_POST['number'];
      if (!empty($name)) {
         $sql_name = "UPDATE tbl_user SET name = '$name' WHERE id = '$user_id'";
         $query_name = mysqli_query($conn, $sql_name);
         $message[] = 'Update name succesfully!';
      }
      if (!empty($email)) {
         $sql_email = "SELECT * FROM tbl_user WHERE email = '$email'";
         $query_email = mysqli_query($conn, $sql_email);
         if (mysqli_num_rows($query_email) > 0) {
            $message[] = 'Email already taken!';
         } else {
            $update_email = "UPDATE tbl_user SET email = '$email' WHERE id = '$user_id'";
            $email = mysqli_query($conn, $update_email);
            $message[] = 'Update email succesfully!';
         }
      }
      if (!empty($number)) {
         $sql_number = "SELECT * FROM tbl_user WHERE number = '$number'";
         $query_number = mysqli_query($conn, $sql_number);
         if (mysqli_num_rows($query_number) > 0) {
            $message[] = 'Number already taken!';
         } else {
            $update_number = "UPDATE tbl_user SET number = '$number' WHERE id = '$user_id'";
            $number = mysqli_query($conn, $update_number);
            $message[] = 'Update number succesfully!';
         }
      }
      $old_password = $_POST['old_password'];
      if (!empty($old_password)) {
         $new_password = $_POST['new_password'];
         $confirm_password = $_POST['confirm_password'];
         $sql_password = "SELECT * FROM tbl_user WHERE id = '$user_id'";
         $query_password = mysqli_query($conn, $sql_password);
         $row = mysqli_fetch_array($query_password);
         if (empty ($old_password)) {
            $message[] = 'Enter old password!';
         } elseif (empty($new_password)) {
            $message[] = 'Enter new password!';
         } elseif ($confirm_password != $new_password) {
            $message[] = 'Both password do not match!';
         } else {
            $hash = password_hash($new_password, PASSWORD_DEFAULT);
            $update_password = "UPDATE tbl_user SET password = '$hash' WHERE id = '$user_id'";
            $query_update_password = mysqli_query($conn, $update_password);
            $message[] = 'Password updated successfully!';
         }
      }
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
      <img src="assets/img/loader.gif">
   </div>
   <!-- Loader End -->
   <!-- Header Start  -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <section class="profile">
      <div class="container">
         <div class="user">
            <img src="assets/img/user-icon.png">
            <p><i class="fas fa-user"></i><span><span><?= $user['name']; ?></span></span></p>
            <p><i class="fas fa-phone"></i><span><?= $user['number']; ?></span></p>
            <p><i class="fas fa-envelope"></i><span><?= $user['email']; ?></span></p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateInfo">
               Update Info
            </button>
            <p class="address"><i
                  class="fas fa-map-marker-alt"></i><span><?php if ($user['address'] == ''){echo 'Please enter your address';}else{echo $user['address'];} ?></span>
            </p>
            <a href="update_address.php" class="btn">Update Address</a>
         </div>
         <!-- Modal Start -->
         <div class="modal fade" id="updateInfo" tabindex="-1" aria-labelledby="updateInfo" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content p-3">
                  <div class="modal-header">
                     <h1 class="modal-title fs-5" id="updateInfo">UPDATE PROFILE <?= $user['name'] ?></h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form class="mt-3" action="" method="POST">
                     <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="<?= $user['name']; ?>">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="<?= $user['email']; ?>">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Number</label>
                        <input type="number" class="form-control" name="number" placeholder="<?= $user['number']; ?>"
                           maxlength="12">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Old Password</label>
                        <input type="password" class="form-control" name="old_password"
                           placeholder="Enter your old password">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" name="new_password"
                           placeholder="Enter your new password">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password"
                           placeholder="Confirm your new password">
                     </div>
                     <div class="modal-footer">
                        <input type="submit" value="Update Now" class="btn" name="update_profile">
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- Modal End -->
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