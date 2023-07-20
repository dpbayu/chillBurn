<!-- PHP -->
<?php
   session_start();
   require '../include/connect.php';
   $admin_id = $_SESSION['admin_id'];
   if (!isset($admin_id)) {
      header('location:login.php');
   }
   if (isset($_GET['delete'])) {
      $delete_id = $_GET['delete'];
      $sql_message = "DELETE FROM tbl_message WHERE id = '$delete_id'";
      $query_message = mysqli_query($conn, $sql_message);
      header('location: message.php');
   }
   $page = 'message';
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require 'partials/head.php'; ?>
<!-- Head End -->

<body>
   <!-- Header Start -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <!-- Message Start  -->
   <section class="messages">
      <h1 class="heading">messages</h1>
      <div class="box-container">
         <?php
            $sql_message = "SELECT * FROM tbl_message";
            $query_message = mysqli_query($conn, $sql_message);
            if (mysqli_num_rows($query_message) > 0) {
               while ($message = mysqli_fetch_assoc($query_message)) {
            ?>
         <div class="box">
            <p> name : <span><?= $message['name']; ?></span> </p>
            <p> number : <span><?= $message['number']; ?></span> </p>
            <p> email : <span><?= $message['email']; ?></span> </p>
            <p> message : <span><?= $message['message']; ?></span> </p>
            <a href="message.php?delete=<?= $message['id']; ?>" class="delete-btn"
               onclick="return confirm('delete this message?');">delete</a>
         </div>
         <?php
            }
            } else {
               echo '<p class="empty">you have no messages</p>';
            }
         ?>
      </div>
   </section>
   <!-- Message End -->
   <!-- JS Start  -->
   <?php require 'partials/footer.php'; ?>
   <!-- JS End -->
</body>

</html>