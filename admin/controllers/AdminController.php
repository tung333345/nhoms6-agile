<?php
class AdminController
{

    private $orderModel;
    private $userOrderModel;

    public function __construct($orderModel, $userOrderModel)
    {
        $this->orderModel = $orderModel;
        $this->userOrderModel = $userOrderModel;
    }

    public function viewUsersWithOrders()
    {
        $users = $this->userOrderModel->getUsersWithOrders();
        include 'views/orders/usersView.php';
    }

    public function createOrder($userId, $delivererId, $totalPrice, $deliveryAddress, $note, $statusId)
    {
        $this->orderModel->createOrder($userId, $delivererId, $totalPrice, $deliveryAddress, $note, $statusId);
        header("Location: /admin/order/view/$userId");
    }

    public function viewOrder($orderId)
    {
        $order = $this->orderModel->getOrderById($orderId);

        // Kiểm tra nếu không tìm thấy đơn hàng
        if (!$order) {
            echo "Không tìm thấy đơn hàng với ID: $orderId";
            return; // Dừng thực thi nếu không tìm thấy
        }
        $statuses = $this->orderModel->getAllStatuses();

        // Định dạng mảng trạng thái
        $statusList = [];
        foreach ($statuses as $status) {
            $statusList[$status['id']] = $status['status_name']; // Lưu trạng thái theo ID
        }
        $orderDetails = $this->orderModel->getOrderDetailsByOrderId($orderId); // Lấy chi tiết đơn hàng
        include 'views/orders/orderView.php'; // Chuyển đến view
    }

    public function viewOrdersByUser($userId)
    {
        // Lấy tất cả trạng thái từ cơ sở dữ liệu
        $statuses = $this->orderModel->getAllStatuses();

        // Định dạng mảng trạng thái
        $statusList = [];
        foreach ($statuses as $status) {
            $statusList[$status['id']] = $status['status_name']; // Lưu trạng thái theo ID
        }

        // Lấy đơn hàng theo userId
        $orders = $this->orderModel->getOrdersByUserId($userId);

        // Chuyển đến view
        include 'views/orders/ordersView.php';
    }
    public function deleteOrder($orderId)
    {
        $this->orderModel->deleteOrder($orderId);
        header("Location: ?act=dashboard");
        exit();
    }
    public function updateOrderStatus($orderId, $statusId)
    {
        if ($this->orderModel->updateOrderStatus($orderId, $statusId)) {

            header("Location: ?act=dashboard");

            exit();
        } else {
            echo "Cập nhật trạng thái không thành công.";
        }
    }
    // public function updateOrderStatus($orderId, $statusId)
// {
// if ($this->orderModel->updateOrderStatus($orderId, $statusId)) {
// $previousPage = $_POST['previous_page'] ?? '/admin/order/view/' . $orderId;
// header("Location: $previousPage");
// exit();
// } else {
// echo "Cập nhật trạng thái không thành công.";
// }
// }
    public function editOrder($orderId, $totalPrice, $deliveryAddress, $note, $statusId)
    {
        $this->orderModel->editOrder($orderId, $totalPrice, $deliveryAddress, $note, $statusId);
        header("Location: /admin/order/view/$orderId");
    }
}
?>