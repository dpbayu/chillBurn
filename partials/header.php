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
        <div class="flex">
            <a href="home.php"><img src="assets/img/Logo.png" alt="logo" style="width: 75%;"></a>
            <nav class="navbar text-white">
                <a class="nav-link <?php if ($page == 'home') {echo 'active';} ?>" href="home.php">Home</a>
                <a class="nav-link <?php if ($page == 'about') {echo 'active';} ?>" href="about.php">About</a>
                <a class="nav-link <?php if ($page == 'menu') {echo 'active';} ?>" href="menu.php">Menu</a>
                <a class="nav-link <?php if ($page == 'order') {echo 'active';} ?>" href="order.php">Order</a>
                <a class="nav-link <?php if ($page == 'contact') {echo 'active';} ?>" href="contact.php">Contact</a>
            </nav>
            <div class="icons">
                <?php
                    $sql_cart = "SELECT * FROM tbl_cart WHERE user_id = '$user_id'";
                    $query_cart = mysqli_query($conn, $sql_cart);
                    $total_items = mysqli_num_rows($query_cart);
                ?>
                <a href="search.php"><i class="fas fa-search"></i></a>
                <a class="text-decoration-none" href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_items; ?>)</span></a>
                <div id="user-btn" class="fas fa-user"></div>
                <div id="menu-btn" class="fas fa-bars"></div>
            </div>
            <div class="profile">
                <?php
                    $sql_user = "SELECT * FROM tbl_user WHERE id = '$user_id'";
                    $query_user = mysqli_query($conn, $sql_user);
                    if (mysqli_num_rows($query_user) > 0) {
                        $user = mysqli_fetch_assoc($query_user);
                ?>
                <p class="name"><?= $user['name']; ?></p>
                <div class="flex gap-3">
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
        </div>
    </div>
</header>