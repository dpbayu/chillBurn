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
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_STRING);
      $number = $_POST['number'];
      $number = filter_var($number, FILTER_SANITIZE_STRING);
      $msg = $_POST['msg'];
      $msg = filter_var($msg, FILTER_SANITIZE_STRING);
      $select_message = $conn->prepare("SELECT * FROM tbl_message WHERE name = ? AND email = ? AND number = ? AND message = ?");
      $select_message->execute([$name, $email, $number, $msg]);
      if ($select_message->rowCount() > 0){
         $message[] = 'already sent message!';
      } else {
         $insert_message = $conn->prepare("INSERT INTO tbl_message (user_id, name, email, number, message) VALUES (?,?,?,?,?)");
         $insert_message->execute([$user_id, $name, $email, $number, $msg]);
         $message[] = 'sent message successfully!';
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
   <div class="contact-hero">
      <div class="container">
         <div class="content">
            <div class="heading">
               <h3>contact</h3>
               <p><a href="home.php">home</a> <span> / contact</span></p>
            </div>
         </div>
      </div>
   </div>
   <!-- Contact Start  -->
   <section class="contact">
      <div class="row">
         <div class="image">
            <img src="images/contact-img.svg" alt="">
         </div>
         <form action="" method="POST">
            <h3>tell us something!</h3>
            <input type="text" name="name" maxlength="50" class="box" placeholder="enter your name" required>
            <input type="number" name="number" min="0" max="9999999999" class="box" placeholder="enter your number"
               required maxlength="10">
            <input type="email" name="email" maxlength="50" class="box" placeholder="enter your email" required>
            <textarea name="msg" class="box" required placeholder="enter your message" maxlength="500" cols="30"
               rows="10"></textarea>
            <input type="submit" value="send message" name="send" class="btn">
         </form>
      </div>
   </section>
   <!-- Contact End -->
   <!-- Footer Start  -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>