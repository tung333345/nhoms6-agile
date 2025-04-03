<!-- header -->
<?php include './views/layout/header.php'; ?>
<!-- header -->
<!-- <nav>
    <?php include './views/layout/navbar.php'; ?>
  </nav> -->



<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- js  -->
<script>
function toggleDescription(element) {
    const container = element.parentElement;
    const description = container.querySelector('.expandable');

    if (description.style.display === "none") {
        description.style.display = "block"; // Hiển thị nội dung đầy đủ
        container.style.maxHeight = "none"; // Bỏ giới hạn chiều cao
        element.textContent = "Ẩn bớt"; // Thay đổi văn bản thành "Hide"
    } else {
        description.style.display = "none"; // Ẩn nội dung đầy đủ
        container.style.maxHeight = "250px"; // Đặt lại chiều cao giới hạn
        element.textContent = "Xem thêm"; // Thay đổi văn bản thành "Show more"
    }
}

function toggleColumn(columnClass) {
    var elements = document.getElementsByClassName(columnClass);
    for (var i = 0; i < elements.length; i++) {
        elements[i].style.display = elements[i].style.display === 'none' ? '' : 'none';
    }
}

function sortByCategory(categoryId) {
    window.location.href = '?act=listProduct&categoryId=' + categoryId; // Redirect to filter by category
}
</script>
<!-- js -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Trị Slide</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= '?act=showInsertForm' ?>">
                                <button class="btn btn-success">Thêm Slide</button>
                            </a>
                        </div>
                        <!-- checkbox -->
                        <!-- checkbox -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Role</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($slides as $slide): ?>
                                    <tr>
                                        <td><?= $slide['id'] ?></td>
                                        <td><?= htmlspecialchars($slide['title']) ?></td>
                                        <td><img src="./assets/images/uploads/<?= htmlspecialchars($slide['image']) ?>"
                                                alt="<?= htmlspecialchars($slide['title']) ?>" width="100"></td>
                                        <td><?= htmlspecialchars($slide['role_slide_id']) ?></td>
                                        <td><?= htmlspecialchars($slide['description']) ?></td>
                                        <td>
                                            <a href="?act=showEditForm&id=<?= $slide['id'] ?>"
                                                class="btn btn-warning">Chỉnh Sửa</a>
                                            <a href="?act=deleteSlide&id=<?= $slide['id'] ?>" class="btn btn-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa Slide này không?');">Xóa</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>

                                    <tr>
                                        <td colspan="26">No products found.</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Role</th>
                                        <th>Description</th>
                                        <th>Actions</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
<!-- <footer> -->


<!-- end Footer -->

<!-- Page specific script -->

</body>

</html>