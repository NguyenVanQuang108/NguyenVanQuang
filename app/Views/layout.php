<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Lab5 MVC'; ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            padding-top: 20px;
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .card {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .table th {
            background-color: #f8f9fa;
        }
        .action-buttons .btn {
            margin-right: 5px;
        }
        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }
        .required:after {
            content: " *";
            color: red;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-store"></i> Lab5 MVC Store
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page ?? '') == 'home' ? 'active' : ''; ?>" href="index.php?page=home">
                            <i class="fas fa-home"></i> Trang chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page ?? '') == 'products' ? 'active' : ''; ?>" href="index.php?page=products">
                            <i class="fas fa-boxes"></i> Sản phẩm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page ?? '') == 'products-create' ? 'active' : ''; ?>" href="index.php?page=products-create">
                            <i class="fas fa-plus-circle"></i> Thêm sản phẩm
                        </a>
                    </li>
                </ul>
                
                <!-- Search Form -->
                <form class="d-flex" method="GET" action="index.php">
                    <input type="hidden" name="page" value="products">
                    <input class="form-control me-2" type="search" name="search" placeholder="Tìm sản phẩm..." 
                           value="<?php echo $_GET['search'] ?? ''; ?>">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Flash Messages -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Main Content -->
        <?php echo $content; ?>
    </div>

    <footer class="mt-5 py-3 bg-light text-center">
        <div class="container">
            <p class="mb-0">© 2024 Lab5 MVC - CRUD Application. Học phần: Lập trình PHP nâng cao.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Confirm delete
        function confirmDelete(id) {
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
                window.location.href = 'index.php?page=products-delete&id=' + id;
            }
        }
        
        // Format price on input
        function formatPrice(input) {
            let value = input.value.replace(/[^\d]/g, '');
            if (value) {
                input.value = parseInt(value).toLocaleString('vi-VN');
            }
        }
    </script>
</body>
</html>