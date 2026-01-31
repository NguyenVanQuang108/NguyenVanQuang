<?php
namespace App\Models;

class Product extends BaseModel
{
    public function __construct()
    {
        parent::__construct('products');
    }
    
    // Lấy tất cả sản phẩm
    public function all()
    {
        $sql = "SELECT * FROM products ORDER BY created_at DESC";
        return $this->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    // Tìm sản phẩm theo ID
    public function find($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        return $this->query($sql, [$id])->fetch(\PDO::FETCH_ASSOC);
    }
    
    // Tạo sản phẩm mới
    public function create($data)
    {
        $sql = "INSERT INTO products (name, price, description, image) VALUES (?, ?, ?, ?)";
        $this->query($sql, [
            $data['name'],
            $data['price'],
            $data['description'],
            $data['image'] ?? ''
        ]);
        return $this->pdo->lastInsertId();
    }
    
    // Cập nhật sản phẩm
    public function update($id, $data)
    {
        $sql = "UPDATE products SET name = ?, price = ?, description = ?, image = ? WHERE id = ?";
        return $this->query($sql, [
            $data['name'],
            $data['price'],
            $data['description'],
            $data['image'] ?? '',
            $id
        ])->rowCount();
    }
    
    // Xóa sản phẩm
    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        return $this->query($sql, [$id])->rowCount();
    }
    
    // Tìm kiếm sản phẩm theo tên
    public function search($keyword)
    {
        $sql = "SELECT * FROM products WHERE name LIKE ? ORDER BY created_at DESC";
        return $this->query($sql, ["%$keyword%"])->fetchAll(\PDO::FETCH_ASSOC);
    }
}
?>