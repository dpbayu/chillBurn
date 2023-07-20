<!-- PHP -->
<?php
   session_start();
   require '../include/connect.php';
   $admin_id = $_SESSION['admin_id'];
   if (!isset($admin_id)) {
      header('location:login.php');
   }
   if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      if (!empty($name)) {
         $sql_name = "SELECT * FROM tbl_admin WHERE name = '$name'";
         $query_name = mysqli_query($conn, $sql_name);
         if (mysqli_num_rows($query_name) > 0) {
            $message[] = 'Username already taken!';
         } else {
            $sql_update = "UPDATE tbl_admin SET name = '$name' WHERE id = '$admin_id'";
            $query_update = mysqli_query($conn, $sql_update);
            $message[] = 'Update name succesfully!';
         }
      }
      $old_password = $_POST['old_password'];
      if (!empty($old_password)) {
         $new_password = $_POST['new_password'];
         $confirm_password = $_POST['confirm_password'];
         $sql_password = "SELECT * FROM tbl_admin WHERE id = '$admin_id'";
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
            $update_password = "UPDATE tbl_admin SET password = '$hash' WHERE id = '$admin_id'";
            $query_update_password = mysqli_query($conn, $update_password);
            $message[] = 'Password updated successfully!';
         }
      }
   }
   $page = 'admin';
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require 'partials/head.php'; ?>
<!-- Head End -->

<body>
   <!-- Header Start -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <!-- Admin Update Start  -->
   <section class="form-container">
      <form action="" method="POST">
         <h3>Update Profile</h3>
         <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="name" class="form-control" placeholder="<?= $admin['name']; ?>">
         </div>
         <div class="mb-3">
            <label class="form-label">Old Password</label>
            <input type="password" name="old_password" class="form-control" placeholder="Enter your old password">
         </div>
         <div class="mb-3">
            <label class="form-label">New Password</label>
            <input type="password" name="new_password" class="form-control" placeholder="Enter your new password">
         </div>
         <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm your new password">
         </div>
         <input type="submit" value="Update Now" name="submit" class="btn btn-success">
      </form>
   </section>
   <!-- Admin Update End -->
   <!-- JS Start  -->
   <?php require 'partials/footer.php'; ?>
   <!-- JS End -->
</body>

</html>