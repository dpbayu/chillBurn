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
      $delete_admin = $conn->prepare("DELETE FROM tbl_admin WHERE id = ?");
      $delete_admin->execute([$delete_id]);
      header('location:admin_accounts.php');
   }
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Accounts</title>
   <!-- Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Custom CSS  -->
   <link rel="stylesheet" href="assets/css/admin_style.css">
</head>

<body>
   <!-- Header Start -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <!-- Accounts Start  -->
   <section class="accounts">
      <h1 class="heading">admins account</h1>
      <div class="box-container">
         <div class="box">
            <p>register new admin</p>
            <a href="register.php" class="option-btn">register</a>
         </div>
         <?php
            $sql_admin = "SELECT * FROM tbl_admin";
            $query_admin = mysqli_query($conn, $sql_admin);
            if (mysqli_num_rows($query_admin) > 0) {
               while ($admin = mysqli_fetch_assoc($query_admin)) {
            ?>
            <div class="box">
               <p> admin id : <span><?= $admin['id']; ?></span> </p>
               <p> username : <span><?= $admin['name']; ?></span> </p>
               <div class="flex-btn">
                  <a href="admin.php?delete=<?= $admin['id']; ?>" class="delete-btn"
                     onclick="return confirm('delete this account?');">delete</a>
                  <?php
                     if ($admin['id'] == $admin_id) {
                        echo '<a href="update_profile.php" class="option-btn">update</a>';
                     }
                  ?>
               </div>
            </div>
            <?php
         }
         } else {
            echo '<p class="empty">no accounts available</p>';
         }
         ?>
      </div>
   </section>
   <!-- Accounts End -->
   <!-- JS Start  -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>