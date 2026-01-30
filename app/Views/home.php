<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ MVC</title>
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
        
        h1 {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
        }
        
        .info-box {
            background-color: #f8f9fa;
            border-left: 4px solid #3498db;
            padding: 15px;
            margin: 20px 0;
        }
        
        .nav {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }
        
        .nav a {
            color: #2980b9;
            text-decoration: none;
            margin-right: 15px;
        }
        
        .nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🏠 Trang Chủ MVC</h1>
        
        <div class="info-box">
            <h2>Thông báo:</h2>
            <p><?php echo $message; ?></p>
        </div>
        
        <div class="info-box">
            <h2>Thông tin sinh viên:</h2>
            <p><?php echo $studentInfo; ?></p>
        </div>
        
        <div class="nav">
            <h3>Menu điều hướng:</h3>
            <a href="index.php?page=home">🏠 Trang chủ</a>
            <a href="index.php?page=products">🛒 Sản phẩm</a>
            <a href="index.php?page=about">ℹ️ Giới thiệu</a>
            <a href="index.php?page=contact">📞 Liên hệ</a>
        </div>
        
        <div style="margin-top: 20px; color: #7f8c8d; font-size: 14px;">
            <p><em>Đây là view được tải từ Controller thông qua include</em></p>
        </div>
    </div>
</body>
</html>