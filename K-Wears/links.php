<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disclaimer | K-Wears</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="manifest" href="site.webmanifest">
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
        .disclaimer-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .disclaimer-card {
            max-width: 800px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="disclaimer-container bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="disclaimer-card">
                        <div class="card-header bg-kwears text-white py-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-info-circle-fill me-2" style="font-size: 1.5rem;"></i>
                                <h3 class="mb-0">Important Notice</h3>
                            </div>
                        </div>
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <i class="bi bi-exclamation-triangle-fill text-kwears" style="font-size: 3rem;"></i>
                            </div>
                            <h2 class="text-center text-kwears mb-4">Educational Purpose Only</h2>
                            <div class="alert alert-warning">
                                <p class="lead mb-4">This is not an actual e-commerce website. This K-Wears demo site was created solely for educational purposes to demonstrate web development concepts.</p>
                                
                                <ul class="mb-4">
                                    <li>No real products are being sold</li>
                                    <li>No real transactions are processed</li>
                                    <li>All product images are for demonstration only</li>
                                    <li>No personal data is stored permanently</li>
                                </ul>
                                
                                <p class="mb-0">Thank you for understanding that this is a learning exercise in web development.</p>
                            </div>
                        </div>
                        <div class="card-footer bg-white text-center py-3">
                            <a href="index.php" class="btn btn-kwears px-4">
                                <i class="bi bi-arrow-left me-2"></i>Back to Demo Site
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>