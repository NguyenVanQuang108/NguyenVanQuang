<?php
$page = 'products';
$title = 'Sửa sản phẩm: ' . htmlspecialchars($product['name']);
?>

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">
            <i class="fas fa-edit me-2"></i>Sửa sản phẩm: <?php echo htmlspecialchars($product['name']); ?>
        </h4>
        <a href="index.php?page=products" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Quay lại
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="index.php?page=products-update&id=<?php echo $product['id']; ?>">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label required">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="<?php echo htmlspecialchars($product['name']); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="price" class="form-label required">Giá sản phẩm (VND)</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="price" name="price" 
                                   value="<?php echo number_format($product['price'], 0, ',', '.'); ?>" 
                                   required oninput="formatPrice(this)">
                            <span class="input-group-text">₫</span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả sản phẩm</label>
                        <textarea class="form-control" id="description" name="description" 
                                  rows="5"><?php echo htmlspecialchars($product['description']); ?></textarea>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="image" class="form-label">URL hình ảnh</label>
                        <input type="url" class="form-control" id="image" name="image" 
                               value="<?php echo htmlspecialchars($product['image']); ?>">
                    </div>
                    
                    <div class="card border">
                        <div class="card-body">
                            <h6 class="card-title">
                                <i class="fas fa-image me-1"></i> Hình ảnh hiện tại
                            </h6>
                            <div class="text-center">
                                <img id="imagePreview" src="<?php echo htmlspecialchars($product['image']); ?>" 
                                     class="img-fluid rounded" style="max-height: 150px;">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <button type="submit" class="btn btn-warning w-100">
                            <i class="fas fa-save me-1"></i> Cập nhật
                        </button>
                        <a href="index.php?page=products-show&id=<?php echo $product['id']; ?>" 
                           class="btn btn-info w-100 mt-2">
                            <i class="fas fa-eye me-1"></i> Xem chi tiết
                        </a>
                        <a href="index.php?page=products" class="btn btn-outline-secondary w-100 mt-2">
                            <i class="fas fa-times me-1"></i> Hủy bỏ
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview image
    document.getElementById('image').addEventListener('input', function() {
        document.getElementById('imagePreview').src = this.value || '<?php echo htmlspecialchars($product['image']); ?>';
    });
</script>