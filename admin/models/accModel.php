<?php

class accModel
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Phương thức kiểm tra thông tin đăng nhập
    public function getUserByUsername($Username_admin, $password)
    {

        try {
            $sql = "SELECT Username_admin, Password_id FROM useradmin WHERE Username_admin = :Username_admin";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':Username_admin', $Username_admin, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
}

?>