<!-- PHP -->
<?php
   session_start();
   require '../include/connect.php';
   $admin_id = $_SESSION['admin_id'];
   if (!isset($admin_id)) {
      header('location:login.php');
   };
   if (isset($_POST['add_product'])) {
      $name = $_POST['name'];
      $price = $_POST['price'];
      $category = $_POST['category'];
      $image = $_FILES['image']['name'];
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = '../assets/img/uploaded_img/'.$image;
      // PDO Method
      // $select_products = $conn->prepare("SELECT * FROM tbl_product WHERE name = ?");
      // $select_products->execute([$name]);
      // if ($select_products->rowCount() > 0) {
      //    $message[] = 'product name already exists!';
      // } else {
      //    if ($image_size > 2000000) {
      //       $message[] = 'image size is too large';
      //    } else {
      //       move_uploaded_file($image_tmp_name, $image_folder);
      //       $insert_product = $conn->prepare("INSERT INTO tbl_product (name, category, price, image) VALUES (?,?,?,?)");
      //       $insert_product->execute([$name, $category, $price, $image]);
      //       $message[] = 'new product added!';
      //    }
      // }
      // Mysqli Method
      $sql_product = "SELECT * FROM tbl_product WHERE name = '$name'";
      $query_product = mysqli_query($conn, $sql_product);
      if (mysqli_num_rows($query_product) > 0) {
         $message[] = 'product name already exists!';
      } else {
         if ($image_size > 2000000) {
            $message[] = 'image size is too large';
         } else {
            move_uploaded_file($image_tmp_name, $image_folder);
            $sql_add_product = "INSERT INTO tbl_product (name, category, price, image) VALUES ('$name', '$category', '$price', '$image')";
            $query_add_product = mysqli_query($conn, $sql_add_product);
            $message[] = 'new product added!';
         }
      }
   }
   if (isset($_GET['delete'])) {
      $delete_id = $_GET['delete'];
      // PDO Method
      // $delete_product_image = $conn->prepare("SELECT * FROM tbl_product WHERE id = ?");
      // $delete_product_image->execute([$delete_id]);
      // $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
      // unlink('../uploaded_img/'.$fetch_delete_image['image']);
      // $delete_product = $conn->prepare("DELETE FROM tbl_product WHERE id = ?");
      // $delete_product->execute([$delete_id]);
      // $delete_cart = $conn->prepare("DELETE FROM cart WHERE product_id = ?");
      // $delete_cart->execute([$delete_id]);
      // Mysqli Method
      $sql_delete_img = "SELECT * FROM tbl_product WHERE id = '$delete_id'";
      $query_delete_img = mysqli_query($conn, $sql_delete_img);
      $delete_img = mysqli_fetch_assoc($query_delete_img);
      unlink('../uploaded_img/'.$delete_img['image']);
      $sql_delete_product = "DELETE * FROM tbl_product WHERE id = '$delete_id'";
      $query_delete_product = mysqli_query($conn,$sql_delete_product);
      $sql_delete_cart = "DELETE FROM tbl_cart WHERE id = '$delete_id'";
      $query_delete_cart = mysqli_query($conn,$sql_delete_cart);
      header('location:product.php');
   }
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product</title>
   <!-- Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Custom CSS  -->
   <link rel="stylesheet" href="assets/css/admin_style.css">
</head>

<body>
   <!-- Header Start -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <!-- Add Product Start  -->
   <section class="add-products">
      <form action="" method="POST" enctype="multipart/form-data">
         <h3>add product</h3>
         <input type="text" required placeholder="enter product name" name="name" maxlength="100" class="box">
         <input type="number" min="0" max="9999999999" required placeholder="enter product price" name="price"
            onkeypress="if(this.value.length == 10) return false;" class="box">
         <select name="category" class="box" required>
            <option value="" disabled selected>select category --</option>
            <option value="main dish">main dish</option>
            <option value="fast food">fast food</option>
            <option value="drinks">drinks</option>
            <option value="desserts">desserts</option>
         </select>
         <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>
         <input type="submit" value="add product" name="add_product" class="btn">
      </form>
   </section>
   <!-- Add Product End -->
   <!-- Show Product Start  -->
   <section class="show-products" style="padding-top: 0;">
      <div class="box-container">
         <?php
            // PDO Method
            // $show_products = $conn->prepare("SELECT * FROM tbl_product ORDER BY id DESC");
            // $show_products->execute();
            // if ($show_products->rowCount() > 0) {
            // while ($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)) {  
            // Mysqli Method
            $sql_product = "SELECT * FROM tbl_product ORDER BY id DESC";
            $query_product = mysqli_query($conn, $sql_product);
            if (mysqli_num_rows($query_product) > 0) {
               while ($product = mysqli_fetch_assoc($query_product)) {
         ?>
         <div class="box">
            <img src="../assets/img/uploaded_img/<?= $product['image']; ?>" alt="" height="300" width="300">
            <div class="flex">
               <div class="price"><span>$</span><?= $product['price']; ?><span>/-</span></div>
               <div class="category"><?= $product['category']; ?></div>
            </div>
            <div class="name"><?= $product['name']; ?></div>
            <div class="flex-btn">
               <a href="update_product.php?update=<?= $product['id']; ?>" class="option-btn">update</a>
               <a href="product.php?delete=<?= $product['id']; ?>" class="delete-btn"
                  onclick="return confirm('delete this product?');">delete</a>
            </div>
         </div>
         <?php
         }
         } else {
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>
      </div>
   </section>
   <!-- Show Product End -->
   <!-- JS Start  -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>

</html>