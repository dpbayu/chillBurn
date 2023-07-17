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
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Account</title>
   <!-- Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Custom CSS  -->
   <link rel="stylesheet" href="assets/css/admin_style.css">
</head>

<body>
   <!-- Header Start -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <!-- User Account Start  -->
   <section class="accounts">
      <h1 class="heading">users account</h1>
      <div class="box-container">
         <?php
               $sql_account = "SELECT * FROM tbl_user";
               $query_account = mysqli_query($conn, $sql_account);
               if (mysqli_num_rows($query_account) > 0) {
                  while ($account = mysqli_fetch_assoc($query_account)) {
               ?>
                  <div class="box">
                     <p> user id : <span><?= $account['id']; ?></span> </p>
                     <p> username : <span><?= $account['name']; ?></span> </p>
                     <a href="user.php?delete=<?= $account['id']; ?>" class="delete-btn"
                        onclick="return confirm('delete this account?');">delete</a>
                  </div>
               <?php
            }
            } else {
               echo '<p class="empty">no accounts available</p>';
            }
            ?>
      </div>
   </section>
   <!-- User Account End ens -->
   <!-- JS Start  -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>