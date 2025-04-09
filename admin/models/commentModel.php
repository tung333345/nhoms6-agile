<?php
class CommentModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=duanmau1', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getAllUsers()
    {
        $stmt = $this->pdo->query("SELECT User_id, username FROM user");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllProducts()
    {
        $stmt = $this->pdo->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($productId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $productId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCommentById($commentId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE Comment_id = :commentId");
        $stmt->bindParam(':commentId', $commentId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCommentsByProductId($productId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE Product_id = :productId");
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả bình luận dưới dạng mảng
    }

    public function addComment($productId, $userId, $commentContent, $rating)
    {
        $stmt = $this->pdo->prepare("INSERT INTO comments (product_id, User_id, Comment_time, Comment_content, rating) VALUES (:product_id, :user_id, NOW(), :comment_content, :rating)");
        return $stmt->execute([
            'product_id' => $productId,
            'user_id' => $userId,
            'comment_content' => $commentContent,
            'rating' => $rating
        ]);
    }

    public function updateComment($commentId, $commentContent, $rating)
    {
        $stmt = $this->pdo->prepare("UPDATE comments SET Comment_content = :comment_content, rating = :rating WHERE Comment_id = :comment_id");
        return $stmt->execute([
            'comment_content' => $commentContent,
            'rating' => $rating,
            'comment_id' => $commentId
        ]);
    }

    public function deleteComment($commentId)
    {
        $stmt = $this->pdo->prepare("DELETE FROM comments WHERE Comment_id = :comment_id");
        return $stmt->execute(['comment_id' => $commentId]);
    }
}
?>