<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'k_wears';

try {
    $pdo = new PDO("mysql:host=$host", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Products table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    category VARCHAR(50)
);

-- Sample clothing products
INSERT INTO products (name, price, description, image, category) VALUES
('Men\'s Casual Shirt', 29.99, 'Comfortable cotton shirt for casual wear', 'mens-shirt.jpg', 'Men'),
('Women\'s Summer Dress', 39.99, 'Lightweight floral dress perfect for summer', 'womens-dress.jpg', 'Women'),
('Unisex Hoodie', 49.99, 'Warm and cozy hoodie for all seasons', 'unisex-hoodie.jpg', 'Unisex'),
('Designer Jeans', 59.99, 'Slim fit jeans with premium denim', 'designer-jeans.jpg', 'Men'),
('Elegant Blouse', 34.99, 'Silky blouse for formal occasions', 'elegant-blouse.jpg', 'Women'),
('Sports T-shirt', 24.99, 'Breathable fabric for workouts', 'sports-tshirt.jpg', 'Unisex');

-- Cart items table
CREATE TABLE IF NOT EXISTS cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    added_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
)";
    $pdo->exec($sql);
    echo "All Things are set up successfully!<br>";

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
