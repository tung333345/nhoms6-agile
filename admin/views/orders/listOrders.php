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
                    <h1>Danh sách đơn hàng</h1>
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

                        <a href="?act=formInsertOrder">Add New Order</a>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php if (!empty($this->errorMessage)): ?>
                            <div class="error-message" style="color: red;">
                                <?php echo $this->errorMessage; ?>
                            </div>
                        <?php endif; ?>

                        <table>
                            <tr>
                                <th>Order ID</th>
                                <th>User ID</th>
                                <th>Total Price</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td><?php echo $order['Order_id']; ?></td>
                                    <td><?php echo $order['user_id']; ?></td>
                                    <td><?php echo $order['Total_Price']; ?></td>
                                    <td>
                                        <a href="?act=editOrder&id=<?php echo $order['Order_id']; ?>">Edit</a>
                                        <a href="?act=deleteOrder&id=<?php echo $order['Order_id']; ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
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