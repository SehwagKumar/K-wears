<?php
session_start();

$host = 'localhost';
$dbname = 'k_wears';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Light red color scheme
function getThemeStyles() {
    return '
        <style>
            .bg-kwears { background-color: #ff6b6b; }
            .text-kwears { color: #ff6b6b; }
            .btn-kwears { 
                background-color: #ff6b6b; 
                color: white;
                border: none;
            }
            .btn-kwears:hover {
                background-color: #ff5252;
                color: white;
            }
            .navbar { box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
            .product-card { transition: transform 0.3s; }
            .product-card:hover { transform: translateY(-5px); }
            .footer { background-color: #f8f9fa; padding: 20px 0; }
        </style>
    ';
}
?>