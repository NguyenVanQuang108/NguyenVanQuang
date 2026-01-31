<?php
$page = 'products';
$title = 'Chi tiết sản phẩm: ' . htmlspecialchars($product['name']);
?>

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">
            <i class="fas fa-eye me-2"></i>Chi tiết sản phẩm
        </h4>
        <div>
            <a href="index.php?page=products" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Quay lại
            </a>
            <a href="index.php?page=products-edit&id=<?php echo $product['id']; ?>" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i> Sửa
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                     alt="<?php echo htmlspecialchars($product['name']); ?>" 
                     class="img-fluid rounded mb-3" style="max-height: 300px;">
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">ID</th>
                        <td>#<?php echo $product['id']; ?></td>
                    </tr>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <td><strong><?php echo htmlspecialchars($product['name']); ?></strong></td>
                    </tr>
                    <tr>
                        <th>Giá</th>
                        <td class="text-danger fw-bold fs-5">
                            <?php echo number_format($product['price'], 0, ',', '.'); ?> ₫
                        </td>
                    </tr>
                    <tr>
                        <th>Mô tả</th>
                        <td><?php echo nl2br(htmlspecialchars($product['description'])); ?></td>
                    </tr>
                    <tr>
                        <th>Ngày thêm</th>
                        <td><?php echo date('d/m/Y H:i:s', strtotime($product['created_at'])); ?></td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>
                            <span class="badge bg-success">
                                <i class="fas fa-check"></i> Còn hàng
                            </span>
                        </td>
                    </tr>
                </table>
                
                <div class="mt-4">
                    <a href="index.php?page=products" class="btn btn-secondary">
                        <i class="fas fa-list me-1"></i> Danh sách sản phẩm
                    </a>
                    <a href="index.php?page=products-edit&id=<?php echo $product['id']; ?>" class="btn btn-warning">
                        <i class="fas fa-edit me-1"></i> Chỉnh sửa
                    </a>
                    <button onclick="confirmDelete(<?php echo $product['id']; ?>)" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i> Xóa sản phẩm
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>