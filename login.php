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
      // PDO Method
      // $email = $_POST['email'];
      // $email = filter_var($email);
      // $pass = sha1($_POST['pass']);
      // $pass = filter_var($pass);
      // $select_user = $conn->prepare("SELECT * FROM tbl_user WHERE email = ? AND password = ?");
      // $select_user->execute([$email, $pass]);
      // $row = $select_user->fetch(PDO::FETCH_ASSOC);
      // if ($select_user->rowCount() > 0) {
      //    $_SESSION['user_id'] = $row['id'];
      //    header('location:home.php');
      // } else {
      //    $message[] = 'incorrect username or password!';
      // }
      // Mysqli Method
      $email = $_POST['email'];
      $password = $_POST['password'];
      $user = "SELECT * FROM tbl_user WHERE email = '$email'";
      $result = mysqli_query($conn, $user);
      if (mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
         if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            header('location: home.php');
         } else {
            $message[] = 'incorrect username or password!';
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
   <div class="search-hero">
      <div class="container">
         <div class="content">
            <div class="heading">
               <h3>login</h3>
               <p><a href="home.php">home</a> <span> / login</span></p>
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
         <p>don't have an account? <a href="register.php">register now</a></p>
      </form>
   </section>
   <?php include 'partials/footer.php'; ?>
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>