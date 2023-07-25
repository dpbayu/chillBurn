<!-- PHP -->
<?php
   session_start();
   require '../include/connect.php';
   $admin_id = $_SESSION['admin_id'];
   if (!isset($admin_id)) {
      header('location:index.php');
   }
   if (isset($_GET['delete'])) {
      $delete_id = $_GET['delete'];
      $sql_delete = "DELETE FROM tbl_admin WHERE id = '$delete_id'";
      $query_delete = mysqli_query($conn, $sql_delete);
      header('location: admin.php');
   }
   if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      if (!empty($name)) {
         $sql_name = "UPDATE tbl_admin SET name = '$name' WHERE id = '$admin_id'";
         $query_name = mysqli_query($conn, $sql_name);
         $message[] = 'Update name succesfully!';
      }
      if (!empty($old_password)) {
         $old_password = $_POST['old_password'];
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
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_password = "UPDATE tbl_admin SET password = '$new_password' WHERE id = '$admin_id'";
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
   <!-- Accounts Start  -->
   <section class="admin">
      <div class="container">
         <h1 class="heading">Admin</h1>
         <div class="row">
            <div class="col-md-4">
               <div class="box">
                  <p>Register New Admin</p>
                  <a href="register.php" class="btn btn-primary">Register</a>
               </div>
            </div>
            <div class="col-md-8">
               <table id="admin" class="table" style="width:100%">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $sql_admin = "SELECT * FROM tbl_admin";
                     $query_admin = mysqli_query($conn, $sql_admin);
                     if (mysqli_num_rows($query_admin) > 0) {
                        $i = 1;
                        while ($admin = mysqli_fetch_assoc($query_admin)) {
                     ?>
                     <tr>
                        <td><?= $i; ?></td>
                        <td><?= $admin['id'] ?></td>
                        <td><?= $admin['name'] ?></td>
                        <td>
                           <?php
                           if ($admin['id'] == $admin_id) {
                              echo '<a href="update_profile.php" class="btn btn-info">Update</a>';
                           }
                        ?>
                           <a href="admin.php?delete=<?= $admin['id']; ?>" class="btn btn-danger"
                              onclick="return confirm('Delete this account?');">Delete</a>
                        </td>
                     </tr>
                     <?php
                     $i++; 
                     }
                     } else {
                        echo '<p class="empty">No admin!</p>';
                     }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>
   <!-- Accounts End -->
   <!-- JS Start  -->
   <?php require 'partials/footer.php'; ?>
   <script>
      // Data Tables
      $(document).ready(function () {
         $('#admin').DataTable({
            columnDefs: [{
               "searchable": false,
               "orderable": false,
               "targets": 3,
            }]
         });
      });
   </script>
   <!-- JS End -->
</body>

</html>