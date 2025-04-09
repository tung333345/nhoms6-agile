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
                    <h1>Sửa Bình Luận</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Chỉnh sửa bình luận</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php if (isset($this->errorMessage)): ?>
                        <div class="error-message"><?php echo htmlspecialchars($this->errorMessage); ?></div>
                        <?php endif; ?>

                        <?php if (isset($comment) && $comment): ?>
                        <form method="POST"
                            action="index.php?act=editComment&id=<?php echo htmlspecialchars($comment['Comment_id']); ?>">
                            <div class="form-group">
                                <label for="comment_content">Nội dung bình luận:</label>
                                <textarea name="comment_content" id="comment_content" class="form-control"
                                    required><?php echo htmlspecialchars($comment['Comment_content']); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="rating">Đánh giá:</label>
                                <input type="number" name="rating" id="rating" class="form-control"
                                    value="<?php echo htmlspecialchars($comment['rating']); ?>" min="1" max="5"
                                    required>
                            </div>

                            <input type="hidden" name="product_id"
                                value="<?php echo htmlspecialchars($comment['product_id']); ?>">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                        <?php else: ?>
                        <p>Bình luận không tồn tại hoặc đã bị xóa.</p>
                        <?php endif; ?>
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