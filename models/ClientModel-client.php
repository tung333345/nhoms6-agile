<?php
class ClientModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function search($query, $limit, $offset)
    {
        $statement = $this->pdo->prepare("SELECT products.*, category.Category_name, parentcate.parent_name 
        FROM products 
        LEFT JOIN category ON products.Id_cat = category.id
        LEFT JOIN parentcate ON category.Parent_id = parentcate.id
        WHERE LOWER(products.Name_product) LIKE LOWER(:query) 
        OR LOWER(category.Category_name) LIKE LOWER(:query) 
        OR LOWER(parentcate.parent_name) LIKE LOWER(:query)
        LIMIT :limit OFFSET :offset
    ");
        $statement->bindValue(':query', '%' . strtolower($query) . '%');
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsByCategoryId($categoryId)
    {
        $sql = "SELECT * FROM products WHERE Id_cat= ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByCategoryIdDetail($categoryId, $itemsPerPage, $offset)
    {
        try {
            $sql = "SELECT * FROM products WHERE Id_cat = :categoryId LIMIT :itemsPerPage OFFSET :offset";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
            $stmt->bindParam(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle error
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function getTotalProductsByCategoryId($categoryId)
    {
        $sql = "SELECT COUNT(*) FROM products WHERE Id_cat = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$categoryId]);
        return $stmt->fetchColumn();
    }
    public function getProductsByParentId($parentId, $limit, $offset)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE parent_cate = :parentId LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':parentId', $parentId);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalProductsByParentId($parentId)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM products WHERE parent_cate = :parentId");
        $stmt->bindParam(':parentId', $parentId);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getTotalProductsBySearch($query)
    {
        $statement = $this->pdo->prepare("SELECT COUNT(*) FROM products 
        LEFT JOIN category ON products.Id_cat = category.id
        LEFT JOIN parentcate ON category.Parent_id = parentcate.id
        WHERE LOWER(products.Name_product) LIKE LOWER(:query) 
        OR LOWER(category.Category_name) LIKE LOWER(:query) 
        OR LOWER(parentcate.parent_name) LIKE LOWER(:query)
    ");
        $statement->execute(['query' => '%' . strtolower($query) . '%']);
        return $statement->fetchColumn();
    }

    public function getEndTime()
    {
        $query = $this->pdo->prepare("SELECT end_time FROM countdown WHERE id = 1");
        $query->execute();
        return $query->fetchColumn();
    }
    public function getAllCategoryClient()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM category");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoriesByParentIdClient($parentId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM category WHERE parent_id = :parent_id");
        $stmt->bindParam(':parent_id', $parentId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllParentCategories()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM parentcate");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getParentCategoryById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM parentcate WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductWithMaxDiscount()
    {
        $sql = "SELECT *, COALESCE(discount, 0) AS discount FROM products ORDER BY discount DESC LIMIT 5";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getTopViewedProductsByCategory($categoryId)
    {
        $sql = "SELECT * FROM products WHERE Id_cat = :categoryId LIMIT 5";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':categoryId' => $categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByParent_3()
    {
        $sql = "SELECT * FROM products WHERE parent_cate = :categoryId ORDER BY clicks DESC LIMIT 10";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['categoryId' => 3]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByParent_4()
    {
        $sql = "SELECT * FROM products WHERE parent_cate = :categoryId ORDER BY clicks DESC LIMIT 5";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['categoryId' => 4]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByParent_5()
    {
        $sql = "SELECT * FROM products WHERE parent_cate = :categoryId ORDER BY clicks DESC LIMIT 5";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['categoryId' => 5]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByParent_6()
    {
        $sql = "SELECT * FROM products WHERE parent_cate = :categoryId ORDER BY clicks DESC LIMIT 5";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['categoryId' => 6]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByParent_7()
    {
        $sql = "SELECT * FROM products WHERE parent_cate = :categoryId ORDER BY clicks DESC LIMIT 5";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['categoryId' => 7]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // public function getProductByParent($id_parent)
    // {
    //     $stmt = $this->pdo->prepare("SELECT products.*, parentcate.id FROM products INNER JOIN parentcate  ON products.parent_cate = parentcate.id WHERE parent_cate :id ");
    //     $stmt->execute(['id' => $id_parent]);
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }


    function getProductsByParent_8()
    {
        $sql = "SELECT * FROM products WHERE parent_cate = :categoryId ORDER BY clicks DESC LIMIT 5";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['categoryId' => 8]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }





    public function getAllSlidesId_1()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM slides WHERE role_slide_id = :role_slide_id");
        $stmt->execute(['role_slide_id' => 1]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSlidesId_2()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM slides WHERE role_slide_id = :role_slide_id");
        $stmt->execute(['role_slide_id' => 2]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSlidesId_3()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM slides WHERE role_slide_id = :role_slide_id");
        $stmt->execute(['role_slide_id' => 3]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSlidesId_4()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM slides WHERE role_slide_id = :role_slide_id");
        $stmt->execute(['role_slide_id' => 4]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSlidesId_5()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM slides WHERE role_slide_id = :role_slide_id");
        $stmt->execute(['role_slide_id' => 5]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSlidesId_6()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM slides WHERE role_slide_id = :role_slide_id");
        $stmt->execute(['role_slide_id' => 6]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllSlidesId_7()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM slides WHERE role_slide_id = :role_slide_id");
        $stmt->execute(['role_slide_id' => 7]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllSlidesId_8()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM slides WHERE role_slide_id = :role_slide_id");
        $stmt->execute(['role_slide_id' => 8]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllSlidesId_9()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM slides WHERE role_slide_id = :role_slide_id");
        $stmt->execute(['role_slide_id' => 9]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllSlidesId_10()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM slides WHERE role_slide_id = :role_slide_id");
        $stmt->execute(['role_slide_id' => 10]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function incrementClick($id)
    {
        $stmt = $this->pdo->prepare("UPDATE products SET clicks = clicks + 1 WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function getTopProducts($limit = 5)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products ORDER BY clicks DESC LIMIT :limit");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function checkAccClient($username, $password)
    {
        try {
            $sql = "SELECT * FROM user WHERE username = :username";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':username' => $username]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function getTopViewedProducts()
    {
        $sql = "SELECT p.*, COUNT(v.id) AS view_count
                FROM products p
                JOIN product_views v ON p.id = v.product_id
                GROUP BY p.id
                ORDER BY view_count DESC
                LIMIT 10";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addComment($product_id, $user_id, $content, $rating)
    { //$phone_number) {
        try {
            // Validate input
            if (empty($product_id) || empty($user_id) || empty($content)) {
                throw new Exception("Invalid input data");
            }

            // Ensure user_id is an integer
            if (is_array($user_id)) {
                $user_id = (int) $user_id;
            }

            // Check if user exists
            $userCheck = $this->pdo->prepare("SELECT User_id FROM user WHERE User_id = ?");
            $userCheck->execute([$user_id]);
            //var_dump($user_id);

            if ($userCheck->rowCount() == 0) {
                throw new Exception("User does not exist" . $user_id);
            }

            // Prepare SQL statement with Phone_number
            $stmt = $this->pdo->prepare("INSERT INTO comments (product_id, user_id, comment_content, rating) VALUES (?, ?, ?, ?)");
            $stmt->execute([$product_id, $user_id, $content, $rating]);//$phone_number]);

            return true;
        } catch (PDOException $e) {
            echo "Error adding comment: " . $e->getMessage();
            return false;

        }
    }

    public function getCommentsByProductId($productId)
    {
        $sql = "
            SELECT c.comment_content, u.username, c.comment_time, c.rating
            FROM comments c
            INNER JOIN user u ON c.user_id = u.user_id
            WHERE c.product_id = :product_id
            ORDER BY c.comment_time DESC
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['product_id' => $productId]);
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $comments ?: [];  // Nếu không có bình luận, trả về mảng rỗng
    }



    public function register_client_hash($username, $password, $name, $phone_number, $email, $birthday, $gender)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        try {
            // Prepare SQL statement for inserting a new user
            $stmt = $this->pdo->prepare("INSERT INTO user (username, password, name, phone_number, email, birthday, gender) VALUES (:username, :password, :name, :phone_number, :email, :birthday, :gender)");
            // Execute the statement with the provided values
            $stmt->execute([':username' => $username, ':password' => $hashedPassword, ':name' => $name, ':phone_number' => $phone_number, ':email' => $email, ':birthday' => $birthday, ':gender' => $gender]);

            return true; // Registration successful
        } catch (PDOException $e) {
            // Handle any database connection or query errors
            echo "Error: " . $e->getMessage();
            return false; // Registration failed
        }
    }
    public function register_client($username, $password, $name, $phone_number, $email, $birthday, $gender)
    {
        try {
            // Prepare SQL statement for inserting a new user
            $stmt = $this->pdo->prepare("INSERT INTO user (username, password, name, phone_number, email, birthday, gender) VALUES (:username, :password, :name, :phone_number, :email, :birthday, :gender)");
            // Execute the statement with the provided values
            $stmt->execute([':username' => $username, ':password' => $password, ':name' => $name, ':phone_number' => $phone_number, ':email' => $email, ':birthday' => $birthday, ':gender' => $gender]);

            return true; // Registration successful
        } catch (PDOException $e) {
            // Handle any database connection or query errors
            echo "Error: " . $e->getMessage();
            return false; // Registration failed
        }
    }

    public function addToCart($userId, $productId, $quantity)
    {
        try {
            // Kiểm tra sản phẩm trong giỏ hàng
            $stmt = $this->pdo->prepare("SELECT quantity FROM cart WHERE user_id = ? AND product_id = ?");
            $stmt->execute([$userId, $productId]);
            $existingItem = $stmt->fetch();

            if ($existingItem) {
                // Cập nhật số lượng nếu sản phẩm đã tồn tại
                $newQuantity = $existingItem['quantity'] + $quantity;
                $stmt = $this->pdo->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
                return $stmt->execute([$newQuantity, $userId, $productId]);
            } else {
                // Thêm mới nếu sản phẩm chưa có trong giỏ hàng
                $stmt = $this->pdo->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
                return $stmt->execute([$userId, $productId, $quantity]);
            }
        } catch (PDOException $e) {
            error_log("Error in addToCart: " . $e->getMessage());
            return false;
        }
    }
    public function getCartIdByProductId($userId, $productId)
    {
        try {
            // Lấy ID của cart dựa trên product_id và user_id
            $stmt = $this->pdo->prepare("SELECT id FROM cart WHERE user_id = ? AND product_id = ?");
            $stmt->execute([$userId, $productId]);
            $cart = $stmt->fetch();

            if ($cart) {
                return $cart['id']; // Trả về ID nếu tìm thấy
            } else {
                return null; // Trả về null nếu không có cart tương ứng
            }
        } catch (PDOException $e) {
            error_log("Error in getCartIdByProductId: " . $e->getMessage());
            return null;
        }
    }


    public function getCartItems()
    {
        try {
            // Kiểm tra xem có user_id trong session không
            if (isset($_SESSION['user_id'])) {
                $sql = "SELECT c.*, sp.name_product, sp.price, sp.image 
                    FROM cart c 
                    JOIN products sp ON c.product_id = sp.id 
                    WHERE c.user_id = ?";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$_SESSION['user_id']]);
            } else {
                // Nếu không có user_id, lấy tất cả sản phẩm
                $sql = "SELECT c.*, sp.name_product, sp.price, sp.image 
                    FROM cart c 
                    JOIN products sp ON c.product_id = sp.id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
            }
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }



    public function deleteCartItem($id)
    {
        try {
            // Debug trước khi xóa
            error_log("Executing delete query for ID: " . $id);

            $sql = "DELETE FROM cart WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $result = $stmt->execute();

            // Debug sau khi xóa
            error_log("Rows affected: " . $stmt->rowCount());

            return $result && $stmt->rowCount() > 0;

        } catch (PDOException $e) {
            error_log("Error deleting cart item: " . $e->getMessage());
            return false;
        }
    }
    public function getCartItemByUserIdAndProductId($userId, $productId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT c.*, sp.name_product, sp.price, sp.image 
                                      FROM cart c 
                                      JOIN products sp ON c.product_id = sp.id 
                                      WHERE c.user_id = ? AND c.product_id = ?");
            $stmt->execute([$userId, $productId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null; // Trả về null nếu có lỗi
        }
    }

    public function getUserById($userId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM user WHERE User_id = ?");
            $stmt->execute([$userId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null; // Trả về null nếu có lỗi
        }
    }

    public function getCartItemsByUserId($userId)
    {
        try {
            $sql = "SELECT c.*, p.price, p.id as product_id 
                FROM cart c 
                JOIN products p ON c.product_id = p.id 
                WHERE c.user_id = :user_id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':user_id' => $userId]);

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            error_log("Cart items found for user $userId: " . print_r($result, true));
            return $result;

        } catch (PDOException $e) {
            error_log("Error getting cart items: " . $e->getMessage());
            return [];
        }
    }

    public function getCartItemByUserIdAndCartId($userId, $cartId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT c.*, p.name_product, p.price, p.image 
                                      FROM cart c 
                                      JOIN products p ON c.product_id = p.id 
                                      WHERE c.user_id = ? AND c.id = ?");
            $stmt->execute([$userId, $cartId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting cart item: " . $e->getMessage());
            return null;
        }
    }
    public function createOrder($userId, $totalPrice, $fullAddress, $notes, $status_id)
    {
        try {
            // Debug input values
            error_log("createOrder input values: " .
                "userId: $userId, " .
                "totalPrice: $totalPrice, " .
                "address: $fullAddress, " .
                "notes: $notes," .
                "status_id: $status_id ");
            //  throw new Exception($status_id);




            // Kiểm tra giá trị đầu vào
            if (!$userId || !$status_id || !$totalPrice) {

                error_log("Missing required values for order creation");
                throw new Exception("1");


                return false;
            }

            $sql = "INSERT INTO order_pro (user_id, Create_date, Total_Price, delivery_address, note, status_id) 
        VALUES (:user_id, NOW(), :total_price, :address, :notes, :status_id)";

            $stmt = $this->pdo->prepare($sql);

            // Bind values
            $params = [
                ':user_id' => $userId,
                ':total_price' => $totalPrice,
                ':address' => $fullAddress,
                ':notes' => $notes,
                ':status_id' => $status_id

            ];
            // var_dump($sql, $params);
            // die;


            // Debug SQL và parameters
            error_log("SQL Query: " . $sql);
            error_log("Parameters: " . print_r($params, true));

            $result = $stmt->execute($params);
            // Debug kết quả thực thi
            // var_dump($result, $stmt->errorInfo());
            // die;


            if (!$result) {

                error_log("SQL Error: " . print_r($stmt->errorInfo(), true));
                throw new Exception("2");

                return false;
            }

            $orderId = $this->pdo->lastInsertId();
            error_log("Order created successfully with ID: " . $orderId);

            return [
                'Order_id' => $orderId,
                'success' => true

            ];

        } catch (PDOException $e) {
            error_log("Database Error in createOrder: " . $e->getMessage());

            error_log("SQL State: " . $e->getCode());
            // throw new Exception("Thông báo lỗi". $e->getCode());


            // throw new Exception("3");


            return false;
        }
    }

    public function CancelOrder($order_id)
    {
        try {
            // Debug input value
            error_log("updateOrderStatus input value: productId: $order_id");

            // Kiểm tra giá trị đầu vào
            if (!$order_id) {
                error_log("Missing productId for updating order status");
                throw new Exception("Missing productId");
                return false;
            }

            // SQL query để cập nhật status_id thành 1
            $sql = "UPDATE order_pro SET status_id = 5 WHERE order_id = :order_id";

            // Chuẩn bị câu lệnh SQL
            $stmt = $this->pdo->prepare($sql);

            // Gán giá trị tham số
            $params = [
                ':order_id' => $order_id
            ];

            // Debug SQL và parameters
            error_log("SQL Query: " . $sql);
            error_log("Parameters: " . print_r($params, true));

            // Thực thi câu lệnh SQL
            $result = $stmt->execute($params);

            // Debug kết quả thực thi
            if (!$result) {
                error_log("SQL Error: " . print_r($stmt->errorInfo(), true));
                throw new Exception("Failed to update order status");
                return false;
            }

            error_log("Order status updated successfully for productId: " . $order_id);
            return [
                'success' => true,
                'Order_id' => $order_id
            ];

        } catch (PDOException $e) {
            // Log lỗi cơ sở dữ liệu
            error_log("Database Error in updateOrderStatus: " . $e->getMessage());
            error_log("SQL State: " . $e->getCode());
            return false;
        } catch (Exception $e) {
            // Log các lỗi khác
            error_log("Error in updateOrderStatus: " . $e->getMessage());
            return false;
        }
    }

    public function getLatestOrderWithoutUser()
    {
        try {
            // Lấy đơn hàng mới nhất từ bảng order_pro
            $sql = "SELECT * FROM order_pro 
                ORDER BY Create_date DESC 
                LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting latest order: " . $e->getMessage());
            return false;
        }
    }

    public function getCartItemCount($userId)
    {
        try {
            // SQL để lấy tổng số lượng sản phẩm trong giỏ hàng của người dùng từ bảng cart
            $sql = "SELECT COUNT(id) AS total_quantity
                FROM cart
                WHERE user_id = :user_id";

            // Chuẩn bị câu lệnh SQL và gán giá trị tham số
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);

            // Thực thi câu lệnh SQL
            $stmt->execute();

            // Lấy kết quả và trả về số lượng sản phẩm trong giỏ hàng
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result['total_quantity'] : 0; // Nếu không có sản phẩm thì trả về 0

        } catch (PDOException $e) {
            // Log lỗi nếu có và trả về false
            error_log("Error getting cart item count: " . $e->getMessage());
            return false;
        }
    }

    public function getOrderDetails($orderId)
    {
        try {
            $sql = "SELECT op.*, p.name, p.image, p.price 
                FROM order_pro_detail op
                JOIN products p ON op.product_id = p.id 
                WHERE op.order_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$orderId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting order details: " . $e->getMessage());
            return [];
        }
    }

    // public function processPayment($orderId, $paymentMethod) {
//     try {
//         $sql = "UPDATE order_pro 
//                 SET status_id = 2, 
//                     payment_method = ?,
//                     payment_status = 'Completed',
//                     updated_at = NOW() 
//                 WHERE id = ?";
//         $stmt = $this->pdo->prepare($sql);
//         return $stmt->execute([$paymentMethod, $orderId]);
//     } catch(PDOException $e) {
//         error_log("Error processing payment: " . $e->getMessage());
//         return false;
//     }
// }


    // public function updateOrderPayment($orderId, $paymentMethod) {
//     try {
//         $sql = "UPDATE order_pro 
//                 SET payment_method = ?,
//                     status_id = 2,
//                     updated_at = NOW() 
//                 WHERE id = ?";
//         $stmt = $this->pdo->prepare($sql);
//         return $stmt->execute([$paymentMethod, $orderId]);
//     } catch(PDOException $e) {
//         error_log("Error updating order payment: " . $e->getMessage());
//         return false;
//     }
// }



    public function getSelectedCartItems()
    {
        try {
            $sql = "SELECT * FROM cart WHERE user_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$_SESSION['user']['User_id']]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting cart items: " . $e->getMessage());
            return [];
        }
    }

    public function getUserInfoForOrder($userId)
    {
        try {
            $sql = "SELECT u.username, u.phone_number, u.email 
                FROM user u 
                WHERE u.User_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$userId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting user info: " . $e->getMessage());
            return false;
        }
    }



    public function getCartQuantity()
    {
        try {
            // Lấy số lượng từ cart dựa vào id giỏ hàng mới nhất
            $sql = "SELECT quantity FROM cart ORDER BY id DESC LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result ? (int) $result['quantity'] : 0;
        } catch (PDOException $e) {
            error_log("Error getting cart quantity: " . $e->getMessage());
            return 0;
        }
    }


    public function saveOrderDetail($orderId, $productId, $quantity, $price)
    {
        try {
            // Debug input values
            error_log("saveOrderDetail input: " .
                "orderId=$orderId, " .
                "productId=$productId, " .
                "quantity=$quantity, " .
                "price=$price");

            // Kiểm tra giá trị đầu vào
            if (!$orderId || !$productId || !$quantity || !$price) {
                error_log("Invalid input parameters");
                return false;
            }

            $sql = "INSERT INTO order_detail 
                (order_id, product_id, sale_quantity, price) 
                VALUES 
                (:order_id, :product_id, :quantity, :price)";

            $stmt = $this->pdo->prepare($sql);

            // Bind parameters với kiểu dữ liệu cụ thể
            $stmt->bindValue(':order_id', $orderId, PDO::PARAM_INT);
            $stmt->bindValue(':product_id', $productId, PDO::PARAM_INT);
            $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindValue(':price', $price);

            // Debug SQL
            error_log("SQL Query: " . $sql);
            error_log("Params: " . print_r([
                ':order_id' => $orderId,
                ':product_id' => $productId,
                ':quantity' => $quantity,
                ':price' => $price
            ], true));

            $result = $stmt->execute();

            if (!$result) {
                error_log("SQL Error: " . print_r($stmt->errorInfo(), true));
                return false;
            }

            error_log("Order detail saved successfully");
            return true;

        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            error_log("SQL State: " . $e->getCode());
            return false;
        }
    }

    public function updateCartQuantity($product_id, $isAdd)
    {
        try {
            // Debug input values
            error_log("updateCartQuantity input: " .
                "product_id=$product_id, " .
                "isAdd=" . ($isAdd ? 'true' : 'false'));

            // Kiểm tra giá trị đầu vào
            if (!$product_id) {
                error_log("Invalid product_id");
                return false;
            }

            // Lấy số lượng hiện tại
            $sqlSelect = "SELECT quantity FROM cart WHERE product_id = :product_id";
            $stmtSelect = $this->pdo->prepare($sqlSelect);
            $stmtSelect->bindValue(':product_id', $product_id, PDO::PARAM_INT);
            $stmtSelect->execute();
            $currentQuantity = $stmtSelect->fetchColumn();

            if ($currentQuantity === false) {
                error_log("Product not found in cart");
                return false;
            }

            // Tính toán số lượng mới
            $newQuantity = $isAdd ? $currentQuantity + 1 : max(0, $currentQuantity - 1);

            // Cập nhật số lượng mới
            $sqlUpdate = "UPDATE cart SET quantity = :quantity WHERE product_id = :product_id";
            $stmtUpdate = $this->pdo->prepare($sqlUpdate);
            $stmtUpdate->bindValue(':quantity', $newQuantity, PDO::PARAM_INT);
            $stmtUpdate->bindValue(':product_id', $product_id, PDO::PARAM_INT);

            // Debug SQL
            error_log("SQL Query: " . $sqlUpdate);
            error_log("Params: " . print_r([
                ':quantity' => $newQuantity,
                ':product_id' => $product_id
            ], true));

            $result = $stmtUpdate->execute();

            if (!$result) {
                error_log("SQL Error: " . print_r($stmtUpdate->errorInfo(), true));
                return false;
            }

            error_log("Cart quantity updated successfully");
            return true;

        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            error_log("SQL State: " . $e->getCode());
            return false;
        }
    }




    public function getOrderDetailsByOrderId($orderId)
    {
        try {
            $sql = "SELECT od.*, p.Name_product, p.Image 
                FROM order_detail od
                JOIN products p ON od.product_id = p.id
                WHERE od.order_id = :order_id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':order_id' => $orderId]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Error getting order details: " . $e->getMessage());
            return [];
        }
    }

    public function getOrderTotalQuantity($orderId)
    {
        try {
            $sql = "SELECT SUM(sale_quantity) as total_quantity 
                FROM order_detail 
                WHERE order_id = :order_id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':order_id' => $orderId]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total_quantity'] ?? 0;

        } catch (PDOException $e) {
            error_log("Error getting order total quantity: " . $e->getMessage());
            return 0;
        }
    }

    public function getOrderTotal($orderId)
    {
        try {
            $sql = "SELECT SUM(od.sale_quantity * od.price) as total_amount 
                FROM order_detail od 
                WHERE od.order_id = :order_id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':order_id' => $orderId]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total_amount'] ?? 0;

        } catch (PDOException $e) {
            error_log("Error calculating order total: " . $e->getMessage());
            return 0;
        }
    }

    public function getProductRatingSummary($productId)
    {
        try {
            $sql = "SELECT 
            COUNT(*) as total_reviews,
            COALESCE(ROUND(AVG(rating), 1), 0) as average_rating,
            COALESCE(SUM(CASE WHEN rating = 5 THEN 1 ELSE 0 END), 0) as five_star,
            COALESCE(SUM(CASE WHEN rating = 4 THEN 1 ELSE 0 END), 0) as four_star,
            COALESCE(SUM(CASE WHEN rating = 3 THEN 1 ELSE 0 END), 0) as three_star,
            COALESCE(SUM(CASE WHEN rating = 2 THEN 1 ELSE 0 END), 0) as two_star,
            COALESCE(SUM(CASE WHEN rating = 1 THEN 1 ELSE 0 END), 0) as one_star
        FROM comments 
        WHERE product_id = :product_id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':product_id' => $productId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Đảm bảo các giá trị không null
            $result['total_reviews'] = (int) $result['total_reviews'];
            $result['average_rating'] = (float) $result['average_rating'];

            // Tính phần trăm chỉ khi có đánh giá
            if ($result['total_reviews'] > 0) {
                $result['five_star_percent'] = round(($result['five_star'] / $result['total_reviews']) * 100);
                $result['four_star_percent'] = round(($result['four_star'] / $result['total_reviews']) * 100);
                $result['three_star_percent'] = round(($result['three_star'] / $result['total_reviews']) * 100);
                $result['two_star_percent'] = round(($result['two_star'] / $result['total_reviews']) * 100);
                $result['one_star_percent'] = round(($result['one_star'] / $result['total_reviews']) * 100);
            } else {
                // Gán giá trị mặc định khi không có đánh giá
                $result['five_star_percent'] = 0;
                $result['four_star_percent'] = 0;
                $result['three_star_percent'] = 0;
                $result['two_star_percent'] = 0;
                $result['one_star_percent'] = 0;
            }

            return $result;

        } catch (PDOException $e) {
            error_log("Error getting rating summary: " . $e->getMessage());
            // Trả về mảng với giá trị mặc định khi có lỗi
            return [
                'total_reviews' => 0,
                'average_rating' => 0,
                'five_star' => 0,
                'four_star' => 0,
                'three_star' => 0,
                'two_star' => 0,
                'one_star' => 0,
                'five_star_percent' => 0,
                'four_star_percent' => 0,
                'three_star_percent' => 0,
                'two_star_percent' => 0,
                'one_star_percent' => 0
            ];
        }
    }

    public function getProductAverageRating($productId)
    {
        try {
            $sql = "SELECT ROUND(AVG(rating), 1) as average_rating 
                FROM comments 
                WHERE product_id = :product_id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':product_id' => $productId]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['average_rating'] ?? 0;

        } catch (PDOException $e) {
            error_log("Error getting average rating: " . $e->getMessage());
            return 0;
        }
    }

    public function getUserAccount($userId)
    {
        try {
            $sql = "SELECT username, name, email, phone_number, birthday, gender
                FROM user 
                WHERE User_id = :User_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':User_id' => $userId]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Nếu không tìm thấy user, trả về mảng mặc định
            return $user ?: [
                'username' => 'Chưa cập nhật',
                'name' => 'Chưa cập nhật',
                'email' => 'Chưa cập nhật',
                'phone_number' => 'Chưa cập nhật',
                'birthday' => 'Chưa cập nhật',
                'gender' => 'Chưa cập nhật',
            ];
        } catch (PDOException $e) {
            error_log("Error getting user account: " . $e->getMessage());
            return [
                'username' => 'Chưa cập nhật',
                'name' => 'Chưa cập nhật',
                'email' => 'Chưa cập nhật',
                'phone_number' => 'Chưa cập nhật',
                'birthday' => 'Chưa cập nhật',
                'gender' => 'Chưa cập nhật'
            ];
        }
    }

    public function updateAccount($userId, $field, $value)
    {
        error_log("Starting updateAccount - userId: $userId, field: $field, value: $value");

        // Danh sách các trường được phép cập nhật
        $allowedFields = ['name', 'email', 'phone_number', 'address', 'birthday',];

        if (!in_array($field, $allowedFields)) {
            error_log("Invalid field attempted to update: $field");
            return [
                'success' => false,
                'message' => 'Trường không hợp lệ'
            ];
        }

        try {
            // Tạo câu SQL an toàn với prepared statement
            $sql = "UPDATE user SET $field = :value WHERE User_id = :userId";
            $stmt = $this->pdo->prepare($sql);

            // Bind các giá trị
            $stmt->bindValue(':value', $value);
            $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

            error_log("Executing SQL: $sql with value: $value and userId: $userId");

            // Thực thi câu lệnh
            $result = $stmt->execute();

            if ($result) {
                // Kiểm tra xem có row nào được update không
                if ($stmt->rowCount() > 0) {
                    error_log("Update successful - rows affected: " . $stmt->rowCount());
                    return [
                        'success' => true,
                        'message' => 'Cập nhật thành công'
                    ];
                } else {
                    error_log("No rows were updated");
                    return [
                        'success' => false,
                        'message' => 'Không có thay đổi nào được thực hiện'
                    ];
                }
            } else {
                error_log("Update failed - " . print_r($stmt->errorInfo(), true));
                return [
                    'success' => false,
                    'message' => 'Cập nhật thất bại'
                ];
            }

        } catch (PDOException $e) {
            error_log("Database error in updateAccount: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Lỗi cập nhật dữ liệu: ' . $e->getMessage()
            ];
        }
    }

    public function getDonHangFromUser($userId)
    {
        try {

            $sql = "SELECT 
                    op.order_id,
                    p.Name_product AS product_name,
                    p.image,
                    op.Total_Price,
                    s.status_name,
                    op.create_date
            FROM 
                order_detail AS od
            JOIN 
                order_pro AS op
            ON 
                od.order_id = op.order_id
            JOIN 
                products AS p
            ON 
                od.product_id = p.id
            JOIN 
                order_status AS s
            ON 
                op.status_id = s.id
            WHERE 
                op.user_id = :user_id;
        ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':user_id' => $userId]);

            $data = $stmt->fetchAll();
            // if (!$data) {
            //     echo "No data returned. SQL: $sql";
            // }
            return $data;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getDonHangById($orderId)
    {
        $sql = "SELECT * FROM order_pro WHERE order_id = :order_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['order_id' => $orderId]);
        return $stmt->fetch();
    }
    public function getChiTietDonHangByDonHangId($orderId)
    {
        $sql = "SELECT 
                order_detail.*, 
                products.Name_product, 
                products.Image
            FROM 
                order_detail
            JOIN 
                products ON order_detail.product_id = products.id
            WHERE 
                order_detail.order_id = :order_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['order_id' => $orderId]);
        return $stmt->fetch();
    }



    public function getStores()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM stores");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
?>