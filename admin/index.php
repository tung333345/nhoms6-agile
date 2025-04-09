<?php
session_start();
ob_start();
require_once '../commons/function.php';
require_once 'controllers/DashboardController.php';
require_once 'models/DashboardModel.php';
require_once 'controllers/ProductController.php';
require_once 'models/ProductModel.php';
require_once 'controllers/CategoryController.php';
require_once 'models/CategoryModel.php';
require_once 'controllers/UserAdminController.php';
require_once 'models/UserAdminModel.php';
require_once 'controllers/UserController.php';
require_once 'models/UserModel.php';
require_once 'controllers/accController.php';
require_once 'models/accModel.php';
require_once 'models/SlideModel.php';
require_once 'controllers/SlideController.php';
require_once 'controllers/commentController.php';
require_once 'models/commentModel.php';
require_once 'models/OrderModel.php';
require_once 'controllers/AdminController.php';
require_once 'models/UserOrderModel.php';

// Khởi tạo các controller
$productController = new ProductController();
$categoryController = new CategoryController();
$parentCategoryController = new CategoryController();
$userAdminController = new UserAdminController();
$userController = new UserController();
$accController = new accController();
$dashboardController = new DashboardController();
$slideModel = new SlideModel();
$slideController = new SlideController();
$commentController = new CommentController();
$orderModel = new OrderModel();
$userOrderModel = new UserOrderModel();
$adminController = new AdminController($orderModel, $userOrderModel);
// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_admin']) && (!isset($_GET['act']) || $_GET['act'] != 'login')) {
    header("Location: ../admin/index.php?act=login");
    exit();
}

$act = $_GET['act'] ?? 'dashboard';
$userId = isset($_GET['user_id']) ? $_GET['user_id'] : null;
$orderId = isset($_GET['order_id']) ? $_GET['order_id'] : null;
switch ($act) {
    case 'login':
        $accController->login();
        break;
    case 'logout':
        $accController->logout();
        break;
    case 'listProduct':
        $productController->listProducts();
        break;
    case 'insertProduct':
        $productController->insertProduct();
        break;
    case 'editProduct':
        $productController->loadViewEditProduct($_GET['id']);
        break;
    case 'deleteProduct':
        $productController->deleteProduct($_GET['id']);
        break;
    case 'updateProduct':
        $productController->updateProduct($_GET['id']);
        break;

    case 'listCategories':
        $categoryController->displayCategories();
        break;
    case 'addCategory':
        $categoryController->addCategory();
        break;
    case 'form-edit-category':
        $categoryController->formEditCategory();
        break;
    case 'editCategory':
        $categoryController->editCategory($_GET['id'] ?? null);
        break;
    case 'deleteCategory':
        $categoryController->deleteCategory($_GET['id']);
        break;

    case 'listParentCategories':
        $parentCategoryController->displayParentCategories();
        break;
    case 'addParentCategory':
        $parentCategoryController->addParentCategory();
        break;
    case 'form-edit-parent-category':
        $categoryController->formEditParentCategory();
        break;
    case 'editParentCategory':
        $parentCategoryController->editParentCategory($_GET['id'] ?? null);
        break;
    case 'deleteParentCategory':
        $parentCategoryController->deleteParentCategory($_GET['id']);
        break;

    case 'listUserAdmins':
        $userAdminController->listUserAdmins();
        break;
    case 'insertUserAdmin':
        $userAdminController->insertUserAdmin();
        break;
    case 'editUserAdmin':
        $userAdminController->editUserAdmin($_GET['id']);
        break;
    case 'deleteUserAdmin':
        $userAdminController->deleteUserAdmin($_GET['id']);
        break;

    case 'listUsers':
        $userController->listUsers();
        break;
    case 'insertUser':
        $userController->insertUser();
        break;
    case 'editUser':
        $userController->editUser($_GET['id']);
        break;
    case 'deleteUser':
        $userController->deleteUser($_GET['id']);
        break;

    case 'listSlides':
        $slideController->listSlides();
        break;
    case 'showInsertForm':
        $slideController->showInsertForm();
        break;
    case 'insertSlide':
        $slideController->insertSlide();
        break;
    case 'showEditForm':
        $slideController->showEditForm($_GET['id']);
        break;
    case 'updateSlide':
        $slideController->updateSlide();
        break;
    case 'deleteSlide':
        $slideController->deleteSlide($_GET['id']);
        break;

    case 'listProductsComment':
        $commentController->listProductsComment();
        break;
    case 'listComments':
        $commentController->listComments($_GET['product_id'] ?? 0);
        break;
    case 'formAddComment': {
        $commentController->formAddComment($_GET['product_id'] ?? 0);
        break;
    }
    case 'addComment':
        $commentController->addComment();
        break;
    case 'formEditComment':
        $commentController->formEditComment($_GET['id'] ?? 0);
        break;

    case 'editComment':
        $commentController->editComment($_GET['id']);
        break;

    case 'deleteComment':
        $commentController->deleteComment($_GET['id'] ?? 0);
        break;
    // case 'listOrders':
    //     $orderController->listOrders();
    //     break;
    // case 'formInsertOrder':
    //     $orderController->formInsertOrder();
    //     break;
    // case 'insertOrder':
    //     $orderController->insertOrder();
    //     break;
    // case 'editOrder':
    //     $orderId = $_GET['id'] ?? null;
    //     if ($orderId) {
    //         $orderController->editOrder($orderId);
    //     } else {
    //         echo "Order ID is required for editing.";
    //     }
    //     break;
    // case 'deleteOrder':
    //     $orderId = $_GET['id'] ?? null;
    //     if ($orderId) {
    //         $orderController->deleteOrder($orderId);
    //     } else {
    //         echo "Order ID is required for deletion.";
    //     }
    //     break;
    case 'viewUsersWithOrders':
        $adminController->viewUsersWithOrders();
        break;

    case 'createOrder':
        $delivererId = $_POST['deliverer_id'];
        $totalPrice = $_POST['total_price'];
        $deliveryAddress = $_POST['delivery_address'];
        $note = $_POST['note'];
        $statusId = $_POST['status_id'];
        $adminController->createOrder($userId, $delivererId, $totalPrice, $deliveryAddress, $note, $statusId);
        break;
    case 'viewOrder':
        $adminController->viewOrder($_GET['id']);
        break;

    case 'viewOrders':

        $adminController->viewOrdersByUser($_GET['id']);

        break;
    case 'updateOrderStatus':
        // Kiểm tra xem Order ID có tồn tại không
        if (isset($orderId) && !empty($orderId)) {
            $statusId = $_POST['status_id'] ?? null;
            // $userId = $_SESSION['user_id'] ?? null;
            // Kiểm tra xem Status ID có tồn tại không
            if (isset($statusId) && !empty($statusId)) {
                $adminController->updateOrderStatus($orderId, $statusId);
                // unset($_SESSION['user_id']);
                // session_destroy();
            } else {
                echo "Status ID is required."; // Thông báo nếu Status ID không được cung cấp
            }
        } else {
            echo "Order ID is required."; // Thông báo nếu Order ID không được cung cấp
        }
        break;
    case 'deleteOrder':
        $orderId = $_GET['id'] ?? null;
        if ($orderId) {
            $adminController->deleteOrder($orderId);
        } else {
            echo "Order ID is required.";
        }
        break;
    case 'editOrder':
        $totalPrice = $_POST['total_price'];
        $deliveryAddress = $_POST['delivery_address'];
        $note = $_POST['note'];
        $statusId = $_POST['status_id'];
        $adminController->editOrder($orderId, $totalPrice, $deliveryAddress, $note, $statusId);
        break;
    case 'header':
        $productController->header();
        break;

    case 'dashboard':
        $dashboardController->showDashboard();
        break;

    default:
        // Xử lý trường hợp không hợp lệ
        header("Location: ../admin/index.php?act=dashboard");
        exit();
}
?>