<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand text-kwears fw-bold" href="index.php">K-Wears</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        Shop
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?category=Men">Men's Fashion</a></li>
                        <li><a class="dropdown-item" href="index.php?category=Women">Women's Fashion</a></li>
                        <li><a class="dropdown-item" href="index.php?category=Unisex">Unisex Collection</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-flex">
                <?php if (isLoggedIn()): ?>
                    <a href="cart.php" class="btn btn-outline-kwears position-relative me-2">
                        <i class="bi bi-cart"></i>
                        <?php if (!empty($_SESSION['cart'])): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-kwears">
                                <?php echo array_sum($_SESSION['cart']); ?>
                            </span>
                        <?php endif; ?>
                    </a>
                    <div class="dropdown">
                        <button class="btn btn-outline-kwears dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                            <?php echo $_SESSION['username']; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">My Account</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="login.php" class="btn btn-outline-kwears me-2">Login</a>
                    <a href="register.php" class="btn btn-kwears">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>