<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
   };
   if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $number = $_POST['number'];
      if (!empty($name)) {
         // PDO Method
         // $update_name = $conn->prepare("UPDATE tbl_user SET name = ? WHERE id = ?");
         // $update_name->execute([$name, $user_id]);
         // Mysqli Method
         $sql_name = "UPDATE tbl_user SET name = '$name' WHERE id = '$user_id'";
         $query_name = mysqli_query($conn, $sql_name);
         $message[] = 'Update name succesfully!';
      }
      if (!empty($email)) {
         // PDO Method
         // $select_email = $conn->prepare("SELECT * FROM tbl_user WHERE email = ?");
         // $select_email->execute([$email]);
         // if ($select_email->rowCount() > 0) {
         //    $message[] = 'email already taken!';
         // } else {
         //    $update_email = $conn->prepare("UPDATE tbl_user SET email = ? WHERE id = ?");
         //    $update_email->execute([$email, $user_id]);
         // }
         // Mysqli Method
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
         // PDO Method
         // $select_number = $conn->prepare("SELECT * FROM tbl_user WHERE number = ?");
         // $select_number->execute([$number]);
         // if ($select_number->rowCount() > 0) {
         //    $message[] = 'number already taken!';
         // } else {
         //    $update_number = $conn->prepare("UPDATE tbl_user SET number = ? WHERE id = ?");
         //    $update_number->execute([$number, $user_id]);
         // }
         // Mysqli Method
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
      // PDO Method  
      // $select_prev_pass = $conn->prepare("SELECT password FROM tbl_user WHERE id = ?");
      // $select_prev_pass->execute([$user_id]);
      // $fetch_prev_pass = $select_prev_pass->fetch(PDO::FETCH_ASSOC);
      // Mysqli Method
      if (!empty($old_password)) {
         $old_password = $_POST['old_password'];
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
            // PDO Method
            // $update_pass = $conn->prepare("UPDATE tbl_user SET password = ? WHERE id = ?");
            // $update_pass->execute([$confirm_password, $user_id]);
            // Mysqli Method
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_password = "UPDATE tbl_user SET password = '$new_password' WHERE id = '$user_id'";
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
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateInfo">
            update info
         </button>
         <p class="address"><i
               class="fas fa-map-marker-alt"></i><span><?php if ($user['address'] == ''){echo 'Please enter your address';}else{echo $user['address'];} ?></span>
         </p>
         <a href="update_address.php" class="btn">update address</a>
      </div>
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
                     <input type="submit" value="update now" class="btn" name="submit">
                  </div>
               </form>
            </div>
         </div>
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