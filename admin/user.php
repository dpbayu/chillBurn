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
      $delete_users = $conn->prepare("DELETE FROM tbl_user WHERE id = ?");
      $delete_users->execute([$delete_id]);
      $delete_order = $conn->prepare("DELETE FROM tbl_order WHERE user_id = ?");
      $delete_order->execute([$delete_id]);
      $delete_cart = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
      $delete_cart->execute([$delete_id]);
      header('location:users.php');
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
            $select_account = $conn->prepare("SELECT * FROM tbl_user");
            $select_account->execute();
            if ($select_account->rowCount() > 0) {
            while ($fetch_accounts = $select_account->fetch(PDO::FETCH_ASSOC)) {  
               ?>
                  <div class="box">
                     <p> user id : <span><?= $fetch_accounts['id']; ?></span> </p>
                     <p> username : <span><?= $fetch_accounts['name']; ?></span> </p>
                     <a href="users.php?delete=<?= $fetch_accounts['id']; ?>" class="delete-btn"
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