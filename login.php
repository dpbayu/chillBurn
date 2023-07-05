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
      $email = filter_var($email, FILTER_SANITIZE_STRING);
      $pass = sha1($_POST['pass']);
      $pass = filter_var($pass, FILTER_SANITIZE_STRING);
      $select_user = $conn->prepare("SELECT * FROM tbl_user WHERE email = ? AND password = ?");
      $select_user->execute([$email, $pass]);
      $row = $select_user->fetch(PDO::FETCH_ASSOC);
      if ($select_user->rowCount() > 0) {
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');
      } else {
         $message[] = 'incorrect username or password!';
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
   <section class="form-container">
      <form action="" method="POST">
         <h3>login now</h3>
         <input type="email" name="email" required placeholder="enter your email" class="box" maxlength="50"
            oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="password" name="pass" required placeholder="enter your password" class="box" maxlength="50"
            oninput="this.value = this.value.replace(/\s/g, '')">
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