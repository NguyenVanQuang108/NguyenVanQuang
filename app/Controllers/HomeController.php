<?php
namespace App\Controllers;

use App\Models\Product;

class HomeController 
{
    public function index()
    {
        $productModel = new Product();
        $products = $productModel->all();
        $totalProducts = count($products);
        
        // Lấy 4 sản phẩm mới nhất
        $latestProducts = array_slice($products, 0, 4);
        
        ob_start();
        include __DIR__ . '/../Views/home.php';
        $content = ob_get_clean();
        
        $page = 'home';
        $title = 'Trang chủ - Lab5 MVC';
        include __DIR__ . '/../Views/layout.php';
    }
}
?>