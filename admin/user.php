<!-- PHP -->
<?php
   session_start();
   require '../include/connect.php';
   $admin_id = $_SESSION['admin_id'];
   if (!isset($admin_id)) {
      header('location: login.php');
   }
   if (isset($_GET['delete'])) {
      $delete_id = $_GET['delete'];
      $sql_delete_user = "DELETE FROM tbl_user WHERE id = '$delete_id'";
      $query_delete_user = mysqli_query($conn, $sql_delete_user);
      $sql_delete_order = "DELETE FROM tbl_order WHERE user_id = '$delete_id'";
      $query_delete_order = mysqli_query($conn, $sql_delete_order);
      $sql_delete_cart = "DELETE FROM tbl_cart WHERE user_id = '$delete_id'";
      $query_delete_cart = mysqli_query($conn, $sql_delete_cart);
   }
   $page = 'user';
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
   <!-- User Account Start  -->
   <section class="user">
      <div class="container">
         <h1 class="heading">USER <span>ACCOUNT</span></h1>
         <table id="user" class="table" style="width:100%">
            <thead>
               <tr>
                  <th>No</th>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
            <?php
               $sql_account = "SELECT * FROM tbl_user";
               $query_account = mysqli_query($conn, $sql_account);
               if (mysqli_num_rows($query_account) > 0) {
                  $i = 1;
                  while ($account = mysqli_fetch_assoc($query_account)) {
               ?>
                  <tr>
                     <td><?= $i; ?></td>
                     <td><?= $account['id'] ?></td>
                     <td><?= $account['name'] ?></td>
                     <td><?= $account['email'] ?></td>
                     <td><?= $account['number'] ?></td>
                     <td>
                     <a href="user.php?delete=<?= $account['id']; ?>" class="btn btn-danger"
                     onclick="return confirm('Delete this account?');">delete</a>
                     </td>
                  </tr>
               <?php
               $i++; 
               }
               } else {
                  echo '<p class="empty">No account!</p>';
               }
               ?>
            </tbody>
         </table>
      </div>
   </section>
   <!-- User Account End ens -->
   <!-- JS Start  -->
   <?php require 'partials/footer.php'; ?>
   <script>
      // Data Tables
      $(document).ready(function () {
         $('#user').DataTable({
            columnDefs: [{
               "searchable": false,
               "orderable": false,
               "targets": 5,
            }]
         });
      });
   </script>
   <!-- JS End -->
</body>

</html>