<!-- header -->
<?php include './views/layout/header.php'; ?>
<!-- header -->
<!-- <nav>
    <?php include './views/layout/navbar.php'; ?>
  </nav> -->



<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Danh Mục</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary" style="padding: 10px;">
                        <div class="card-header">
                            <h3 class="card-title">Thêm bình luận cho sản phẩm ID:
                                <?php echo htmlspecialchars($productId); ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php if (!empty($this->errorMessage)): ?>
                        <div class="error-message" style="color: red;">
                            <?php echo $this->errorMessage; ?>
                        </div>
                        <?php endif; ?>

                        <form action="index.php?act=addComment" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                            <div class="form-group">
                                <label for="user_id">Người dùng:</label>
                                <select name="user_id" id="user_id" class="form-control" required>
                                    <option value="">Chọn người dùng</option>
                                    <?php foreach ($users as $user): ?>
                                    <option value="<?php echo htmlspecialchars($user['User_id']); ?>">
                                        <?php echo htmlspecialchars($user['username']); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label for="comment_content">Nội dung bình luận:</label>
                            <textarea name="comment_content" required></textarea>

                            <label for="rating">Đánh giá:</label>
                            <input type="number" name="rating" min="1" max="5" required>

                            <button type="submit">Gửi bình luận</button>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include './views/layout/footer.php'; ?>


</body>

</html>