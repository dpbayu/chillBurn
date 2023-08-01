<!-- PHP -->
<?php
   session_start();
   require '../include/connect.php';
   $admin_id = $_SESSION['admin_id'];
   if (!isset($admin_id)) {
      header('location: index.php');
   };
   if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];
      $sql_admin = "SELECT * FROM tbl_admin WHERE name = '$name'";
      $query_admin = mysqli_query($conn, $sql_admin);
      if (mysqli_num_rows($query_admin) > 0) {
         $message[] = 'Username already exists!';
      } else {
         if ($password != $confirm_password) {
            $message[] = 'Confirm passowrd not matched!';
         } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql_add_admin = "INSERT INTO tbl_admin (name, password) VALUES ('$name', '$password')";
            $query_add_admin = mysqli_query($conn, $sql_add_admin);
            $message[] = 'New admin registered!';
         }
      }
   }
   $page = 'admin';
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <!-- Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Custom CSS  -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="assets/libs/dataTables/datatables.min.css" />
   <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
   <!-- Header Start -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <!-- Register Start  -->
   <section class="form-container">
      <form action="" method="POST">
         <h3>REGISTER <span>NEW</span></h3>
         <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
         </div>
         <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
         </div>
         <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" placeholder="Enter confirm password"
               required>
         </div>
         <input type="submit" value="Register Now" name="submit" class="btn btn-success">
      </form>
   </section>
   <!-- Register End -->
   <!-- JS Start  -->
   <?php require 'partials/footer.php'; ?>
   <!-- JS End -->
</body>

</html>