<?php
include 'config.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    $userId = $_SESSION['user_id'];
    
    if ($quantity > 0) {
        // Update session cart
        $_SESSION['cart'][$productId] = $quantity;
        
        // Update database cart
        $stmt = $pdo->prepare("UPDATE cart_items SET quantity = ? WHERE user_id = ? AND product_id = ?");
        $stmt->execute([$quantity, $userId, $productId]);
    }
}

header("Location: cart.php");
exit;
?>