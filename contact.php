<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
   };
   if (isset($_POST['send'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $number = $_POST['number'];
      $msg = $_POST['msg'];
      $sql_message = "SELECT * FROM tbl_message WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'";
      $query_message = mysqli_query($conn, $sql_message);
      if (mysqli_num_rows($query_message) > 0) {
         $message[] = 'Already sen message';
      } else {
         $sql_insert_message = "INSERT INTO tbl_message (user_id, name, email, number, message) VALUES ('$user_id','$name', '$email', '$number', '$msg')";
         $query_insert_message = mysqli_query($conn, $sql_insert_message);
         $message[] = 'Sent message successfully';
      }
   }
   $page = 'contact';
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
      <img src="assets/img/loader.gif" alt="">
   </div>
   <!-- Loader End -->
   <!-- Header Start  -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <div class="contact-hero">
      <div class="container">
         <div class="content">
            <div class="heading">
               <h3>CONTACT</h3>
               <p><a href="index.php">Home</a> <span> / Contact</span></p>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <!-- Contact Start  -->
      <section class="contact">
         <div class="row">
            <div class="col-md-12">
               <form action="" method="POST">
                  <h3 class="text-white">TELL US <span>SOMETHING!</span></h3>
                  <input type="text" class="form-control mb-3" name="name" placeholder="Enter name" required>
                  <input type="number" class="form-control mb-3" name="number" placeholder="Enter number" maxlength="12" required>
                  <input type="email" class="form-control mb-3" name="email" placeholder="Enter email" required>
                  <textarea name="msg" class="form-control mb-3" required placeholder="Enter message" maxlength="500"
                     cols="20" rows="10"></textarea>
                  <input type="submit" value="Send Message" name="send" class="btn">
               </form>
            </div>
         </div>
      </section>
      <!-- Contact End -->
   </div>
   <!-- Footer Start  -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>