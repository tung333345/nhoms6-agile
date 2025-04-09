<!-- header -->
<?php include './views/layout/header.php'; ?>

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa Người Dùng</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin người dùng</h3>
                        </div>
                        <form method="POST" action="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username">Tên người dùng:</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        value="<?= isset($user['username']) ? htmlspecialchars($user['username']) : '' ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu:</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên:</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="<?= isset($user['name']) ? htmlspecialchars($user['name']) : '' ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Số điện thoại:</label>
                                    <input type="text" name="phone_number" id="phone_number" class="form-control"
                                        value="<?= isset($user['phone_number']) ? htmlspecialchars($user['phone_number']) : '' ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="<?= isset($user['email']) ? htmlspecialchars($user['email']) : '' ?>"
                                        required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="btn_update" class="btn btn-primary">Cập nhật Người
                                    Dùng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>