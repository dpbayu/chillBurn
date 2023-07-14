<!-- PHP -->
<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<!-- PHP -->

<header class="header">
   <section class="flex">
      <a href="dashboard.php" class="logo">Admin<span>Panel</span></a>
      <nav class="navbar">
         <a href="dashboard.php">home</a>
         <a href="product.php">product</a>
         <a href="order.php">order</a>
         <a href="admin.php">admin</a>
         <a href="user.php">user</a>
         <a href="message.php">message</a>
      </nav>
      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>
      <div class="profile">
         <?php
            // PDO Method
            // $select_profile = $conn->prepare("SELECT * FROM tbl_admin WHERE id = ?");
            // $select_profile->execute([$admin_id]);
            // $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            // Mysqli Method
            $sql_admin = "SELECT * FROM tbl_admin WHERE id = '$admin_id'";
            $query_admin = mysqli_query($conn, $sql_admin);
            $admin = mysqli_fetch_assoc($query_admin);
         ?>
         <p><?= $admin['name']; ?></p>
         <a href="update_profile.php" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
         <a href="logout.php" onclick="return confirm('logout from this website?');"
            class="delete-btn">logout</a>
      </div>
   </section>
</header>