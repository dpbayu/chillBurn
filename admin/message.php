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
      $delete_message = $conn->prepare("DELETE FROM tbl_message WHERE id = ?");
      $delete_message->execute([$delete_id]);
      header('location:message.php');
   }
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Message</title>
   <!-- Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Custom CSS  -->
   <link rel="stylesheet" href="assets/css/admin_style.css">
</head>

<body>
   <!-- Header Start -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <!-- Message Start  -->
   <section class="messages">
      <h1 class="heading">messages</h1>
      <div class="box-container">
         <?php
            $select_messages = $conn->prepare("SELECT * FROM tbl_message");
            $select_messages->execute();
            if ($select_messages->rowCount() > 0) {
               while ($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="box">
               <p> name : <span><?= $fetch_messages['name']; ?></span> </p>
               <p> number : <span><?= $fetch_messages['number']; ?></span> </p>
               <p> email : <span><?= $fetch_messages['email']; ?></span> </p>
               <p> message : <span><?= $fetch_messages['message']; ?></span> </p>
               <a href="message.php?delete=<?= $fetch_messages['id']; ?>" class="delete-btn"
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
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>