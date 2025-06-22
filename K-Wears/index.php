<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K-Wears - Fashion Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="manifest" href="site.webmanifest">
    <?php echo getThemeStyles(); ?>
</head>
<body>
    <?php include 'navbar.php'; ?>
    
    <!-- Hero Section -->
    <div class="bg-kwears text-white py-5">
        <div class="container text-center py-4">
            <h1 class="display-4 fw-bold">Discover Your Style</h1>
            <p class="lead">Trendy fashion for everyone</p>
            <a href="#products" class="btn btn-light btn-lg mt-3">Shop Now</a>
        </div>
    </div>
    
    <!-- Products Section -->
    <div class="container py-5" id="products">
        <h2 class="text-center mb-5">Our Collection</h2>
        
        <!-- Category Filter -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="btn-group" role="group">
                    <a href="index.php" class="btn btn-outline-secondary">All</a>
                    <a href="index.php?category=Men" class="btn btn-outline-secondary">Men</a>
                    <a href="index.php?category=Women" class="btn btn-outline-secondary">Women</a>
                    <a href="index.php?category=Unisex" class="btn btn-outline-secondary">Unisex</a>
                </div>
            </div>
        </div>
        
        <div class="row g-4">
            <?php
            $category = isset($_GET['category']) ? $_GET['category'] : null;
            $query = "SELECT * FROM products";
            if ($category) {
                $query .= " WHERE category = ?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$category]);
            } else {
                $stmt = $pdo->query($query);
            }
            
            while ($product = $stmt->fetch(PDO::FETCH_ASSOC)):
            ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card product-card h-100">
                        <img src="images/<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text text-muted"><?php echo htmlspecialchars($product['description']); ?></p>
                            <p class="fw-bold text-kwears">$<?php echo number_format($product['price'], 2); ?></p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <?php if (isLoggedIn()): ?>
                                <form action="add_to_cart.php" method="post" class="d-grid">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <button type="submit" class="btn btn-kwears">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </form>
                            <?php else: ?>
                                <a href="login.php" class="btn btn-kwears w-100">
                                    <i class="bi bi-box-arrow-in-right"></i> Login to Buy
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>