<?php
// if (!function_exists('connectDB')) {
//     // Define the connectDB() function to establish a database connection
//     function connectDB()
//     {
//         $host = 'localhost';
//         $username = 'root';
//         $password = '';
//         $dbname = 'duanmau1';

//         try {
//             $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             return $pdo;
//         } catch (PDOException $e) {
//             die("Connection failed: " . $e->getMessage());
//         }
//     }
// }
class accController
{
    public $accModel;

    public function __construct()
    {
        $pdo = connectDB();
        $this->accModel = new accModel($pdo);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Username_admin = $_POST['Username_admin'];
            $password = $_POST['Password_id'];

            $user = $this->accModel->getUserByUsername($Username_admin, $password);


            if ($user) {
                if ($password == $user['Password_id']) {
                    $_SESSION['user_admin'] = $user;
                    $_SESSION['success_message'] = "Đăng nhập thành công!";
                    header("Location: ?act=dashboard");
                    exit();
                } else {

                    $_SESSION['error_message'] = "Tên đăng nhập hoặc mật khẩu không đúng.";
                }
            } else {
                $_SESSION['error_message'] = "Tên đăng nhập hoặc mật khẩu không đúng.";
            }
        }

        require 'views/login.php';
    }

    public function logout()
    {
        unset($_SESSION['user_admin']);
        header("Location:../admin");
        exit();
    }
}


?>