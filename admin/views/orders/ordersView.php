<!-- header -->
<?php include './views/layout/header.php'; ?>
<!-- header -->
<!-- <nav>
    <?php include './views/layout/navbar.php'; ?>
  </nav> -->
<style>
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

th,
td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;

}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}
</style>


<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý các đơn hàng của user</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <table border="1">
                        <thead>
                            <tr>
                                <th>Order ID (id hóa đơn)</th>
                                <th>User ID (id khách hàng)</th>

                                <th>Create Date (Ngày lập đơn hàng)</th>
                                <th>Total Price (Tổng giá trị đơn hàng)</th>
                                <th>Delivery Address (địa điểm nhận đơn hàng)</th>
                                <th>Note (ghi chú)</th>
                                <th>Status( trạng thái đơn hàng)</th>
                                <th>Chinh sửa trạng thái</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo $order['Order_id']; ?></td>
                                <td><?php echo $order['user_id']; ?></td>

                                <td><?php echo $order['Create_date']; ?></td>
                                <td><?php echo $order['Total_Price']; ?></td>
                                <td><?php echo $order['Delivery_address']; ?></td>
                                <td><?php echo $order['Note']; ?></td>
                                <td>
                                    <?php
                                        // Hiển thị tên trạng thái thay vì ID
                                        echo isset($statusList[$order['status_id']]) ? $statusList[$order['status_id']] : 'Unknown';
                                        ?>

                                </td>
                                <td>

                                    <form action="?act=updateOrderStatus&order_id=<?php echo $order['Order_id']; ?>"
                                        method="POST">
                                        <select name="status_id" id="status">
                                            <?php foreach ($statusList as $id => $status): ?>
                                            <option value="<?php echo $id; ?>"
                                                <?php echo $id == $order['status_id'] ? 'selected' : ''; ?>>
                                                <?php echo $status; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <button type="submit">Cập nhật trạng thái</button>
                                    </form>

                                </td>
                                <td>


                                    <!-- Form để xem chi tiết đơn hàng -->
                                    <form action="?act=viewOrder&id=<?= $order['Order_id']; ?>" method="post"
                                        style="display:inline;">
                                        <button type="submit">Xem chi tiết</button>
                                    </form>
                                    <form action="?act=deleteOrder&id=<?= $order['Order_id']; ?>" method="post"
                                        style="display:inline;">
                                        <button type="submit">Xóa đơn hàng</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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