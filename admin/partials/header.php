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
<!-- Nav Start -->
<nav class="navbar navbar-expand-lg">
   <div class="container position-relative">
      <a href="dashboard.php"><img src="assets/img/logo.png" alt="logo" width="100"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
               <a class="nav-link <?php if ($page == 'dashboard') {echo 'active';} ?>"
                  href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
               <a class="nav-link <?php if ($page == 'product') {echo 'active';} ?>" href="product.php">Product</a>
            </li>
            <li class="nav-item">
               <a class="nav-link <?php if ($page == 'order') {echo 'active';} ?>" href="order.php">Order</a>
            </li>
            <li class="nav-item">
               <a class="nav-link <?php if ($page == 'admin') {echo 'active';} ?>" href="admin.php">Admin</a>
            </li>
            <li class="nav-item">
               <a class="nav-link <?php if ($page == 'user') {echo 'active';} ?>" href="user.php">User</a>
            </li>
            <li class="nav-item">
               <a class="nav-link <?php if ($page == 'message') {echo 'active';} ?>" href="message.php">Message</a>
            </li>
         </ul>
         <div class="d-flex">
            <div class="icons">
               <div id="user-btn" class="fas fa-user"></div>
            </div>
            <div class="profile">
               <?php
                  $sql_admin = "SELECT * FROM tbl_admin WHERE id = '$admin_id'";
                  $query_admin = mysqli_query($conn, $sql_admin);
                  $admin = mysqli_fetch_assoc($query_admin);
               ?>
               <p><?= $admin['name']; ?></p>
               <div class="flex-btn">
                  <a href="update_profile.php" class="btn btn-warning">Update Profile</a>
                  <a href="logout.php" onclick="return confirm('Logout from this website?');" class="btn btn-danger">Logout</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</nav>
<!-- Nav End -->