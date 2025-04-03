<?php
class DashboardModel
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=duanmau1', 'root', '');
    }
    public function getTotalUsers()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) as total FROM user");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getTotalComments()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) as total FROM comments");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getTotalProducts()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) as total FROM products");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getTotalCategories()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) as total FROM category");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}
?>