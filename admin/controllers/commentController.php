<?php
class CommentController
{
    public $commentModel;
    public $errorMessage;

    public function __construct()
    {
        $this->commentModel = new CommentModel();
        // Khởi tạo UserModel
        // $this->commentModel = new UserModel();

    }

    public function listProductsComment()
    {
        $productsComment = $this->commentModel->getAllProducts();
        include './views/products/list.php'; // Tải view để liệt kê sản phẩm
    }

    public function formAddComment($productId)
    {
        $userModel = new UserModel();

        // Lấy danh sách người dùng từ cơ sở dữ liệu
        $users = $this->commentModel->getAllUsers();
        include './views/comments/add.php';
    }

    public function listComments($productId)
    {
        // Lấy tất cả bình luận cho sản phẩm theo ID
        $comments = $this->commentModel->getCommentsByProductId($productId);

        // Kiểm tra xem có bình luận nào không
        if (empty($comments)) {
            $this->errorMessage = "Không có bình luận nào cho sản phẩm này.";
        }

        include './views/comments/list.php'; // Tải view để liệt kê bình luận
    }

    public function addComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'];
            $userId = $_POST['user_id']; // Lấy User_id từ form
            $commentContent = $_POST['comment_content'] ?? null;
            $rating = $_POST['rating'] ?? null;

            // Xác thực dữ liệu
            if ($userId === null || $commentContent === null || $rating === null) {
                $this->errorMessage = "Người dùng, nội dung bình luận và đánh giá là bắt buộc.";
                return;
            }

            // Thêm bình luận vào cơ sở dữ liệu
            $this->commentModel->addComment($productId, $userId, $commentContent, $rating);
            header("Location: index.php?act=listComments&product_id=" . urlencode($productId));
            exit();
        }

        // Nếu không phải là POST, hiển thị form thêm bình luận
        include './views/comments/add.php'; // Tải view để thêm bình luận
    }

    public function formEditComment($commentId)
    {
        $comment = $this->commentModel->getCommentById($commentId);

        // Kiểm tra xem bình luận có tồn tại không
        if (!$comment) {
            $this->errorMessage = "Bình luận không tồn tại hoặc đã bị xóa.";
        }

        include './views/comments/edit.php'; // Tải view để chỉnh sửa bình luận
    }

    public function editComment($commentId)
    {
        // Tải bình luận để chỉnh sửa
        $comment = $this->commentModel->getCommentById($commentId);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra xem dữ liệu từ form có được gửi hay không
            $commentContent = $_POST['comment_content'] ?? null;
            $rating = $_POST['rating'] ?? null;

            // Xác thực dữ liệu
            if ($commentContent === null || $rating === null) {
                $this->errorMessage = "Nội dung bình luận và đánh giá là bắt buộc.";
                return;
            }

            // Tiến hành cập nhật bình luận trong cơ sở dữ liệu
            $this->commentModel->updateComment($commentId, $commentContent, $rating);
            header("Location: index.php?act=listComments&product_id=" . urlencode($_POST['product_id']));
            exit();
        }

        // Kiểm tra xem bình luận có tồn tại không
        if (!$comment) {
            $this->errorMessage = "Bình luận không tồn tại hoặc đã bị xóa.";
        }

        include './views/comments/edit.php'; // Tải view để chỉnh sửa bình luận
    }

    public function deleteComment($commentId)
    {
        // Lấy product_id từ query string
        $productId = $_GET['product_id'] ?? null;

        // Xóa bình luận
        $this->commentModel->deleteComment($commentId);

        // Chuyển hướng về danh sách bình luận cho sản phẩm
        header("Location: index.php?act=listComments&product_id=" . urlencode($productId));
        exit();
    }
}
?>