<?php

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function listUsers()
    {
        $users = $this->userModel->getUsers();
        require_once './views/user/listUsers.php';
    }

    public function insertUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_insert'])) {
            // Lấy dữ liệu từ form
            $data = [
                'username' => $_POST['username'] ?? null,
                'password' => $_POST['password'] ?? null,
                'name' => $_POST['name'] ?? null,
                'phone_number' => $_POST['phone_number'] ?? null,
                'email' => $_POST['email'] ?? null,
            ];

            // Xác thực dữ liệu
            $errors = [];
            if (empty($data['username'])) {
                $errors[] = "Tên người dùng không được để trống.";
            }
            if (empty($data['password'])) {
                $errors[] = "Mật khẩu không được để trống.";
            }
            if (empty($data['name'])) {
                $errors[] = "Tên không được để trống.";
            }
            if (empty($data['phone_number'])) {
                $errors[] = "Số điện thoại không được để trống.";
            }
            if (empty($data['email'])) {
                $errors[] = "Email không được để trống.";
            }

            // Nếu có lỗi, hiển thị thông báo lỗi
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo '<div class="alert alert-danger">' . htmlspecialchars($error) . '</div>';
                }
                require_once './views/user/insertUser.php'; // Tải lại form để người dùng sửa
                return;
            }

            // Thêm người dùng vào cơ sở dữ liệu
            if ($this->userModel->insertUser($data)) {
                echo '<script>
                alert("Thêm user thành công!");
                window.location.href="?act=listUsers";
            </script>';
            } else {
                echo '<div class="alert alert-danger">Có lỗi xảy ra khi thêm người dùng.</div>';
            }
        }

        // Nếu không phải là POST, hiển thị form thêm người dùng
        require_once './views/user/insertUser.php';
    }

    public function editUser($userId)
    {
        // Lấy thông tin người dùng từ cơ sở dữ liệu
        $user = $this->userModel->getUserById($userId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_update'])) {
            // Lấy dữ liệu từ form
            $data = [
                'username' => $_POST['username'] ?? null,
                'password' => $_POST['password'] ?? null,
                'name' => $_POST['name'] ?? null,
                'phone_number' => $_POST['phone_number'] ?? null,
                'email' => $_POST['email'] ?? null,
            ];

            // Xác thực dữ liệu
            $errors = [];
            if (empty($data['username'])) {
                $errors[] = "Tên người dùng không được để trống.";
            }
            if (empty($data['name'])) {
                $errors[] = "Tên không được để trống.";
            }
            if (empty($data['phone_number'])) {
                $errors[] = "Số điện thoại không được để trống.";
            }
            if (empty($data['email'])) {
                $errors[] = "Email không được để trống.";
            }

            // Nếu có lỗi, hiển thị thông báo lỗi
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo '<div class="alert alert-danger">' . htmlspecialchars($error) . '</div>';
                }
                require_once './views/user/editUser.php'; // Tải lại form để người dùng sửa
                return;
            }

            // Cập nhật người dùng vào cơ sở dữ liệu
            if ($this->userModel->updateUser($userId, $data)) {
                echo '<script>
                alert("Cập nhật user thành công!");
                window.location.href="?act=listUsers";
            </script>';
            } else {
                echo '<div class="alert alert-danger">Có lỗi xảy ra khi cập nhật người dùng.</div>';
            }
        }

        // Nếu không phải là POST, hiển thị form sửa người dùng
        require_once './views/user/editUser.php';
    }

    public function deleteUser($id)
    {
        if ($this->userModel->deleteUser($id)) {
            echo '<script>alert("Xóa người dùng thành công!");</script>';
        } else {
            echo '<script>alert("Lỗi khi xóa người dùng!");</script>';
        }
        header("location:?act=listUsers");
        exit();
    }
}
?>