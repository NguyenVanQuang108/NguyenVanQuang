<?php
namespace App\Models;

class BaseModel 
{
    protected $pdo;
    
    public function __construct()
    {
        try {
            // Kết nối database
            $host = 'localhost';
            $dbname = 'lab5_';
            $username = 'root';  // Mặc định XAMPP
            $password = '';      // Mặc định XAMPP không có password
            
            $this->pdo = new \PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
                $username,
                $password
            );
            
            // Thiết lập chế độ lỗi
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            
        } catch (\PDOException $e) {
            die("Lỗi kết nối database: " . $e->getMessage());
        }
    }
}
?>