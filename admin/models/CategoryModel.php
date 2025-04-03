<?php

class CategoryModel
{
    public $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Phương thức lấy danh sách danh mục
    public function getCategories()
    {
        $query = "SELECT * FROM category";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Phương thức lấy danh mục theo ID
    public function getCategoryByID($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM category WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Phương thức thêm danh mục
    public function insertCategory($Category_name, $Parent_id)
    {
        $query = "INSERT INTO category (Category_name, Parent_id) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(1, $Category_name);
        $stmt->bindParam(2, $Parent_id);
        return $stmt->execute();
    }

    // Phương thức cập nhật danh mục
    public function editCategory($id, $Category_name, $Parent_id)
    {
        $query = "UPDATE category SET Category_name = ?, Parent_id = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(1, $Category_name);
        $stmt->bindParam(2, $Parent_id);
        $stmt->bindParam(3, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Phương thức xóa danh mục
    public function deleteCategory($id)
    {
        $query = "DELETE FROM category WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Phương thức lấy danh sách danh mục cha
    public function getParentCategories()
    {
        $query = "SELECT * FROM parentcate";
        $result = $this->pdo->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Phương thức lấy danh mục cha theo ID
    public function getParentCategoryByID($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM parentcate WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Phương thức thêm danh mục cha
    public function insertParentCategory($parent_name)
    {
        $query = "INSERT INTO parentcate (parent_name) VALUES (?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(1, $parent_name);
        return $stmt->execute();
    }

    // Phương thức cập nhật danh mục cha
    public function editParentCategory($id, $parent_name)
    {
        $query = "UPDATE parentcate SET parent_name = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(1, $parent_name);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Phương thức xóa danh mục cha
    public function deleteParentCategory($id)
    {
        $query = "DELETE FROM parentcate WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>