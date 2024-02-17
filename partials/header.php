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
<!-- Nav Start -->
<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container position-relative">
        <a href="index.php"><img src="assets/img/Logo.png" alt="logo" width="75"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'home') {echo 'active';} ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'about') {echo 'active';} ?>" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'menu') {echo 'active';} ?>" href="menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'order') {echo 'active';} ?>" href="order.php">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'contact') {echo 'active';} ?>" href="contact.php">Contact</a>
                </li>
            </ul>
            <div class="d-flex">
                <div class="icons">
                    <?php
                        $sql_cart = "SELECT * FROM tbl_cart WHERE user_id = '$user_id'";
                        $query_cart = mysqli_query($conn, $sql_cart);
                        $total_items = mysqli_num_rows($query_cart);
                    ?>
                    <a href="search.php"><i class="fas fa-search"></i></a>
                    <a class="text-decoration-none" href="cart.php"><i
                            class="fas fa-shopping-cart"></i><span>(<?= $total_items; ?>)</span></a>
                    <div id="user-btn" class="fas fa-user"></div>
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
                        <a href="profile.php" class="btn">Profile</a>
                        <a href="logout.php" onclick="return confirm('Logout from this website?');"
                            class="delete-btn">Logout</a>
                    </div>
                    <?php
                    } else {
                    ?>
                    <p class="name">Please login!</p>
                    <a href="login.php" class="btn">login</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- Nav End -->