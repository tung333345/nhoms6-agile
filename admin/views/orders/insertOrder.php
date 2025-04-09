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
                    <h1>Thêm order</h1>
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

                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php if (!empty($this->errorMessage)): ?>
                        <div class="error-message" style="color: red;">
                            <?php echo $this->errorMessage; ?>
                        </div>
                        <?php endif; ?>

                        <form method="POST" action="?act=insertOrder">
                            <input type="text" name="user_id" placeholder="User ID" required>
                            <input type="text" name="Deliverer" placeholder="Deliverer ID">
                            <input type="datetime-local" name="Create_date" required>
                            <input type="number" name="Total_Price" placeholder="Total Price" required>
                            <input type="text" name="Delivery_address" placeholder="Delivery Address" required>
                            <input type="text" name="Note" placeholder="Note">
                            <input type="number" name="status_id" placeholder="Status ID" required>
                            <button type="submit" name="btn_insert">Add Order</button>
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