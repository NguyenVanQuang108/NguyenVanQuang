<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController 
{
    public function index()
    {
        // 1. Lấy dữ liệu từ Model
        $productModel = new Product();
        $products = $productModel->getAllProducts();
        
        // 2. Gọi View
        include __DIR__ . '/../Views/products/list.php';
    }
    
    public function detail($id)
    {
        $productModel = new Product();
        $product = $productModel->getProductById($id);
        
        if (!$product) {
            die("Không tìm thấy sản phẩm");
        }
        
        include __DIR__ . '/../Views/products/detail.php';
    }
}
?>