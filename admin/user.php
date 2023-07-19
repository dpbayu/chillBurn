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

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User</title>
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
   <!-- User Account Start  -->
   <section class="user">
      <h1 class="heading">USER <span>ACCOUNT</span></h1>
      <table id="user" class="table" style="width:100%">
         <thead>
            <tr>
               <th>No</th>
               <th>ID</th>
               <th>Username</th>
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
   </section>
   <!-- User Account End ens -->
   <!-- JS Start  -->
   <script src="assets/js/script.js"></script>
   <script src="assets/libs/dataTables/datatables.min.js"></script>
   <script>
      // Data Tables
      $(document).ready(function () {
         $('#user').DataTable({
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