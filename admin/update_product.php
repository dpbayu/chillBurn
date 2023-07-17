<!-- PHP -->
<?php
   session_start();
   require '../include/connect.php';
   $admin_id = $_SESSION['admin_id'];
   if (!isset($admin_id)){
      header('location:login.php');
   };
   if (isset($_POST['update'])) {
      $product_id = $_POST['product_id'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $category = $_POST['category'];
      $sql_update_product = "UPDATE tbl_product SET name = '$name', category = '$category', price = '$price' WHERE id = '$product_id'";
      $query_update_product = mysqli_query($conn, $sql_update_product);
      $message[] = 'product updated!';
      $old_image = $_POST['old_image'];
      $image = $_FILES['image']['name'];
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = '../assets/img/uploaded_img/'.$image;
      if (!empty($image)) {
         if ($image_size > 2000000) {
            $message[] = 'images size is too large!';
         } else {
            $sql_update_img = "UPDATE tbl_product SET image = '$image' WHERE id = '$product_id'";
            $query_update_img = mysqli_query($conn, $sql_update_img);
            move_uploaded_file($image_tmp_name, $image_folder);
            unlink('../assets/img/uploaded_img/'.$old_image);
            $message[] = 'image updated!';
         }
      }
   }
?>
<!-- PHP -->

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Product</title>
   <!-- Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Custom CSS  -->
   <link rel="stylesheet" href="assets/css/admin_style.css">
</head>

<body>
   <!-- Header Start -->
   <?php include 'partials/header.php'; ?>
   <!-- Header End -->
   <!-- Update Product End  -->
   <section class="update-product">
      <h1 class="heading">update product</h1>
      <?php
         $update_id = $_GET['update'];
         $sql_product = "SELECT * FROM tbl_product WHERE id ='$update_id'";
         $query_product = mysqli_query($conn, $sql_product);
         if (mysqli_num_rows($query_product) > 0) {
            while ($product = mysqli_fetch_assoc($query_product)) {
         ?>
            <form action="" method="POST" enctype="multipart/form-data">
               <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
               <input type="hidden" name="old_image" value="<?= $product['image']; ?>">
               <img src="../assets/img/uploaded_img/<?= $product['image']; ?>" alt="">
               <span>update name</span>
               <input type="text" required placeholder="enter product name" name="name" maxlength="100" class="box"
                  value="<?= $product['name']; ?>">
               <span>update price</span>
               <input type="number" min="0" max="9999999999" required placeholder="enter product price" name="price"
                  onkeypress="if (this.value.length == 10) return false;" class="box" value="<?= $product['price']; ?>">
               <span>update category</span>
               <select name="category" class="box" required>
                  <option selected value="<?= $product['category']; ?>"><?= $product['category']; ?></option>
                  <option value="main dish">main dish</option>
                  <option value="fast food">fast food</option>
                  <option value="drinks">drinks</option>
                  <option value="desserts">desserts</option>
               </select>
               <span>update image</span>
               <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
               <div class="flex-btn">
                  <input type="submit" value="update" class="btn" name="update">
                  <a href="product.php" class="option-btn">go back</a>
               </div>
            </form>
         <?php
         }
         } else {
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>
   </section>
   <!-- Update Product -->
   <!-- JS Start  -->
   <script src="assets/js/script.js"></script>
   <!-- JS End -->
</body>
</html>