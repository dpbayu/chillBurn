<!-- PHP -->
<?php
    session_start();
    require '../include/connect.php';
    $admin_id = $_SESSION['admin_id'];
    if (!isset($admin_id)) {
        header('location: index.php');
    };
    if (isset($_POST['add_product'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../assets/img/menu/'.$image;
        $sql_product = "SELECT * FROM tbl_product WHERE name = '$name'";
        $query_product = mysqli_query($conn, $sql_product);
        if (mysqli_num_rows($query_product) > 0) {
            $message[] = 'Product name already exists!';
        } else {
            if ($image_size > 2000000) {
            $message[] = 'Image size is too large';
            } else {
            move_uploaded_file($image_tmp_name, $image_folder);
            $sql_add_product = "INSERT INTO tbl_product (name, category, price, image) VALUES ('$name', '$category', '$price', '$image')";
            $query_add_product = mysqli_query($conn, $sql_add_product);
            $message[] = 'New product added!';
            }
        }
    }
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $sql_delete_img = "SELECT * FROM tbl_product WHERE id = '$delete_id'";
        $query_delete_img = mysqli_query($conn, $sql_delete_img);
        $delete_img = mysqli_fetch_assoc($query_delete_img);
        unlink('../menu/'.$delete_img['image']);
        $sql_delete_product = "DELETE * FROM tbl_product WHERE id = '$delete_id'";
        $query_delete_product = mysqli_query($conn,$sql_delete_product);
        $sql_delete_cart = "DELETE FROM tbl_cart WHERE id = '$delete_id'";
        $query_delete_cart = mysqli_query($conn,$sql_delete_cart);
        header('location: product.php');
    }
    if (isset($_POST['update'])) {
        $product_id = $_POST['product_id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $sql_update_product = "UPDATE tbl_product SET name = '$name', category = '$category', price = '$price' WHERE id = '$product_id'";
        $query_update_product = mysqli_query($conn, $sql_update_product);
        $message[] = 'Product updated!';
        $old_image = $_POST['old_image'];
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../assets/img/menu/'.$image;
        if (!empty($image)) {
            if ($image_size > 2000000) {
                $message[] = 'Image size is too large!';
            } else {
                $sql_update_img = "UPDATE tbl_product SET image = '$image' WHERE id = '$product_id'";
                $query_update_img = mysqli_query($conn, $sql_update_img);
                move_uploaded_file($image_tmp_name, $image_folder);
                unlink('../assets/img/menu/'.$old_image);
                $message[] = 'Image updated!';
            }
        }
    }
    $page = 'product';
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
    <section>
        <div class="container">
            <h1 class="heading">Product</h1>
            <div class="row">
                <div class="col-xl-4">
                    <!-- Add Product Start  -->
                    <section class="add-products">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <h3 class="text-center">Add Product</h3>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name product"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Enter price product"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-control" name="category" required>
                                    <option value="" disabled selected>-- Select Category --</option>
                                    <option value="Coffee">Coffee</option>
                                    <option value="Tea">Tea</option>
                                    <option value="Dessert">Dessert</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp"
                                    required>
                            </div>
                            <input type="submit" value="Add Product" name="add_product" class="btn btn-success w-100">
                        </form>
                    </section>
                    <!-- Add Product End -->
                </div>
                <div class="col-xl-8" style="overflow-x: scroll;">
                    <table id="product" class="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql_product = "SELECT * FROM tbl_product ORDER BY id DESC";
                                $query_product = mysqli_query($conn, $sql_product);
                                if (mysqli_num_rows($query_product) > 0) {
                                $i = 1;
                                while ($product = mysqli_fetch_assoc($query_product)) {
                            ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $product['name']; ?></td>
                                <td><?= $product['category']; ?></td>
                                <td>Rp <?= number_format($product['price'], 0, ',', '.') ?></td>
                                <td><img src="../assets/img/menu/<?= $product['image']; ?>"></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modal<?= $product['id']; ?>">
                                        Edit
                                    </button>
                                    <a href="product.php?delete=<?= $product['id']; ?>" class="btn btn-danger"
                                        onclick="return confirm('Delete this product?');">Delete</a>
                                </td>
                            </tr>
                            <!-- Modal Start -->
                            <div class="modal fade" id="modal<?= $product['id']; ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Product <span
                                                    class="fw-bold"><?= $product['name']; ?></span></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                                <input type="hidden" name="old_image" value="<?= $product['image']; ?>">
                                                <div class="mb-3">
                                                    <img src="../assets/img/menu/<?= $product['image']; ?>"
                                                        alt="<?= $product['name']; ?>">
                                                    <input type="file" name="image"
                                                        accept="image/jpg, image/jpeg, image/png, image/webp">
                                                </div>
                                                <div class="d-flex mb-3">
                                                    <label style="width: 150px;">Name</label>
                                                    <p class="mx-3">:</p>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Enter name" value="<?= $product['name']; ?>"
                                                        required>
                                                </div>
                                                <div class="d-flex mb-3">
                                                    <label style="width: 150px;">Price</label>
                                                    <p class="mx-3">:</p>
                                                    <input type="number" name="price" class="form-control"
                                                        placeholder="Enter price" value="<?= $product['price']; ?>"
                                                        required>
                                                </div>
                                                <div class="d-flex mb-3">
                                                    <label style="width: 150px;">Category</label>
                                                    <p class="mx-3">:</p>
                                                    <select name="category" class="form-control" required>
                                                        <option value="Coffee"
                                                            <?= $product['category'] == "Coffee" ? "selected" : '' ?>>
                                                            Coffee
                                                        </option>
                                                        <option value="Tea"
                                                            <?= $product['category'] == "Tea" ? "selected" : '' ?>>
                                                            Tea
                                                        </option>
                                                        <option value="Dessert"
                                                            <?= $product['category'] == "Dessert" ? "selected" : '' ?>>
                                                            Dessert
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="flex-btn">
                                                    <input type="submit" value="Update" class="btn btn-success"
                                                        name="update">
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
                                echo '<p class="empty">No products!</p>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- JS Start  -->
    <?php require 'partials/footer.php'; ?>
    <script>
        // Data Tables
        $(document).ready(function () {
            $('#product').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": [4, 5],
                }]
            });
        });
    </script>
    <!-- JS End -->
</body>

</html>