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
   <!-- Contact Start  -->
   <div class="container">
      <section class="contact">
         <div class="row">
            <div class="col-md-6">
               <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5974692962263!2d106.7297888757804!3d-6.184591160598543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f77a2c923f9b%3A0x93729a82ec90bf04!2sPermata%20Puri%20Media!5e0!3m2!1sid!2sid!4v1690879701690!5m2!1sid!2sid"
                  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
               <form action="" method="POST">
                  <h3 class="text-white text-center">TELL US <span>SOMETHING!</span></h3>
                  <div class="mb-3">
                     <label class="form-label text-white">Name</label>
                     <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                  </div>
                  <div class="mb-3">
                     <label class="form-label text-white">Phone</label>
                     <input type="number" class="form-control" name="number" placeholder="Enter number" maxlength="12"
                        required>
                  </div>
                  <div class="mb-3">
                     <label class="form-label text-white">Email</label>
                     <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                  </div>
                  <div class="mb-3">
                     <label class="form-label text-white">Message</label>
                     <textarea name="msg" class="form-control" required placeholder="Enter message" maxlength="500"
                        cols="15" rows="10"></textarea>
                  </div>
                  <input type="submit" value="Send Message" name="send" class="btn">
               </form>
            </div>
         </div>
      </section>
   </div>
   <!-- Contact End -->
   <!-- Footer Start  -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>