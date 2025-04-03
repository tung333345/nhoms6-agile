<?php

class UserModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=duanmau1', 'root', '');
    }

    // Phương thức lấy danh sách người dùng
    public function getUsers()
    {
        try {
            $sql = "SELECT * FROM user";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return [];
        }
    }

    // Phương thức lấy người dùng theo ID
    public function getUserByID($id)
    {
        try {
            $sql = "SELECT * FROM user WHERE User_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return [];
        }
    }

    // Phương thức thêm người dùng
    public function insertUser($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO user (username, password, name, phone_number, email) VALUES (:username, :password, :name, :phone_number, :email)");
        return $stmt->execute([
            'username' => $data['username'],
            'password' => $data['password'],
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email']
        ]);
    }

    // Phương thức cập nhật người dùng
    public function updateUser($userId, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE user SET username = :username, password = :password, name = :name, phone_number = :phone_number, email = :email WHERE User_id = :user_id");
        return $stmt->execute([
            'username' => $data['username'],
            'password' => $data['password'],
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'user_id' => $userId
        ]);
    }

    // Phương thức xóa người dùng
    public function deleteUser($id)
    {
        try {
            $sql = "DELETE FROM user WHERE User_id = :id";
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