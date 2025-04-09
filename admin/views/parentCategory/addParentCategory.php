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
                            <h3 class="card-title">Thêm Danh Mục Parent</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
            if (session_status() === PHP_SESSION_NONE) {
              session_start();
            }

            if (isset($_SESSION['success_message'])) {
              echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
              unset($_SESSION['success_message']);
            }
            ?>
                        <div class="box-views">

                            <div class="container">
                                <h2>Thêm Parent Category</h2>
                                <form method="POST" action="index.php?act=addParentCategory">
                                    <label for="ParentCategory_name">Parent Category Name:</label>
                                    <input type="text" name="ParentCategory_name" id="ParentCategory_name" required>
                                    <button type="submit">Thêm</button>
                                </form>
                            </div>

                        </div>
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