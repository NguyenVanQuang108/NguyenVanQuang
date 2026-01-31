<?php
// Start session
session_start();

// Load Composer autoload
require 'vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\ProductController;

// Router
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
        
    case 'products':
        $controller = new ProductController();
        $controller->index();
        break;
        
    case 'products-show':
        $id = $_GET['id'] ?? 0;
        $controller = new ProductController();
        $controller->show($id);
        break;
        
    case 'products-create':
        $controller = new ProductController();
        $controller->create();
        break;
        
    case 'products-store':
        $controller = new ProductController();
        $controller->store();
        break;
        
    case 'products-edit':
        $id = $_GET['id'] ?? 0;
        $controller = new ProductController();
        $controller->edit($id);
        break;
        
    case 'products-update':
        $id = $_GET['id'] ?? 0;
        $controller = new ProductController();
        $controller->update($id);
        break;
        
    case 'products-delete':
        $id = $_GET['id'] ?? 0;
        $controller = new ProductController();
        $controller->destroy($id);
        break;
        
    default:
        http_response_code(404);
        echo '<div class="container mt-5">';
        echo '<div class="alert alert-danger">';
        echo '<h4><i class="fas fa-exclamation-triangle"></i> 404 - Trang không tồn tại</h4>';
        echo '<p>Trang bạn tìm kiếm không tồn tại.</p>';
        echo '<a href="index.php?page=home" class="btn btn-primary">';
        echo '<i class="fas fa-home me-1"></i> Quay lại trang chủ';
        echo '</a>';
        echo '</div>';
        echo '</div>';
        break;
}
?>