<!-- PHP -->
<?php
   session_start();
   require '../include/connect.php';
   $admin_id = $_SESSION['admin_id'];
   if (!isset($admin_id)) {
      header('location:login.php');
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

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin</title>
   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <!-- Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Custom CSS  -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="assets/libs/dataTables/datatables.min.css" />
   <link rel="stylesheet" href="assets/css/admin_style.css">
</head>

<body>
   <!-- Header Start -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <!-- Accounts Start  -->
   <section class="admin">
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
   </section>
   <!-- Accounts End -->
   <!-- JS Start  -->
   <script src="assets/js/script.js"></script>
   <script src="assets/libs/dataTables/datatables.min.js"></script>
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