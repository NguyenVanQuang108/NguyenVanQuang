<?php
namespace App\Controllers;

use App\Models\Student;

class HomeController 
{
    public function index() 
    {
        // 1. Chuẩn bị dữ liệu từ Model
        $message = "Chào mừng bạn đến với mô hình MVC!";
        $student = new Student();
        $studentInfo = $student->getInfo();
        
        // 2. Gọi View và truyền dữ liệu
        include __DIR__ . '/../Views/home.php';
    }
    
    public function about()
    {
        echo "<h1>Trang Giới thiệu</h1>";
        echo "<p>Đây là trang giới thiệu về dự án MVC</p>";
        echo '<a href="index.php?page=home">← Quay lại trang chủ</a>';
    }
    
    public function contact()
    {
        echo "<h1>Trang Liên hệ</h1>";
        echo "<p>Email: contact@example.com</p>";
        echo "<p>Điện thoại: 0123 456 789</p>";
        echo '<a href="index.php?page=home">← Quay lại trang chủ</a>';
    }
}
?>