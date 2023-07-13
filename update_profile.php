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
            $message[] = 'email already taken!';
         } else {
            $update_email = "UPDATE tbl_user SET email = '$email' WHERE id = '$user_id'";
            $email = mysqli_query($conn, $update_email);
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
            $message[] = 'number already taken!';
         } else {
            $update_number = "UPDATE tbl_user SET number = '$number' WHERE id = '$user_id'";
            $number = mysqli_query($conn, $update_number);
         }
      }
      $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
      // PDO Method
      // $select_prev_pass = $conn->prepare("SELECT password FROM tbl_user WHERE id = ?");
      // $select_prev_pass->execute([$user_id]);
      // $fetch_prev_pass = $select_prev_pass->fetch(PDO::FETCH_ASSOC);
      // Mysqli Method
      $sql_prev_password = "SELECT password FROM tbl_user WHERE id = '$user_id'";
      $query_prev_password = mysqli_query($conn, $sql_prev_password);
      $prev_password = mysqli_fetch_assoc($query_prev_password);
      $prev_pass = $prev_password['password'];
      $old_password = $_POST['old_password'];
      $new_password = $_POST['new_password'];
      $confirm_password = $_POST['confirm_password'];
      if ($old_password != $empty_pass) {
         if ($old_password != $prev_pass) {
            $message[] = 'old password not matched!';
         } elseif ($new_password != $confirm_password) {
            $message[] = 'confirm password not matched!';
         } else {
            if ($new_password != $empty_pass) {
               // PDO Method
               // $update_pass = $conn->prepare("UPDATE tbl_user SET password = ? WHERE id = ?");
               // $update_pass->execute([$confirm_password, $user_id]);
               // Mysqli Method
               $update_password = "UPDATE tbl_user SET password = '$new_password' WHERE id = '$user_id'";
               $query_update_password = mysqli_query($conn, $update_password);
               $message[] = 'password updated successfully!';
            } else {
               $message[] = 'please enter a new password!';
            }
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
   <section class="form-container update-form">
      <form action="" method="POST">
         <h3>update profile</h3>
         <input type="text" name="name" placeholder="<?= $user['name']; ?>" class="box" maxlength="50">
         <input type="email" name="email" placeholder="<?= $user['email']; ?>" class="box" maxlength="50">
         <input type="number" name="number" placeholder="<?= $user['number']; ?>" class=" box" min="0"
            max="9999999999" maxlength="10">
         <input type="password" name="old_password" placeholder="enter your old password" class="box" maxlength="50">
         <input type="password" name="new_password" placeholder="enter your new password" class="box" maxlength="50">
         <input type="password" name="confirm_password" placeholder="confirm your new password" class="box" maxlength="50">
         <input type="submit" value="update now" name="submit" class="btn">
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