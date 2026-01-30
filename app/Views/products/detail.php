<?php
// Kiểm tra xem có sản phẩm không
if (empty($product)) {
    die("Không tìm thấy sản phẩm");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #2980b9;
            text-decoration: none;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
        
        .product-title {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
        }
        
        .product-price {
            color: #e74c3c;
            font-size: 28px;
            font-weight: bold;
            margin: 20px 0;
        }
        
        .product-price::after {
            content: ' ₫';
        }
        
        .product-description {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .product-meta {
            color: #7f8c8d;
            font-size: 14px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php?page=products" class="back-link">← Quay lại danh sách sản phẩm</a>
        
        <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>
        
        <div class="product-price">
            <?php echo number_format($product['price'], 0, ',', '.'); ?>
        </div>
        
        <div class="product-description">
            <h3>Mô tả sản phẩm:</h3>
            <p><?php echo nl2br(htmlspecialchars($product['description'] ?? 'Không có mô tả chi tiết')); ?></p>
        </div>
        
        <div class="product-meta">
            <p><strong>Mã sản phẩm:</strong> #<?php echo $product['id']; ?></p>
            <p><strong>Ngày thêm:</strong> <?php echo $product['created_at']; ?></p>
        </div>
    </div>
</body>
</html>