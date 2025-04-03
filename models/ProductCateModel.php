<?php
class ClientModelCate
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
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

    public function getProductsByCategoryIdDetail($id_cat, $limit, $offset)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id_cat = :id_cat LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':id_cat', $id_cat);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalProductsByCategoryId($id_cat)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM products WHERE id_cat = :id_cat");
        $stmt->bindParam(':id_cat', $id_cat);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
?>