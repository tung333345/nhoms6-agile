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
                    <h1>Chỉnh Sửa Gio hang</h1>
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

                        <form method="POST" action="?act=editOrder&id=<?php echo $order['Order_id']; ?>">
                            <input type="text" name="user_id" value="<?php echo $order['user_id']; ?>" required>
                            <input type="text" name="Deliverer" value="<?php echo $order['Deliverer']; ?>">
                            <input type="datetime-local" name="Create_date" value="<?php echo $order['Create_date']; ?>"
                                required>
                            <input type="number" name="Total_Price" value="<?php echo $order['Total_Price']; ?>"
                                required>
                            <input type="text" name="Delivery_address" value="<?php echo $order['Delivery_address']; ?>"
                                required>
                            <input type="text" name="Note" value="<?php echo $order['Note']; ?>">
                            <input type="number" name="status_id" value="<?php echo $order['status_id']; ?>" required>
                            <button type="submit" name="btn_update">Update Order</button>
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