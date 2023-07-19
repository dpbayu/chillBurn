<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
   };

   if (isset($_POST['register'])) {
      $name = $_POST['name']; 
      $email = $_POST['email'];
      $number = $_POST['number'];
      $password = $_POST['password'];
      $cpass = $_POST['cpass'];
      $select_user_query = "SELECT * FROM tbl_user WHERE email = '$email' OR number = '$number'";
      $select_user_result = mysqli_query($conn, $select_user_query);
      if (mysqli_num_rows($select_user_result) > 0) {
         $message[] = 'email or number already exists!';
         } else {
            if ($password != $cpass) {
            $message[] = 'confirm password not matched!';
            } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $insert_user_query = "INSERT INTO tbl_user (name, email, number, password) VALUES ('$name', '$email', '$number', '$password')";
            $insert_user_result = mysqli_query($conn, $insert_user_query);
            $select_user_query = "SELECT * FROM tbl_user WHERE email = '$email'";
            $select_user_result = mysqli_query($conn, $select_user_query);
            if (mysqli_num_rows($select_user_result) > 0) {
               $row = mysqli_fetch_assoc($select_user_result);
               $_SESSION['user_id'] = $row['id'];
               header('location: index.php');
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
   <div class="simple-hero">
      <div class="container">
         <div class="content">
            <div class="heading">
               <h3>register</h3>
               <p><a href="index.php">home</a> <span> / register</span></p>
            </div>
         </div>
      </div>
   </div>
   <section class="form-container">
      <form action="" method="POST">
         <h3>register now</h3>
         <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
         </div>
         <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
         </div>
         <div class="mb-3">
            <label class="form-label">number</label>
            <input type="number" class="form-control" name="number" placeholder="Enter your number" min="0"
               max="9999999999">
         </div>
         <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password">
         </div>
         <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="cpass" placeholder="confirm your password">
         </div>
         <input type="submit" value="register now" name="register" class="btn">
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