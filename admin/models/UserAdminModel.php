<?php

class UserAdminModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=duanmau1', 'root', '');
    }

    // Phương thức lấy danh sách admin
    public function getUserAdmins()
    {
        try {
            $sql = "SELECT * FROM useradmin";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return [];
        }
    }

    // Phương thức lấy admin theo ID
    public function getUserAdminByID($id)
    {
        try {
            $sql = "SELECT * FROM useradmin WHERE User_admin_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return [];
        }
    }

    // Phương thức thêm admin
    public function insertUserAdmin($data)
    {
        try {
            $sql = "INSERT INTO useradmin (Username_admin, Password_id) VALUES (:Username_admin, :Password_id)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($data); // Không mã hóa mật khẩu
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }

    // Phương thức cập nhật admin
    public function updateUserAdmin($id, $data)
    {
        try {
            $sql = "UPDATE useradmin SET Username_admin = :Username_admin, Password_id = :Password_id WHERE User_admin_id = :id"; // Fixed table name
            $stmt = $this->pdo->prepare($sql);
            $data['id'] = $id; // Ensure the ID is included in the data array
            return $stmt->execute($data); // Không mã hóa mật khẩu
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }

    // Phương thức xóa admin
    public function deleteUserAdmin($id)
    {
        try {
            $sql = "DELETE FROM useradmin WHERE User_admin_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
}
?>