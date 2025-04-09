<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./assets/css/login.css">
    <style>
        .error-message {
            color: red; /* Màu đỏ cho thông báo lỗi */
            font-size: 0.9em; /* Kích thước chữ nhỏ hơn */
            display: block; /* Hiển thị thông báo lỗi */
            text-align: left; /* Căn trái */
            margin-top: 5px; /* Khoảng cách giữa input và thông báo lỗi */
        }
    </style>
    <script>
        function validateForm() {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            let valid = true;

            // Ẩn thông báo lỗi trước khi kiểm tra
            document.getElementById('username-error').style.display = 'none';
            document.getElementById('password-error').style.display = 'none';
            document.getElementById('login-error').style.display = 'none'; // Ẩn thông báo lỗi đăng nhập

            // Kiểm tra tên đăng nhập
            if (username === '') {
                document.getElementById('username-error').innerText = 'Tên đăng nhập không được để trống.';
                document.getElementById('username-error').style.display = 'block';
                valid = false;
            }

            // Kiểm tra mật khẩu
            if (password === '') {
                document.getElementById('password-error').innerText = 'Mật khẩu không được để trống.';
                document.getElementById('password-error').style.display = 'block';
                valid = false;
            }

            return valid; // Trả về true nếu tất cả các kiểm tra đều hợp lệ
        }
        
    </script>
</head>

<body>
    <div class="login-container">
        <h2>Đăng nhập với</h2>
        <div class="social-login">
            <button class="google-login">G Google</button>
            <button class="zalo-login">Zalo</button>
        </div>
        <p>hoặc</p>
        <form action="?act=login-client" method="post" onsubmit="return validateForm();">
            <label for="username"> TÊN ĐĂNG NHẬP:</label>
            <input type="text" id="username" name="username">
            <span id="username-error" class="error-message"></span> <!-- Thông báo lỗi cho tên đăng nhập -->
            <br>
            <label for="password">MẬT KHẨU:</label>
            <input type="password" id="password" name="password">
            <span id="password-error" class="error-message"></span> <!-- Thông báo lỗi cho mật khẩu -->
            <br>
            <span id="login-error" class="error-message">
                <?php if (!empty($errorMessage)): ?>
                    <?php echo $errorMessage; ?>
                <?php endif; ?>
            </span> <!-- Thông báo lỗi cho đăng nhập -->
            <button type="submit" name="btn-login-client">Đăng nhập</button>
            <?php if (!empty($errorMessage)): ?>
                <div style="color: red; margin-top: 10px;"><?php echo $errorMessage; ?></div>
            <?php endif; ?>
        </form>
        <p id="message"></p>

        <p><a href="http://localhost/DuAn1Nhom4/DuAn1Nhom4/admin">Đăng nhập với tư cách quản trị viên</a></p>
        <p>Bạn chưa có tài khoản? <a href="index.php?act=register-client">Đăng ký ngay</a></p>
        <p><a href="#">Xem chính sách ưu đãi Smember</a></p>
    </div>
    
</body>

</html>