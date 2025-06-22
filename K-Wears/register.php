<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | K-Wears</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="manifest" href="site.webmanifest">
    <?php echo getThemeStyles(); ?>
</head>
<body>
    <?php include 'navbar.php'; ?>
    
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow">
                    <div class="card-header bg-kwears text-white">
                        <h4 class="mb-0">Create Your K-Wears Account</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $username = trim($_POST['username']);
                            $email = trim($_POST['email']);
                            $password = trim($_POST['password']);
                            $errors = [];
                            
                            if (empty($username)) $errors[] = "Username is required";
                            if (empty($email)) $errors[] = "Email is required";
                            if (empty($password)) $errors[] = "Password is required";
                            
                            if (empty($errors)) {
                                $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
                                $stmt->execute([$username, $email]);
                                
                                if ($stmt->rowCount() > 0) {
                                    $errors[] = "Username or email already exists";
                                } else {
                                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                                    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                                    $stmt->execute([$username, $email, $hashedPassword]);
                                    
                                    $_SESSION['success'] = "Registration successful. Please login.";
                                    header("Location: login.php");
                                    exit;
                                }
                            }
                        }
                        ?>
                        
                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger">
                                <?php foreach ($errors as $error): ?>
                                    <p class="mb-1"><?php echo $error; ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <form method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-kwears w-100">Register</button>
                        </form>
                        
                        <div class="mt-3 text-center">
                            <p>Already have an account? <a href="login.php" class="text-kwears">Login here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>