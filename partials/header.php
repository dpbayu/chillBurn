<!-- PHP -->
<?php
    if (isset($message)) {
    foreach ($message as $message) {
        echo '
        <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
    }
?>
<!-- PHP -->
<header class="header">
    <div class="container">
        <section class="flex">
            <a href="home.php"><img src="assets/img/Logo.png" alt="logo" style="width: 50%;"></a>
            <nav class="navbar">
                <a href="home.php">home</a>
                <a href="about.php">about</a>
                <a href="menu.php">menu</a>
                <a href="order.php">orders</a>
                <a href="contact.php">contact</a>
            </nav>
            <div class="icons">
                <?php
                    // Mysqli Method 
                    $sql_cart = "SELECT * FROM tbl_cart WHERE user_id = '$user_id'";
                    $query_cart = mysqli_query($conn, $sql_cart);
                    $total_items = mysqli_num_rows($query_cart);
                    // PDO Method
                    // $count_cart_items = $conn->prepare("SELECT * FROM tbl_cart WHERE user_id = ?");
                    // $count_cart_items->execute([$user_id]);
                    // $total_cart_items = $count_cart_items->rowCount();
                ?>
                <a href="search.php"><i class="fas fa-search"></i></a>
                <a class="text-decoration-none" href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_items; ?>)</span></a>
                <div id="user-btn" class="fas fa-user"></div>
                <div id="menu-btn" class="fas fa-bars"></div>
            </div>
            <div class="profile">
                <?php
                    // Mysqli_ Method
                    $sql_user = "SELECT * FROM tbl_user WHERE id = '$user_id'";
                    $query_user = mysqli_query($conn, $sql_user);
                    if (mysqli_num_rows($query_user) > 0) {
                        $user = mysqli_fetch_assoc($query_user);
                    // PDO Method
                    // $select_profile = $conn->prepare("SELECT * FROM tbl_user WHERE id = ?");
                    // $select_profile->execute([$user_id]);
                    // if ($select_profile->rowCount() > 0) {
                    //     $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                ?>
                <p class="name"><?= $user['name']; ?></p>
                <div class="flex">
                    <a href="profile.php" class="btn">profile</a>
                    <a href="logout.php" onclick="return confirm('logout from this website?');"
                        class="delete-btn">logout</a>
                </div>
                <?php
                } else {
                ?>
                <p class="name">please login first!</p>
                <a href="login.php" class="btn">login</a>
                <?php
                }
                ?>
            </div>
        </section>
    </div>
</header>