<?php
namespace App\Models;

class BaseModel 
{
    protected $pdo;
    protected $table;
    
    public function __construct($table = null)
    {
        try {
            $host = 'localhost';
            $dbname = 'lab5_';  // Database của bạn
            $username = 'root';
            $password = '';
            
            $this->pdo = new \PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
                $username,
                $password
            );
            
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            
            if ($table) {
                $this->table = $table;
            }
            
        } catch (\PDOException $e) {
            die("Lỗi kết nối database: " . $e->getMessage());
        }
    }
    
    // Helper method để chạy query
    protected function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
?>