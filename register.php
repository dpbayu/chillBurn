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
      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_STRING);
      $number = $_POST['number'];
      $number = filter_var($number, FILTER_SANITIZE_STRING);
      $pass = sha1($_POST['pass']);
      $pass = filter_var($pass, FILTER_SANITIZE_STRING);
      $cpass = sha1($_POST['cpass']);
      $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
      $select_user = $conn->prepare("SELECT * FROM tbl_user WHERE email = ? OR number = ?");
      $select_user->execute([$email, $number]);
      $row = $select_user->fetch(PDO::FETCH_ASSOC);
      if ($select_user->rowCount() > 0) {
         $message[] = 'email or number already exists!';
      } else {
         if ($pass != $cpass) {
            $message[] = 'confirm password not matched!';
         } else {
            $insert_user = $conn->prepare("INSERT INTO tbl_user (name, email, number, password) VALUES (?,?,?,?)");
            $insert_user->execute([$name, $email, $number, $cpass]);
            $select_user = $conn->prepare("SELECT * FROM tbl_user WHERE email = ? AND password = ?");
            $select_user->execute([$email, $pass]);
            $row = $select_user->fetch(PDO::FETCH_ASSOC);
            if($select_user->rowCount() > 0){
               $_SESSION['user_id'] = $row['id'];
               header('location:home.php');
            }
         }
      }
   }
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">
<!-- Head Start -->
<?php include 'partials/head.php'; ?>
<!-- Head End -->

<body>
   <!-- Loader Start -->
   <div class="loader">
      <img src="images/loader.gif" alt="">
   </div>
   <!-- Loader End -->
   <!-- Header Start  -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <section class="form-container">
      <form action="" method="POST">
         <h3>register now</h3>
         <input type="text" name="name" required placeholder="enter your name" class="box" maxlength="50">
         <input type="email" name="email" required placeholder="enter your email" class="box" maxlength="50"
            oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="number" name="number" required placeholder="enter your number" class="box" min="0"
            max="9999999999" maxlength="10">
         <input type="password" name="pass" required placeholder="enter your password" class="box" maxlength="50"
            oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="password" name="cpass" required placeholder="confirm your password" class="box" maxlength="50"
            oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="submit" value="register now" name="submit" class="btn">
         <p>already have an account? <a href="login.php">login now</a></p>
      </form>
   </section>
   <!-- Footer Start -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>