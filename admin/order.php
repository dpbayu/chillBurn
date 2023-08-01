<!-- PHP -->
<?php
   session_start();
   require '../include/connect.php';
   $admin_id = $_SESSION['admin_id'];
   if (!isset($admin_id)) {
      header('location:index.php');
   };
   if (isset($_POST['update_payment'])) {
      $fetch_orders_id = $_POST['order_id'];
      $payment_status = $_POST['payment_status'];
      $sql_update_status = "UPDATE tbl_order SET payment_status = '$payment_status' WHERE id = '$fetch_orders_id'";
      $query_update_status = mysqli_query($conn, $sql_update_status);
      $message[] = 'Payment status updated!';
   }
   if (isset($_GET['delete'])) {
      $delete_id = $_GET['delete'];
      $delete_order = $conn->prepare("DELETE FROM tbl_order WHERE id = ?");
      $delete_order->execute([$delete_id]);
      $sql_delete_order = "DELETE FROM tbl_order WHERE id = '$delete_id'";
      $query_delete_order = mysqli_query($conn, $sql_delete_order);
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
   <div class="container">
      <section class="placed-orders">
         <h1 class="heading">Placed Order</h1>
         <div class="box-container">
            <?php
               $select_orders = "SELECT * FROM tbl_order";
               $query_order = mysqli_query($conn, $select_orders);
               if (mysqli_num_rows($query_order) > 0) {
                  $i;
                  while ($fetch_orders = mysqli_fetch_assoc($query_order)) {
            ?>
            <table class="table table-bordered" style="width:100%;">
               <thead>
                  <tr>
                     <th>Placed On</th>
                     <th>Product</th>
                     <th>Price</th>
                     <th>Status</th>
                     <th>Detail</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td><?= date("j F Y", strtotime($fetch_orders['placed_on'])); ?></td>
                     <td><?= $fetch_orders['total_products']; ?></td>
                     <td>Rp <?= number_format($fetch_orders['total_price'], 0, ',', '.'); ?></td>
                     <td>
                        <span
                           style="color:<?php if($fetch_orders['payment_status'] == 'Pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?>
                        </span>
                     </td>
                     <td>
                        <a type="submit" class="text-info text-decoration-none" data-bs-toggle="modal"
                           data-bs-target="#modal<?= $fetch_orders['id'] ?>">
                           View
                        </a>
                     </td>
                     <td>
                        <form action="" method="POST">
                           <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
                           <select name="payment_status" class="form-control mb-3">
                              <option value="" selected disabled><?= $fetch_orders['payment_status']; ?></option>
                              <option value="Pending">Pending</option>
                              <option value="Completed">Completed</option>
                           </select>
                           <div class="flex-btn">
                              <input type="submit" value="Update" class="btn btn-info" name="update_payment">
                              <a href="order.php?delete=<?= $fetch_orders['id']; ?>" class="btn btn-danger"
                                 onclick="return confirm('Delete this order?');">Delete</a>
                           </div>
                        </form>
                     </td>
                  </tr>
                  <!-- Modal Start -->
                  <div class="modal fade" id="modal<?= $fetch_orders['id'] ?>" tabindex="-1"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Order</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <form action="" method="POST" enctype="multipart/form-data">
                                 <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
                                 <div class="d-flex">
                                    <label style="width: 50px;">Name</label>
                                    <p class="mx-3">:</p>
                                    <p><?= $fetch_orders['name']; ?></p>
                                 </div>
                                 <div class="d-flex">
                                    <label style="width: 50px;">Phone</label>
                                    <p class="mx-3">:</p>
                                    <p><?= $fetch_orders['number']; ?></p>
                                 </div>
                                 <div class="d-flex">
                                    <label style="width: 50px;">Email</label>
                                    <p class="mx-3">:</p>
                                    <p><?= $fetch_orders['email']; ?></p>
                                 </div>
                                 <div class="d-flex">
                                    <label style="width: 50px;">Address</label>
                                    <p class="mx-3">:</p>
                                    <p><?= $fetch_orders['address']; ?></p>
                                 </div>
                                 <div class="d-flex">
                                    <label style="width: 50px;">Price</label>
                                    <p class="mx-3">:</p>
                                    <p>Rp <?= number_format($fetch_orders['total_price'], 0, ',', '.'); ?></p>
                                 </div>
                                 <div class="d-flex">
                                    <label style="width: 50px;">Method</label>
                                    <p class="mx-3">:</p>
                                    <p><?= $fetch_orders['method']; ?></p>
                                 </div>
                                 <div class="d-flex">
                                    <label style="width: 50px;">Status</label>
                                    <p class="mx-3">:</p>
                                    <span
                                       style="color:<?php if($fetch_orders['payment_status'] == 'Pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?>
                                    </span>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Modal End -->
                  <?php
                  }
                  } else {
                     echo '<p class="empty">No orders!</p>';
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </section>
   </div>
   <!-- Orders End -->
   <!-- JS Start  -->
   <?php require 'partials/footer.php'; ?>
   <!-- JS End -->
</body>

</html>