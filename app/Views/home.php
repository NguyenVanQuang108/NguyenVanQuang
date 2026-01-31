<?php
$title = 'Trang chủ - Lab5 MVC CRUD Application';
?>

<div class="text-center mb-5">
    <h1 class="display-5 fw-bold text-primary">
        <i class="fas fa-store"></i> Lab5 MVC Store
    </h1>
    <p class="lead">Hệ thống quản lý sản phẩm sử dụng mô hình MVC với PHP thuần</p>
    <div class="row mt-4 justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-info">
                <h5><i class="fas fa-info-circle me-2"></i>Thông tin hệ thống</h5>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="card border-primary">
                            <div class="card-body text-center">
                                <h1 class="text-primary"><?php echo $totalProducts; ?></h1>
                                <p class="mb-0">Sản phẩm</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-success">
                            <div class="card-body text-center">
                                <h1 class="text-success">CRUD</h1>
                                <p class="mb-0">Chức năng đầy đủ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-warning">
                            <div class="card-body text-center">
                                <h1 class="text-warning">MVC</h1>
                                <p class="mb-0">Kiến trúc chuẩn</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="fas fa-fire me-2"></i>Sản phẩm mới nhất
                </h5>
            </div>
            <div class="card-body">
                <?php if (empty($latestProducts)): ?>
                    <div class="text-center py-4">
                        <i class="fas fa-box-open fa-3x text-muted"></i>
                        <p class="mt-3">Chưa có sản phẩm nào. Hãy thêm sản phẩm đầu tiên!</p>
                        <a href="index.php?page=products-create" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i> Thêm sản phẩm
                        </a>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <?php foreach ($latestProducts as $product): ?>
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                                             class="img-fluid rounded-start h-100" 
                                             style="object-fit: cover;" 
                                             alt="<?php echo htmlspecialchars($product['name']); ?>">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h6 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h6>
                                            <p class="card-text text-danger fw-bold">
                                                <?php echo number_format($product['price'], 0, ',', '.'); ?> ₫
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <a href="index.php?page=products-show&id=<?php echo $product['id']; ?>" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i> Xem
                                                </a>
                                                <small class="text-muted">
                                                    <?php echo date('d/m/Y', strtotime($product['created_at'])); ?>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="text-center mt-3">
                        <a href="index.php?page=products" class="btn btn-outline-primary">
                            <i class="fas fa-list me-1"></i> Xem tất cả sản phẩm
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="fas fa-bolt me-2"></i>Tính năng nhanh
                </h5>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="index.php?page=products-create" class="list-group-item list-group-item-action">
                        <i class="fas fa-plus-circle text-success me-2"></i>
                        <strong>Thêm sản phẩm mới</strong>
                        <small class="text-muted d-block">Tạo sản phẩm mới trong cửa hàng</small>
                    </a>
                    <a href="index.php?page=products" class="list-group-item list-group-item-action">
                        <i class="fas fa-boxes text-primary me-2"></i>
                        <strong>Danh sách sản phẩm</strong>
                        <small class="text-muted d-block">Xem và quản lý tất cả sản phẩm</small>
                    </a>
                    <div class="list-group-item">
                        <i class="fas fa-search text-info me-2"></i>
                        <strong>Tìm kiếm</strong>
                        <small class="text-muted d-block">Sử dụng thanh tìm kiếm trên navbar</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="fas fa-code me-2"></i>Thông tin kỹ thuật
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        <strong>Mô hình MVC</strong>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        <strong>CRUD đầy đủ</strong>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        <strong>Bootstrap 5</strong>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        <strong>PDO Prepared Statements</strong>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        <strong>Form Validation</strong>
                    </li>
                    <li>
                        <i class="fas fa-check text-success me-2"></i>
                        <strong>Search Functionality</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>