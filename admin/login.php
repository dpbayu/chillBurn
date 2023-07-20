<!-- PHP -->
<?php
   session_start();
   require '../include/connect.php';
   if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $password = $_POST['password'];
      $user = "SELECT * FROM tbl_admin WHERE name = '$name'";
      $result = mysqli_query($conn, $user);
      if (mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
         if (password_verify($password, $row['password'])) {
            $_SESSION['admin_id'] = $row['id'];
            header('location: dashboard.php');
         } else {
            $message[] = 'Incorrect username or password!';
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
   <title>Login</title>
   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <!-- Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Custom CSS  -->
   <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
   <?php
      if (isset($message)) {
         foreach($message as $message) {
            echo '
            <div class="message">
               <span>'.$message.'</span>
               <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
         }
      }
   ?>
   <!-- Login Start  -->
   <section class="form-container">
      <form action="" method="POST">
         <h3>LOGIN <span>NOW</span></h3>
         <p>default username = <span>admin</span> & password = <span>111</span></p>
         <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="name" required placeholder="Enter username" class="form-control">
         </div>
         <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" required placeholder="Enter password" class="form-control">
         </div>
         <input type="submit" value="Login Now" name="submit" class="btn btn-primary">
      </form>
   </section>
   <!-- Login End -->
</body>

</html>