<?php
include 'config.php';

// Clear only the login-related session variables
unset($_SESSION['user_id']);
unset($_SESSION['username']);

// Keep the cart items in session for when user logs back in

header("Location: login.php");
exit;
?>