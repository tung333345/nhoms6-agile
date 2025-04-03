<?php

ob_start();
class ClientController
{
    private $clientModel;

    public function __construct()
    {
        $pdo = connectDB();
        $this->clientModel = new ClientModel($pdo);
    }


    public function search()
    {
        if (isset($_REQUEST['query'])) {
            $query = htmlspecialchars($_REQUEST['query']);
            $itemsPerPage = 9;
            $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            $offset = ($currentPage - 1) * $itemsPerPage;
            $products = $this->clientModel->search($query, $itemsPerPage, $offset);
            $totalProducts = $this->clientModel->getTotalProductsBySearch($query);

            $totalPages = ceil($totalProducts / $itemsPerPage);
            $parentCategories = $this->clientModel->getAllParentCategories();
            $categories = [];
            foreach ($parentCategories as $parentCategory) {
                $categories[$parentCategory['id']] = $this->clientModel->getCategoriesByParentIdClient($parentCategory['id']);
            }
            $slides7 = $this->clientModel->getAllSlidesId_7();
            $slides8 = $this->clientModel->getAllSlidesId_8();
            $slides9 = $this->clientModel->getAllSlidesId_9();
            $slides10 = $this->clientModel->getAllSlidesId_10();
            include './views/searchProduct.php';
        } else {
            $products = [];
            include './views/searchProduct.php';
        }
    }

    public function showHome()
    {
        $getEndTime = $this->clientModel->getEndTime();

        $productsMaxDiscount = $this->clientModel->getProductWithMaxDiscount();
        $categories = $this->clientModel->getAllCategoryClient();
        $parentCategories = $this->clientModel->getAllParentCategories(); // Lấy tất cả danh mục cha
        $categories = [];
        foreach ($parentCategories as $parentCategory) {
            $categories[$parentCategory['id']] = $this->clientModel->getCategoriesByParentIdClient($parentCategory['id']);
        }

        // Lấy danh sách sản phẩm có lượt xem nhiều nhất
        $topProducts = $this->clientModel->getTopProducts();
        $slides1 = $this->clientModel->getAllSlidesId_1();
        $slides2 = $this->clientModel->getAllSlidesId_2();
        $slides3 = $this->clientModel->getAllSlidesId_3();
        $slides4 = $this->clientModel->getAllSlidesId_4();
        $slides5 = $this->clientModel->getAllSlidesId_5();
        $slides6 = $this->clientModel->getAllSlidesId_6();
        $slides7 = $this->clientModel->getAllSlidesId_7();
        $slides8 = $this->clientModel->getAllSlidesId_8();
        $slides9 = $this->clientModel->getAllSlidesId_9();
        $slides10 = $this->clientModel->getAllSlidesId_10();


        $products1 = $this->clientModel->getProductsByParent_3();
        $products2 = $this->clientModel->getProductsByParent_4();
        $products3 = $this->clientModel->getProductsByParent_5();
        $products4 = $this->clientModel->getProductsByParent_6();
        $products5 = $this->clientModel->getProductsByParent_7();
        $products6 = $this->clientModel->getProductsByParent_8();
        include './views/home-fe.php'; // Hiển thị trang chủ
    }
    public function getMaxDiscountProduct()
    {
        $productsMaxDiscount = $this->clientModel->getProductWithMaxDiscount();
    }
    public function showHomeParent($ids = [])
    {
        $parentCategories = [];
        foreach ($ids as $id) {
            $parentCategories[] = $this->clientModel->getParentCategoryById($id);
        }
    }

    public function showProductsByCategory($categoryId)
    {
        $products = $this->clientModel->getProductsByCategoryId($categoryId);
        include './views/products_category.php';
    }

   

    public function listCategories()
    {
        $category_client = $this->clientModel->getAllCategoryClient();
    }


    public function topViewProduct($id)
    {
        // Tăng số lượt click
        $this->clientModel->incrementClick($id);

        // Lấy danh sách sản phẩm có lượt xem nhiều nhất
        $topProducts = $this->clientModel->getTopProducts();

        // // Gọi view và truyền dữ liệu
        // include 'views/home-fe.php';
    }

    public function submitComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productID = $_POST['product_id'];
            $userId = $_SESSION['user']['User_id'];
            $commentContent = $_POST['comment_content'];
            $rating = isset($_POST['rating']) ? $_POST['rating'] : 0;

            if (empty($commentContent) || $rating < 1 || $rating > 5) {
                $_SESSION['flash_message'] = "Vui lòng nhập đầy đủ nội dung và chọn số sao đánh giá!";
                header("Location:index.php?act=showProductDetail&id=".urlencode($productID));
                exit();
            }
    
            $success = $this->clientModel->addComment($productID, $userId, $commentContent, $rating);
    
            if ($success) {
                $_SESSION['flash_message'] = "Bình luận đã được gửi thành công!";
            } else {
                $_SESSION['flash_message'] = "Có lỗi xảy ra khi gửi bình luận. Vui lòng thử lại.";
            }
    
            // Chuyển hướng về trang chi tiết sản phẩm
            header("Location:index.php?act=showProductDetail&id=".urlencode($productID));

            exit();
        } else {
            // Nếu không phải POST request, chuyển hướng về trang chủ
            header("Location: index.php");
            exit();
        }
    }

    // Hiển thị chi tiết sản phẩm
    public function showProductDetail($id)
    {
        $product = $this->clientModel->getProductById($id);
        if ($product) {
            $categoryId = $product['Id_cat'];
            $relatedProducts = $this->clientModel->getTopViewedProductsByCategory($product['Id_cat']);
            // Lấy danh sách bình luận
            $comments = $this->clientModel->getCommentsByProductId($id);
            // Lấy thống kê đánh giá
            $ratingSummary = $this->clientModel->getProductRatingSummary($id);
            
            include './views/productDetailView.php';
        } else {
            include 'views/404.php';
        }
    }



    public function login_client()
    {
        include_once './views/login-fe.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn-login-client'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->clientModel->checkAccClient($username, $password);
            // var_dump($user);
            // die;
            if ($user) {
                if ($password != $user['password']) {
                    // Mật khẩu sai
                    echo '<script>alert("Sai mật khẩu!");</script>';
                } else {
                    $_SESSION['user'] = $user;
                    header("Location: index.php?act=home");
                    exit();
                }
            } else {
                echo '<script>alert("Sai tên đăng nhập hoặc mật khẩu!");</script>';
                exit();
            }
        }
    }

    public function register_client()
    {
        $MESSAGE = ""; // Biến chứa thông báo
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirmPassword']; // Lấy mật khẩu xác nhận
            $name = $_POST['name'];
            $phone_number = trim($_POST['phone_number']);
            $email = $_POST['email'];
            $birthday = !empty($_POST['birthday']) ? $_POST['birthday'] : null;
            $gender = !empty($_POST['gender']) ? $_POST['gender'] : null;
    
            // Kiểm tra dữ liệu đầu vào
            if (empty($username) || empty($password) || empty($confirm_password) || empty($name) || empty($phone_number)) {
                $MESSAGE = "Vui lòng nhập đầy đủ thông tin bắt buộc.";
            } elseif ($password !== $confirm_password) {
                $MESSAGE = "Mật khẩu và mật khẩu xác nhận không trùng khớp."; // Kiểm tra mật khẩu
            } elseif (strlen($password) < 6) {
                $MESSAGE = "Mật khẩu phải có ít nhất 6 ký tự.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
                $MESSAGE = "Email không đúng định dạng.";
            } else {
                if ($this->clientModel->register_client($username, $password, $name, $phone_number, $email, $birthday, $gender)) {
                    $MESSAGE = "Đăng ký thành công! Vui lòng đăng nhập.";
                    include 'views/login-fe.php';
                    exit();
                } else {
                    $MESSAGE = "Đăng ký không thành công. Vui lòng thử lại.";
                }
            }
        }
    
        // Hiển thị lại form với thông báo lỗi (nếu có)
        include 'views/register-fe.php';
    }
    

    public function logout_client()
    {
        unset($_SESSION['user']);
        echo '<script type="text/javascript">
        window.location.href = "index.php?act=home";
      </script>';
        exit();
    }

    public function forgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $newPassword = $_POST['new_password'];

            if ($this->clientModel->resetPassword($username, $newPassword)) {
                $message = "Mật khẩu đã được đặt lại thành công.";
                include 'views/login-fe.php';
            } else {
                $error = "Không thể đặt lại mật khẩu.";
                include 'views/forgot-password.php';
            }
        } else {
            include 'views/forgot-password.php';
        }
    }


    // Hiển thị sản phẩm trong giỏ hàng
    public function viewCart() {
        // Kiểm tra session giỏ hàng
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        
        // Lấy dữ liệu giỏ hàng từ session
        $cartItems = $this->clientModel->getCartItems();
        
        // Load view giỏ hàng
        include './views/Gio_hang-fe.php';
    }

    // thêm sản phẩm vào giỏ hàng

    public function addToCart() {
        try {
            // Kiểm tra phương thức request
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception("Invalid request method");
            }
    
            // Kiểm tra đăng nhập
            if (!isset($_SESSION['user'])) {
                $_SESSION['flash_message'] = "Vui lòng đăng nhập để thêm vào giỏ hàng!";
                header("Location: index.php?act=login-client");
                exit();
            }
    
            // Lấy dữ liệu từ POST
            $userId = $_SESSION['user']['User_id'];
            $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
            $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    
            // Validate dữ liệu
            if ($productId <= 0) {
                throw new Exception("Invalid product ID");
            }
    
            // Gọi phương thức từ model để thêm vào giỏ hàng
            $success = $this->clientModel->addToCart($userId, $productId, $quantity);
    
            if ($success) {
                header("Location: index.php?act=showProductDetail&id=" . $productId . "&success=1");
            } else {
                header("Location: index.php?act=showProductDetail&id=" . $productId . "&success=0");
            }
            exit();
    
        } catch (Exception $e) {
            error_log("Error adding to cart: " . $e->getMessage());
            $_SESSION['flash_message'] = "Có lỗi xảy ra khi thêm vào giỏ hàng!";
            header("Location: index.php");
            exit();
        }
    }
    public function deleteCart() {
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
            
            // Sử dụng clientModel thay vì truy cập trực tiếp PDO
            $success = $this->clientModel->deleteCartItem($id);
            
            // Chuyển về trang giỏ hàng
            header("Location: index.php?act=viewCart");
            exit();
        }
        header("Location: index.php?act=viewCart");
        exit();
    }

    public function cancelOrder() {
        try {
            
            // Kiểm tra phương thức request
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception("Invalid request method");
            }
            
            // Kiểm tra đăng nhập
            if (!isset($_SESSION['user'])) {
                $_SESSION['flash_message'] = "Vui lòng đăng nhập để hủy đơn hàng!";
                header("Location: index.php?act=login-client");
                exit();
            }
    
            // Lấy dữ liệu từ POST
            $order_id = isset($_POST['order_id']) ? (int)$_POST['order_id'] : 0;
    
            // Validate dữ liệu
            if ($order_id <= 0) {
                throw new Exception("Invalid product ID");
            }
    
            // Gọi phương thức CancelOrder trong model
            $success = $this->clientModel->CancelOrder($order_id);
    
            
            // Kiểm tra kết quả và chuyển hướng
            if ($success && $success['success']) {
                $_SESSION['flash_message'] = "Hủy đơn hàng thành công!";
                header("Location: index.php?act=lich-su-mua-hang");
            } else {
                $_SESSION['flash_message'] = "Không thể hủy đơn hàng. Vui lòng thử lại!";
                header("Location: index.php?act=lich-su-mua-hang");
            }
            exit();
    
        } catch (Exception $e) {
            throw new Exception( $e->getMessage());
            // Log lỗi và xử lý ngoại lệ
            error_log("Error canceling order: " . $e->getMessage());
            $_SESSION['flash_message'] = "Có lỗi xảy ra khi hủy đơn hàng!";
            header("Location: index.php?act=lich-su-mua-hang");
            exit();
        }
    }
    
    public function BuyNow($productId) {
        try {

            // Kiểm tra đăng nhập
            if (!isset($_SESSION['user'])) {
                $_SESSION['flash_message'] = "Vui lòng đăng nhập để thêm vào giỏ hàng!";
                header("Location: index.php?act=login-client");
                exit();
            }
    
            // Lấy dữ liệu từ POST
            $userId = $_SESSION['user']['User_id'];
            $quantity = 1;
    
            // Validate dữ liệu
            if ($productId <= 0) {
                throw new Exception("Invalid product ID");
            }
    
            // Gọi phương thức từ model để thêm vào giỏ hàng
            $success = $this->clientModel->addToCart($userId, $productId, $quantity);
    
            $cartId = $this->clientModel->getCartIdByProductId($userId, $productId);
            if ($success) {
                header("Location: index.php?act=checkout&cart_ids=" . $cartId);
            } else {
                header("Location: index.php?act=showProductDetail&id=" . $productId . "&success=0");
            }
            exit();
    
        } catch (Exception $e) {
            error_log("Error adding to cart: " . $e->getMessage());
            throw new Exception("Error adding to cart: " . $e->getMessage());
            exit();
        }
    }
    
    

    public function updateCartQuantity() {
        try {
            
            // Kiểm tra phương thức request
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception("Invalid request method");
            }
    
            // Kiểm tra đăng nhập
            if (!isset($_SESSION['user'])) {
                $_SESSION['flash_message'] = "Vui lòng đăng nhập để cập nhật giỏ hàng!";
                header("Location: index.php?act=login-client");
                exit();
            }
    
            // Lấy dữ liệu từ POST
            $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
            $isAdd = isset($_POST['is_add']) ? filter_var($_POST['is_add'], FILTER_VALIDATE_BOOLEAN) : null;
    
            // Validate dữ liệu
            if ($productId <= 0) {
                throw new Exception("Invalid product ID");
            }
            if ($isAdd === null) {
                throw new Exception("Invalid isAdd value");
            }
    
            // Gọi hàm updateCartQuantity
            $success = $this->clientModel->updateCartQuantity($productId, $isAdd);
    
            // Chuyển hướng dựa vào kết quả
            if ($success) {
                $_SESSION['flash_message'] = "Cập nhật giỏ hàng thành công!";
                header("Location: index.php?act=viewCart");
            } else {
                $_SESSION['flash_message'] = "Cập nhật giỏ hàng thất bại!";
                header("Location: index.php?act=viewCart");
            }
            exit();
    
        } catch (Exception $e) {
            // Ghi log lỗi và chuyển hướng
            error_log("Error updating cart: " . $e->getMessage());
            $_SESSION['flash_message'] = "Có lỗi xảy ra khi cập nhật giỏ hàng!";
            header("Location: index.php?act=viewCart");
            exit();
        }
    }
    

    public function checkout() {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?act=login-client");
            exit();
        }
    
        // Lấy thông tin người dùng
        $userId = $_SESSION['user']['User_id'];
        $user = $this->clientModel->getUserById($userId); // Gọi phương thức để lấy thông tin người dùng
    
        // Lấy ID của các bản ghi trong bảng cart từ URL
        $cartIds = isset($_GET['cart_ids']) ? explode(',', $_GET['cart_ids']) : [];
    
        // Kiểm tra xem có ID nào không
        if (empty($cartIds)) {
            echo "ID giỏ hàng không hợp lệ.";
            exit();
        }
    
        // Lấy sản phẩm từ bảng cart dựa trên user_id và cart_ids
        $selectedProducts = [];
        foreach ($cartIds as $cartId) {
            $cartId = (int)$cartId; // Ép kiểu sang số nguyên
            if ($cartId > 0) {
                $selectedProduct = $this->clientModel->getCartItemByUserIdAndCartId($userId, $cartId);
                if ($selectedProduct) {
                    $selectedProducts[] = $selectedProduct; // Thêm sản phẩm vào mảng
                }else {
                echo "Không tìm thấy sản phẩm với cartId: $cartId"; // Debug nếu không có sản phẩm
                }
         }
        }
    
        // Nếu không tìm thấy sản phẩm nào, thông báo lỗi
        if (empty($selectedProducts)) {
            echo "Không tìm thấy sản phẩm nào trong giỏ hàng.";
            exit();
        }
    
        // Tính tổng tiền cho tất cả sản phẩm được chọn
        $totalPrice = 0;
        foreach ($selectedProducts as $product) {
            $totalPrice += $product['price'] * $product['quantity'];
        }
    
        // Hiển thị view checkout
        include './views/checkout.php';
    }
    public function processOrder() {
        try {
            if (!isset($_SESSION['user'])) {
                header("Location: index.php?act=login-client");
                exit();
            }
    
            $userId = $_SESSION['user']['User_id'];
    
            // Lấy trạng thái đơn hàng (linh hoạt)
            $status_id = isset($_POST['status_id']) ? intval($_POST['status_id']) : 1;
            $cart_ids = isset($_POST['cart_ids']) ? $_POST['cart_ids'] : "";
            // Lấy và kiểm tra dữ liệu
            $totalPrice = isset($_POST['total_price']) ? floatval($_POST['total_price']) : 0;
            if ($totalPrice <= 0) {
                throw new Exception("Tổng tiền không hợp lệ");
            }
    
            // Xử lý địa chỉ
            $deliveryMethod = $_POST['delivery_method'] ?? '';
            $fullAddress = '';
    
            if ($deliveryMethod === 'store') {
                $storeCity = $_POST['store_city'] ?? '';
                $storeDistrict = $_POST['store_district'] ?? '';
                $storeLocation = $_POST['store_location'] ?? '';
                $fullAddress = "$storeLocation, $storeDistrict, $storeCity";
            } else {
                $city = $_POST['delivery_city'] ?? '';
                $district = $_POST['delivery_district'] ?? '';
                $ward = $_POST['delivery_ward'] ?? '';
                $address = $_POST['delivery_address'] ?? '';
                $fullAddress = "$address, $ward, $district, $city";
            }
    
            $notes = $_POST['note'] ?? '';
    
            // Debug giá trị trước khi gọi createOrder
            // var_dump([
            //     'userId' => $userId,
            //     'totalPrice' => $totalPrice,
            //     'fullAddress' => $fullAddress,
            //     'notes' => $notes,
            //     'status_id' => $status_id,

            // ]);  

            // Tạo đơn hàng
            $orderResult = $this->clientModel->createOrder(
                $userId, 
                $totalPrice,
                $fullAddress, 
                $notes,
                $status_id

            );
           
            // var_dump($orderResult);
            // die;


            if (!$orderResult || !isset($orderResult['Order_id'])) {
            
                 throw new Exception("Không thể tạo đơn hàng - Kiểm tra log để biết chi tiết");
            }
            
           
            $orderId = $orderResult['Order_id'];

            // Lấy sản phẩm từ giỏ hàng
            $cartItems = $this->clientModel->getCartItemsByUserId($userId);
            if (empty($cartItems)) {
                throw new Exception("Giỏ hàng trống");
            }
    
            
            // Lưu chi tiết đơn hàng
            foreach ($cartItems as $item) {
                if (str_contains($cart_ids, $item['id'])){
                    $saveResult = $this->clientModel->saveOrderDetail(
                        $orderId,
                        $item['product_id'],
                        $item['quantity'],
                        $item['price']
                    );
        
                    if (!$saveResult) {
                        throw new Exception("Lỗi khi lưu chi tiết đơn hàng");
                    }
                }
            }
    
            // Xóa giỏ hàng
            foreach ($cartItems as $item) {
                if (str_contains($cart_ids, $item['id'])){
                    $this->clientModel->deleteCartItem($item['id']);
                }
                
            }
    
            header("Location: index.php?act=paymen");
            exit();
    
        } catch (Exception $e) {
            error_log("Process Order Error: " . $e->getMessage());
            echo "Có lỗi xảy ra: " . $e->getMessage();
        }
    }
    
    

    public function paymen() {
        try {
            if (!isset($_SESSION['user'])) {
                header("Location: index.php?act=login-client");
                exit();
            }

            // Lấy đơn hàng mới nhất
            $order = $this->clientModel->getLatestOrderWithoutUser();
            
            if (!$order) {
                $_SESSION['error'] = "Không tìm thấy thông tin đơn hàng";
                include './views/paymen.php';
                return;
            }

            $userInfo = $this->clientModel->getUserInfoForOrder($order['user_id']);
            $orderDetails = $this->clientModel->getOrderDetailsByOrderId($order['Order_id']);
            $totalQuantity = $this->clientModel->getOrderTotalQuantity($order['Order_id']);
            $totalAmount = $this->clientModel->getOrderTotal($order['Order_id']);

            // Load view payment
            include './views/paymen.php';

        } catch (Exception $e) {
            error_log("Payment error: " . $e->getMessage());
            echo "Có lỗi xảy ra: " . $e->getMessage();
        }
    }
    public function account() {
        if (!isset($_SESSION['user'])) {
            $message = "Vui lòng đăng nhập để xem thông tin tài khoản";
            include './views/login-fe.php';
            return;
        }
    
        $userId = $_SESSION['user']['User_id'];
        $userProfile = $this->clientModel->getUserAccount($userId);
    
        if (!$userProfile) {
            $message = "Không tìm thấy thông tin tài khoản!";
            // include './views/error.php'; // Tạo một trang lỗi thân thiện
            return;
        }
    
        include './views/account.php';
    }

    public function updateUserAccount() {
        header('Content-Type: application/json');
        
        try {
            if (!isset($_SESSION['user'])) {
                throw new Exception('Vui lòng đăng nhập');
            }

            if (!isset($_POST['field']) || !isset($_POST['value'])) {
                throw new Exception('Thiếu thông tin');
            }

            $userId = $_SESSION['user']['User_id'];
            $field = trim($_POST['field']);
            $value = trim($_POST['value']);

            $result = $this->clientModel->updateAccount($userId, $field, $value);

            if ($result) {
                // Cập nhật session ngay lập tức
                $_SESSION['user'][$field] = $value;
                
                echo json_encode([
                    'success' => true,
                    'value' => $value
                ]);
            } else {
                echo json_encode([
                    'success' => false
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'success' => false
            ]);
        }
        exit();
    }
    
    

  
   


    public function lichSuMuaHang(){
        if(isset($_SESSION['user'])){
            // Lấy ra thông tin tài khoản đăng nhập
            $userId = $_SESSION['user']['User_id'];

            $userInfo = $this->clientModel->getUserInfoForOrder($userId);

            // $arrTrangThaiDonHang = $this->clientModel->getTrangThaiDonHang();
            // $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'status_name', 'id');
            // echo "<pre>";
            // print_r($trangThaiDonHang);
            // die;

            $donHangs = $this->clientModel->getDonHangFromUser($userId);

            include './views/lichSuMuaHang.php';

        }else{
           header('Location: index.php?act=login-client');
           exit();
        }
    }

    public function chiTietMuaHang() {
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user']['User_id'];
    
            // Kiểm tra sự tồn tại của 'Order_id'
            if (!isset($_GET['Order_id']) || empty($_GET['Order_id'])) {
                echo "Mã đơn hàng không được cung cấp hoặc không hợp lệ.";
                header('Location: index.php?act=chi-tiet-mua-hang');
                exit();
            }
    
            // Chuyển đổi Order_id từ chuỗi sang kiểu int
            $orderId = (int) $_GET['Order_id'];
    
            // Kiểm tra lại giá trị của orderId nếu cần
            if ($orderId <= 0) {
                echo "Mã đơn hàng không hợp lệ.";
                header('Location: index.php?act=chi-tiet-mua-hang');
                exit();
            }
    
            $userInfo = $this->clientModel->getUserInfoForOrder($userId);
    
            // Lấy thông tin đơn hàng
            $muaHang = $this->clientModel->getDonHangById($orderId);
            
            $chiTietMuaHang = $this->clientModel->getChiTietDonHangByDonHangId($orderId);

    
            if ($muaHang) {
                include './views/chiTietMuaHang.php';
            } else {
                echo "Không tìm thấy thông tin đơn hàng.";
                exit();
            }
        } else {
            header('Location: index.php?act=login-client');
            exit();
        }
    }
    
    
    
    


    
    
    public function showStoreMap() {
        // Có thể thêm logic để lấy danh sách cửa hàng từ database
        $stores = [
            [
                'name' => 'CellphoneS Hà Nội',
                'lat' => 21.0285,
                'lng' => 105.8542,
                'address' => '123 Đường Láng, Đống Đa, Hà Nội'
            ],
            [
                'name' => 'CellphoneS Hồ Chí Minh', 
                'lat' => 10.7769,
                'lng' => 106.7009,
                'address' => '456 CMT8, Quận 3, TP.HCM'
            ],
            // Thêm các cửa hàng khác
        ];

        include './views/store-map.php';
        include './views/footer-fe.php';
    }
}

ob_end_flush();
?>