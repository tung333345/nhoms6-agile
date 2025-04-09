<?php
class OrderModel
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=duanmau1', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getOrderDetailById($orderId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM order_detail WHERE Order_id = ?");
        $stmt->execute([$orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về mảng hoặc false
    }

    public function getOrderDetailsByOrderId($orderId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM order_detail WHERE Order_id = ?");
        $stmt->execute([$orderId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOrderById($orderId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM order_pro WHERE order_id = ?");
        $stmt->execute([$orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getOrdersByUserId($userId)
    {

        $sql = "SELECT * FROM order_pro WHERE user_id = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':userId' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllStatuses()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM order_status");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllOrders()
    {
        $stmt = $this->pdo->prepare("SELECT o.*, s.status_name FROM order_pro o JOIN status s ON o.status_id = s.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateOrderStatus($orderId, $statusId)
    {
        $stmt = $this->pdo->prepare("UPDATE order_pro SET status_id = :status_id WHERE order_id = :order_id");
        $stmt->bindParam(':status_id', $statusId, PDO::PARAM_INT);
        $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function deleteOrder($orderId)
    {
        $stmt = $this->pdo->prepare("DELETE FROM order_detail WHERE Order_id = ?");
        $stmt->execute([$orderId]);
        $stmt = $this->pdo->prepare("DELETE FROM order_pro WHERE Order_id = ?");
        return $stmt->execute([$orderId]);
    }



}
?>