<!-- PHP -->
<?php
   session_start();
   include 'include/connect.php';
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
   } else {
      $user_id = '';
      header('location: index.php');
   };
   $page = 'order';
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
   <div class="simple-hero">
      <div class="container">
         <div class="content">
            <div class="heading">
               <h3>Orders</h3>
               <p><a href="index.php">Home</a> <span> / Orders</span></p>
            </div>
         </div>
      </div>
   </div>
   <section class="orders">
      <h1 class="title">YOUR <span>ORDER</span></h1>
      <div class="container">
         <div class="row" style="overflow-x: scroll;">
            <?php
                  if ($user_id == '') {
                     echo '<p class="empty">Please login to see your orders</p>';
                  } else {
                  echo '
                  <table class="table table-dark" style="width:100%;">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Placed On</th>
                        <th> Product</th>
                        <th> Price</th>
                        <th>Status</th>
                        <th style="border-top-right-radius: 12px;">Detail</th>
                     </tr>
                  </thead>
                  ';
                  $sql_order = "SELECT * FROM tbl_order WHERE user_id = '$user_id' ORDER BY id DESC";
                  $query_order = mysqli_query($conn, $sql_order);
                  if (mysqli_num_rows($query_order) > 0) {
                     $i = 1;
                     while ($order = mysqli_fetch_assoc($query_order)) {
                  ?>
                  <tbody>
                     <tr>
                        <td><?= $i; ?></td>
                        <td><?= date("j F Y", strtotime($order['placed_on'])); ?></td>
                        <td><?= $order['total_products']; ?></td>
                        <td>Rp <?= number_format($order['total_price'], 0, ',', '.'); ?></td>
                        <td>
                           <span
                              style="color:<?php if($order['payment_status'] == 'Pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $order['payment_status']; ?>
                           </span>
                        </td>
                        <td>
                           <a type="submit" class="text-info text-decoration-none" data-bs-toggle="modal"
                              data-bs-target="#modal<?= $order['id'] ?>">
                              View
                           </a>
                        </td>
                     </tr>
                     <!-- Modal Start -->
                     <div class="modal fade" id="modal<?= $order['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Order</h1>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                 <form action="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="order_id" value="<?= $order['id']; ?>">
                                    <div class="d-flex">
                                       <label style="width: 50px;">Name</label>
                                       <p class="mx-3">:</p>
                                       <p><?= $order['name']; ?></p>
                                    </div>
                                    <div class="d-flex">
                                       <label style="width: 50px;">Phone</label>
                                       <p class="mx-3">:</p>
                                       <p><?= $order['number']; ?></p>
                                    </div>
                                    <div class="d-flex">
                                       <label style="width: 50px;">Email</label>
                                       <p class="mx-3">:</p>
                                       <p><?= $order['email']; ?></p>
                                    </div>
                                    <div class="d-flex">
                                       <label style="width: 50px;">Address</label>
                                       <p class="mx-3">:</p>
                                       <p><?= $order['address']; ?></p>
                                    </div>
                                    <div class="d-flex">
                                       <label style="width: 50px;">Price</label>
                                       <p class="mx-3">:</p>
                                       <p>Rp <?= number_format($order['total_price'], 0, ',', '.'); ?></p>
                                    </div>
                                    <div class="d-flex">
                                       <label style="width: 50px;">Method</label>
                                       <p class="mx-3">:</p>
                                       <p><?= $order['method']; ?></p>
                                    </div>
                                    <div class="d-flex">
                                       <label style="width: 50px;">Status</label>
                                       <p class="mx-3">:</p>
                                       <span
                                          style="color:<?php if($order['payment_status'] == 'Pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $order['payment_status']; ?>
                                       </span>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Modal End -->
                  <?php
                  $i++; 
                  }
                  } else {
                     echo '<p class="empty">No orders!</p>';
                  }
                  ?>
            </tbody>
            </table>
            <?php
               }
            ?>
         </div>
      </div>
   </section>
   <!-- Footer Start  -->
   <?php include 'partials/footer.php'; ?>
   <!-- Footer End -->
   <!-- JS Start -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>