<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController 
{
    private $productModel;
    
    public function __construct()
    {
        $this->productModel = new Product();
    }
    
    // Danh sách sản phẩm
    public function index()
    {
        $search = $_GET['search'] ?? '';
        
        if ($search) {
            $products = $this->productModel->search($search);
        } else {
            $products = $this->productModel->all();
        }
        
        ob_start();
        include __DIR__ . '/../Views/products/index.php';
        $content = ob_get_clean();
        
        include __DIR__ . '/../Views/layout.php';
    }
    
    // Hiển thị chi tiết sản phẩm
    public function show($id)
    {
        $product = $this->productModel->find($id);
        
        if (!$product) {
            $_SESSION['error'] = "Không tìm thấy sản phẩm!";
            header('Location: index.php?page=products');
            exit;
        }
        
        ob_start();
        include __DIR__ . '/../Views/products/show.php';
        $content = ob_get_clean();
        
        include __DIR__ . '/../Views/layout.php';
    }
    
    // Hiển thị form thêm sản phẩm
    public function create()
    {
        ob_start();
        include __DIR__ . '/../Views/products/create.php';
        $content = ob_get_clean();
        
        include __DIR__ . '/../Views/layout.php';
    }
    
    // Xử lý thêm sản phẩm
    public function store()
    {
        // Validate dữ liệu
        $errors = [];
        
        if (empty($_POST['name'])) {
            $errors[] = "Tên sản phẩm là bắt buộc";
        }
        
        if (empty($_POST['price']) || !is_numeric($_POST['price'])) {
            $errors[] = "Giá sản phẩm phải là số";
        }
        
        if (!empty($errors)) {
            $_SESSION['error'] = implode('<br>', $errors);
            header('Location: index.php?page=products-create');
            exit;
        }
        
        // Chuẩn bị dữ liệu
        $data = [
            'name' => $_POST['name'],
            'price' => str_replace('.', '', $_POST['price']), // Remove thousand separators
            'description' => $_POST['description'] ?? '',
            'image' => $_POST['image'] ?? 'https://via.placeholder.com/300x200?text=Product+Image'
        ];
        
        // Lưu vào database
        $id = $this->productModel->create($data);
        
        if ($id) {
            $_SESSION['success'] = "Thêm sản phẩm thành công!";
            header('Location: index.php?page=products');
        } else {
            $_SESSION['error'] = "Có lỗi xảy ra khi thêm sản phẩm";
            header('Location: index.php?page=products-create');
        }
        exit;
    }
    
    // Hiển thị form sửa sản phẩm
    public function edit($id)
    {
        $product = $this->productModel->find($id);
        
        if (!$product) {
            $_SESSION['error'] = "Không tìm thấy sản phẩm!";
            header('Location: index.php?page=products');
            exit;
        }
        
        ob_start();
        include __DIR__ . '/../Views/products/edit.php';
        $content = ob_get_clean();
        
        include __DIR__ . '/../Views/layout.php';
    }
    
    // Xử lý cập nhật sản phẩm
    public function update($id)
    {
        // Validate dữ liệu
        $errors = [];
        
        if (empty($_POST['name'])) {
            $errors[] = "Tên sản phẩm là bắt buộc";
        }
        
        if (empty($_POST['price']) || !is_numeric($_POST['price'])) {
            $errors[] = "Giá sản phẩm phải là số";
        }
        
        if (!empty($errors)) {
            $_SESSION['error'] = implode('<br>', $errors);
            header("Location: index.php?page=products-edit&id=$id");
            exit;
        }
        
        // Chuẩn bị dữ liệu
        $data = [
            'name' => $_POST['name'],
            'price' => str_replace('.', '', $_POST['price']),
            'description' => $_POST['description'] ?? '',
            'image' => $_POST['image'] ?? 'https://via.placeholder.com/300x200?text=Product+Image'
        ];
        
        // Cập nhật database
        $result = $this->productModel->update($id, $data);
        
        if ($result) {
            $_SESSION['success'] = "Cập nhật sản phẩm thành công!";
            header('Location: index.php?page=products');
        } else {
            $_SESSION['error'] = "Có lỗi xảy ra khi cập nhật sản phẩm";
            header("Location: index.php?page=products-edit&id=$id");
        }
        exit;
    }
    
    // Xóa sản phẩm
    public function destroy($id)
    {
        $result = $this->productModel->delete($id);
        
        if ($result) {
            $_SESSION['success'] = "Xóa sản phẩm thành công!";
        } else {
            $_SESSION['error'] = "Có lỗi xảy ra khi xóa sản phẩm";
        }
        
        header('Location: index.php?page=products');
        exit;
    }
}
?>