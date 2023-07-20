<!-- PHP -->
<?php
   session_start();
   require '../include/connect.php';
   $admin_id = $_SESSION['admin_id'];
   if (!isset($admin_id)) {
      header('location:login.php');
   };
   if (isset($_POST['update_payment'])) {
      $order_id = $_POST['order_id'];
      $payment_status = $_POST['payment_status'];
      $update_status = $conn->prepare("UPDATE tbl_order SET payment_status = ? WHERE id = ?");
      $update_status->execute([$payment_status, $order_id]);
      $message[] = 'payment status updated!';
   }
   if (isset($_GET['delete'])) {
      $delete_id = $_GET['delete'];
      $delete_order = $conn->prepare("DELETE FROM tbl_order WHERE id = ?");
      $delete_order->execute([$delete_id]);
      header('location:order.php');
   }
   $page = 'order';
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
   <!-- Orders Start  -->
   <section class="placed-orders">
      <h1 class="heading">Placed Order</h1>
      <div class="box-container">
         <?php
            $select_orders = "SELECT * FROM tbl_order";
            $query_order = mysqli_query($conn, $select_orders);
            if (mysqli_num_rows($query_order) > 0) {
               while ($fetch_orders = mysqli_fetch_assoc($query_order)) {
         ?>
         <div class="box">
            <p> User Id : <span><?= $fetch_orders['user_id']; ?></span> </p>
            <p> Place On : <span><?= $fetch_orders['placed_on']; ?></span> </p>
            <p> Name : <span><?= $fetch_orders['name']; ?></span> </p>
            <p> Email : <span><?= $fetch_orders['email']; ?></span> </p>
            <p> Number : <span><?= $fetch_orders['number']; ?></span> </p>
            <p> Address : <span><?= $fetch_orders['address']; ?></span> </p>
            <p> Total Product : <span><?= $fetch_orders['total_products']; ?></span> </p>
            <p> Total Price : <span>$ <?= $fetch_orders['total_price']; ?>/-</span> </p>
            <p> Payment Method : <span><?= $fetch_orders['method']; ?></span> </p>
            <form action="" method="POST">
               <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
               <select name="payment_status" class="form-control mb-3">
                  <option value="" selected disabled><?= $fetch_orders['payment_status']; ?></option>
                  <option value="pending">pending</option>
                  <option value="completed">completed</option>
               </select>
               <div class="flex-btn">
                  <input type="submit" value="Update" class="btn btn-info" name="update_payment">
                  <a href="order.php?delete=<?= $fetch_orders['id']; ?>" class="btn btn-danger"
                     onclick="return confirm('delete this order?');">Delete</a>
               </div>
            </form>
         </div>
         <?php
         }
         } else {
            echo '<p class="empty">no orders placed yet!</p>';
         }
         ?>
      </div>
   </section>
   <!-- Orders End -->
   <!-- JS Start  -->
   <?php require 'partials/footer.php'; ?>
   <!-- JS End -->
</body>

</html>