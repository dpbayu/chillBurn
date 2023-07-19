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
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Message</title>
   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <!-- Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Custom CSS  -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="assets/libs/dataTables/datatables.min.css" />
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
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>