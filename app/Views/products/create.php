<?php
$page = 'products-create';
$title = 'Thêm sản phẩm mới';
?>

<div class="card">
    <div class="card-header bg-white">
        <h4 class="mb-0">
            <i class="fas fa-plus-circle me-2"></i>Thêm sản phẩm mới
        </h4>
    </div>
    <div class="card-body">
        <form method="POST" action="index.php?page=products-store">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label required">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               required placeholder="Nhập tên sản phẩm">
                        <div class="form-text">Tên sản phẩm nên ngắn gọn, rõ ràng.</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="price" class="form-label required">Giá sản phẩm (VND)</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="price" name="price" 
                                   required placeholder="Nhập giá" oninput="formatPrice(this)">
                            <span class="input-group-text">₫</span>
                        </div>
                        <div class="form-text">Nhập giá sản phẩm (không bao gồm dấu phân cách hàng nghìn).</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả sản phẩm</label>
                        <textarea class="form-control" id="description" name="description" 
                                  rows="5" placeholder="Nhập mô tả chi tiết về sản phẩm"></textarea>
                        <div class="form-text">Mô tả giúp khách hàng hiểu rõ hơn về sản phẩm.</div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="image" class="form-label">URL hình ảnh</label>
                        <input type="url" class="form-control" id="image" name="image" 
                               placeholder="https://example.com/image.jpg"
                               value="https://via.placeholder.com/300x200?text=Product+Image">
                        <div class="form-text">
                            Để trống để sử dụng ảnh mặc định.<br>
                            <small class="text-muted">Gợi ý: <code>https://via.placeholder.com/300x200</code></small>
                        </div>
                    </div>
                    
                    <div class="card border">
                        <div class="card-body">
                            <h6 class="card-title">
                                <i class="fas fa-image me-1"></i> Preview hình ảnh
                            </h6>
                            <div class="text-center">
                                <img id="imagePreview" src="https://via.placeholder.com/300x200?text=Product+Image" 
                                     class="img-fluid rounded" style="max-height: 150px;">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-save me-1"></i> Lưu sản phẩm
                        </button>
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
        document.getElementById('imagePreview').src = this.value || 'https://via.placeholder.com/300x200?text=Product+Image';
    });
</script>