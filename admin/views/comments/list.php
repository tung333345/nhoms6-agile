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
                    <h1>Danh Sách Bình Luận</h1>
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
                            <h3 class="card-title">Danh sách bình luận cho sản phẩm ID:
                                <?php echo htmlspecialchars($productId); ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <?php if (isset($this->errorMessage)): ?>
                            <div class="error-message"><?php echo htmlspecialchars($this->errorMessage); ?></div>
                            <?php endif; ?>
                            <div class="card-body">
                                <a href="index.php?act=formAddComment&product_id=<?php echo htmlspecialchars($productId); ?>"
                                    class="btn btn-success">Thêm Bình Luận</a>

                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Comment ID</th>
                                        <th>Product ID</th>
                                        <th>User ID</th>
                                        <th>Comment Time</th>
                                        <th>Comment Content</th>
                                        <th>Rating</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($comments)): ?>
                                    <?php foreach ($comments as $comment): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($comment['Comment_id']); ?></td>
                                        <td><?php echo htmlspecialchars($comment['product_id']); ?></td>
                                        <td><?php echo htmlspecialchars($comment['User_id']); ?></td>
                                        <td><?php echo htmlspecialchars($comment['Comment_time']); ?></td>
                                        <td><?php echo htmlspecialchars($comment['Comment_content']); ?></td>
                                        <td><?php echo htmlspecialchars($comment['rating']); ?></td>
                                        <td>
                                        <td>
                                            <a href="index.php?act=formEditComment&id=<?php echo htmlspecialchars($comment['Comment_id']); ?>"
                                                class="btn btn-warning">Chỉnh
                                                sửa Bình luận</a>
                                            <a href="index.php?act=deleteComment&id=<?php echo htmlspecialchars($comment['Comment_id']); ?>&product_id=<?php echo htmlspecialchars($comment['product_id']); ?>"
                                                onclick="return confirm('Bạn có chắc chắn muốn comment?');"
                                                class="btn btn-danger">Xóa</a>
                                        </td>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="7">Không có bình luận nào.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>