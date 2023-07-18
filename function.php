<?php
// Add to Cart Start
if (isset($_POST['add_to_cart'])) {
    if ($user_id == '') {
        header('location: login.php');
    } else {
        $product_id = $_POST['product_id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $qty = $_POST['qty'];
        $sql_check = "SELECT * FROM tbl_cart WHERE name = '$name' AND user_id = '$user_id'";
        $query_check = mysqli_query($conn, $sql_check);
        if (mysqli_num_rows($query_check) > 0) {
            $message[] = 'Already added to cart!';
        } else {
            $sql_insert = "INSERT INTO tbl_cart (user_id, product_id, name, price, quantity, image) VALUES ('$user_id', '$product_id', '$name', '$price', '$qty', '$image')";
            $query_insert = mysqli_query($conn, $sql_insert);
            $message[] = 'Added to cart!';
        }
    }
}
// Add to Cart End
?>