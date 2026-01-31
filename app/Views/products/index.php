<?php
$page = 'products';
$title = 'Danh sách sản phẩm';
?>

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">
            <i class="fas fa-boxes me-2"></i>Danh sách sản phẩm
        </h4>
        <a href="index.php?page=products-create" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Thêm sản phẩm
        </a>
    </div>
    <div class="card-body">
        <?php if (!empty($search)): ?>
            <div class="alert alert-info">
                Kết quả tìm kiếm cho: "<strong><?php echo htmlspecialchars($search); ?></strong>"
                <a href="index.php?page=products" class="float-end">Xem tất cả</a>
            </div>
        <?php endif; ?>
        
        <?php if (empty($products)): ?>
            <div class="text-center py-5">
                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Không có sản phẩm nào</h5>
                <p>Hãy thêm sản phẩm đầu tiên của bạn!</p>
                <a href="index.php?page=products-create" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Thêm sản phẩm
                </a>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th width="50">ID</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Mô tả</th>
                            <th>Ngày thêm</th>
                            <th width="150" class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td>#<?php echo $product['id']; ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                                     alt="<?php echo htmlspecialchars($product['name']); ?>" 
                                     class="product-image">
                            </td>
                            <td>
                                <strong><?php echo htmlspecialchars($product['name']); ?></strong>
                            </td>
                            <td class="text-danger fw-bold">
                                <?php echo number_format($product['price'], 0, ',', '.'); ?> ₫
                            </td>
                            <td>
                                <?php echo nl2br(htmlspecialchars(substr($product['description'], 0, 100) . (strlen($product['description']) > 100 ? '...' : ''))); ?>
                            </td>
                            <td>
                                <?php echo date('d/m/Y', strtotime($product['created_at'])); ?>
                            </td>
                            <td class="action-buttons text-center">
                                <a href="index.php?page=products-show&id=<?php echo $product['id']; ?>" 
                                   class="btn btn-sm btn-info" title="Xem chi tiết">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="index.php?page=products-edit&id=<?php echo $product['id']; ?>" 
                                   class="btn btn-sm btn-warning" title="Sửa">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="confirmDelete(<?php echo $product['id']; ?>)" 
                                        class="btn btn-sm btn-danger" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted">
                    Tổng số: <strong><?php echo count($products); ?></strong> sản phẩm
                </div>
                <div>
                    <a href="index.php?page=products-create" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Thêm sản phẩm mới
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>