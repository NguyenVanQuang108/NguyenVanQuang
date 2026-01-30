<?php
// 1. Load autoload của Composer
require 'vendor/autoload.php';

// 2. Import Controllers
use App\Controllers\HomeController;
use App\Controllers\ProductController;

// 3. Router cải tiến
$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

// 4. Định tuyến
switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
        
    case 'about':
        $controller = new HomeController();
        $controller->about();
        break;
        
    case 'contact':
        $controller = new HomeController();
        $controller->contact();
        break;
        
    case 'products':
        $controller = new ProductController();
        
        if ($action === 'detail' && $id) {
            $controller->detail($id);
        } else {
            $controller->index();
        }
        break;
        
    default:
        http_response_code(404);
        echo "<h1>404 - Không tìm thấy trang</h1>";
        echo '<a href="index.php?page=home">← Quay lại trang chủ</a>';
        break;
}
?>