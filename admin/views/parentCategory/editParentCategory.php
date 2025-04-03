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
                    <h1>Quản Lý Parent</h1>
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
                            <h3 class="card-title">Thêm Sản Phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="box-views">
                            <div class="container">
                                <div class="container">
                                    <h2>Edit Parent Category</h2>
                                    <form method="POST"
                                        action="index.php?act=editParentCategory&id=<?= $parentCategory['id'] ?>"
                                        onsubmit="return confirmSave()">
                                        <label for="ParentCategory_name">Parent Category Name:</label>
                                        <input type="text" name="ParentCategory_name" id="ParentCategory_name"
                                            value="<?= htmlspecialchars($parentCategory['parent_name']) ?>" required>
                                        <button type="submit">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
    </section>

    <script>
    function confirmSave() {
        return confirm('Bạn có chắc chắn muốn lưu chỉnh sửa này?');
    }
    </script>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include './views/layout/footer.php'; ?>


</body>

</html>