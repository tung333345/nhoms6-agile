<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="forgot-password-container">
        <h2>Quên mật khẩu</h2>
        <?php if (isset($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if (isset($message)): ?>
        <p class="message"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <form action="index.php?action=forgotPassword" method="post">
            <label for="username">SỐ ĐIỆN THOẠI:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="new_password">MẬT KHẨU MỚI:</label>
            <input type="password" id="new_password" name="new_password" required>
            <br>
            <button type="submit">Đặt lại mật khẩu</button>
        </form>
        <p><a href="index.php?act=login-client">Quay lại đăng nhập</a></p>
    </div>
</body>

</html>