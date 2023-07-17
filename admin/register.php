<!-- PHP -->
<?php
   session_start();
   require '../include/connect.php';
   $admin_id = $_SESSION['admin_id'];
   if (!isset($admin_id)) {
      header('location:login.php');
   };
   if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];
      $sql_admin = "SELECT * FROM tbl_admin WHERE name = '$name'";
      $query_admin = mysqli_query($conn, $sql_admin);
      if (mysqli_num_rows($query_admin) > 0) {
         $message[] = 'username already exists!';
      } else {
         if ($password != $confirm_password) {
            $message[] = 'confirm passowrd not matched!';
         } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql_add_admin = "INSERT INTO tbl_admin (name, password) VALUES ('$name', '$password')";
            $query_add_admin = mysqli_query($conn, $sql_add_admin);
            $message[] = 'new admin registered!';
         }
      }
   }
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Admin</title>
   <!-- Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Custom CSS  -->
   <link rel="stylesheet" href="assets/css/admin_style.css">
</head>

<body>
   <!-- Header Start -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <!-- Register Start  -->
   <section class="form-container">
      <form action="" method="POST">
         <h3>register new</h3>
         <input type="text" name="name" maxlength="20" required placeholder="enter your username" class="box">
         <input type="password" name="password" maxlength="20" required placeholder="enter your password" class="box">
         <input type="password" name="confirm_password" maxlength="20" required placeholder="confirm your password" class="box">
         <input type="submit" value="register now" name="submit" class="btn">
      </form>
   </section>
   <!-- Register End -->
   <!-- JS Start  -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>