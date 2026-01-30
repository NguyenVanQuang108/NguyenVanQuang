<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
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
            max-width: 1200px;
            margin: 0 auto;
        }
        
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
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
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }
        
        .product-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        
        .product-image {
            height: 180px;
            background-color: #3498db;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        
        .product-price {
            color: #e74c3c;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .product-price::after {
            content: ' ₫';
        }
        
        .product-description {
            color: #7f8c8d;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 15px;
        }
        
        .detail-link {
            display: inline-block;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .detail-link:hover {
            background-color: #2980b9;
        }
        
        .empty-message {
            text-align: center;
            color: #7f8c8d;
            font-style: italic;
            padding: 40px;
            grid-column: 1 / -1;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php?page=home" class="back-link">← Quay lại trang chủ</a>
        
        <h1>🛒 Danh sách sản phẩm</h1>
        
        <?php if (empty($products)): ?>
            <div class="empty-message">
                <p>Không có sản phẩm nào.</p>
            </div>
        <?php else: ?>
            <div class="products-grid">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="product-image">
                            📱 <!-- Icon sản phẩm -->
                        </div>
                        
                        <div class="product-info">
                            <div class="product-name"><?php echo htmlspecialchars($product['name']); ?></div>
                            <div class="product-price"><?php echo number_format($product['price'], 0, ',', '.'); ?></div>
                            <div class="product-description">
                                <?php echo htmlspecialchars($product['description'] ?? 'Không có mô tả'); ?>
                            </div>
                            
                            <a href="index.php?page=product&action=detail&id=<?php echo $product['id']; ?>" class="detail-link">
                                Xem chi tiết
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div style="margin-top: 30px; text-align: center; color: #7f8c8d;">
                <p>Tổng số sản phẩm: <?php echo count($products); ?></p>
            </div>
        <?php endif; ?>
        
        <div style="margin-top: 40px; text-align: center;">
            <p><em>Dữ liệu được lấy từ MySQL thông qua Model</em></p>
        </div>
    </div>
</body>
</html>