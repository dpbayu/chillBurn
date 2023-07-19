<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
   };
   if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $user = "SELECT * FROM tbl_user WHERE email = '$email'";
      $result = mysqli_query($conn, $user);
      if (mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
         if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            header('location: index.php');
         } else {
            $message[] = 'Incorrect username or password!';
         }
      }
   }
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">
<!-- Head Start -->
<?php include 'partials/head.php' ?>
<!-- Head End -->

<body>
   <!-- Loader Start -->
   <div class="loader">
      <img src="images/loader.gif" alt="">
   </div>
   <!-- Loader End -->
   <!-- Headder Start  -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <div class="simple-hero">
      <div class="container">
         <div class="content">
            <div class="heading">
               <h3>Login</h3>
               <p><a href="index.php">Home</a> <span> / Login</span></p>
            </div>
         </div>
      </div>
   </div>
   <section class="form-container">
      <form action="" method="POST">
         <h3>form login</h3>
         <div class="mb-3">
            <label class="form-label">email</label>
            <input type="email" name="email" class="form-control box" placeholder="Enter your email" required>
         </div>
         <div class="mb-5">
         <label class="form-label">password</label>
            <input type="password" name="password" class="form-control box" placeholder="Enter your password" required>
         </div>
         <input type="submit" value="login now" name="submit" class="btn">
         <p>Dont't have an account? <a href="register.php">Register now</a></p>
      </form>
   </section>
   <?php include 'partials/footer.php'; ?>
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>