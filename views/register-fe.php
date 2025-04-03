<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        .container-register {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }

        .register-form {
            width: 60rem;
            margin: 3rem auto;
        }

        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .social-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .social-buttons button {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 20px;
        }

        .google {
            background-color: #db4437;
            color: white;
        }

        .zalo {
            background-color: #0084ff;
            color: white;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="date"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 20px;
        }

        .form-group small {
            display: block;
            margin-top: 5px;
            color: #888;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 20px;
        }

        button[type="submit"]:hover {
            background-color: #db4437;
        }

        p {
            text-align: center;
        }

        p a {
            color: #4CAF50;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

        .message-box {
            color: red;
            /* Màu chữ đỏ */
            font-size: 14px;
            /* Kích thước chữ */
            font-weight: bold;
            /* Chữ đậm */
            margin-top: 10px;
            /* Khoảng cách trên */
        }
    </style>
    <script>
        document.getElementById('registerForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                alert('Mật khẩu không khớp!');
                return;
            }

            // Thực hiện các hành động khác như gửi dữ liệu đến máy chủ
            alert('Đăng ký thành công!');
        });
    </script>

</head>

<body>
    <div class="container-register">
        <div class="register-form">
            <h2>Đăng ký với</h2>
            <div class="social-buttons">
                <button class="google">G Google</button>
                <button class="zalo">Zalo</button>
            </div>
            <p>hoặc</p>

            <form id="registerForm" method="post" action="?act=register-client">
                <div class="form-group">
                    <label for="fullname">Nhập họ và tên</label>
                    <input type="text" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="username">Nhập Username muốn đăng ký</label>
                    <input type="text" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="phone">Nhập số điện thoại</label>
                    <input type="text" id="phone" name="phone_number">
                </div>
                <div class="form-group">
                    <label for="email">Nhập email (không bắt buộc)</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="form-group">
                    <label>Giới tính</label>
                    <div class="gender" style="display: flex;">
                        <div style="padding-right: 20px;">
                            <input type="radio" id="Nam" name="gender" value="Nam">
                            <label for="male">Nam</label>
                        </div>
                        <div>
                            <input type="radio" id="Nữ" name="gender" value="Nữ">
                            <label for="female">Nữ</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dob">Ngày sinh</label>
                    <input type="date" id="birthday" name="birthday">
                </div>
                <div class="form-group">
                    <label for="password">Nhập mật khẩu</label>
                    <input type="password" id="password" name="password">
                    <small>(*) Mật khẩu tối thiểu 6 ký tự, có ít nhất 1 chữ và 1 số. (VD: 72345a)</small>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Nhập lại mật khẩu</label>
                    <input type="password" id="confirmPassword" name="confirmPassword">
                </div>
                <div class="form-group">
                    <input type="checkbox" id="newsletter" name="newsletter">
                    <label for="newsletter">Đăng ký nhận bản tin khuyến mãi từ CellphoneS</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="terms" name="terms">
                    <label for="terms">Tôi đồng ý với các điều khoản bảo mật cá nhân</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="student" name="student">
                    <label for="student">Tôi là Học sinh - sinh viên (nhận thêm ưu đãi tới 500k/sản phẩm)</label>
                </div>
                <br>
                <?php if (isset($MESSAGE) && strlen($MESSAGE)): ?>
                    <div class="message-box">
                        <?php echo htmlspecialchars($MESSAGE, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                <?php endif; ?>

                <button type="submit">Đăng ký</button>
            </form>
            <p>Bạn đã có tài khoản? <a href="?act=login-client">Đăng nhập ngay</a></p>
        </div>
    </div>
</body>

</html>