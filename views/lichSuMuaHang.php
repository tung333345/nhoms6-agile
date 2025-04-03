<?php
// Lấy thông tin người dùng
$userId = $_SESSION['user']['User_id'];
$userProfile = $this->clientModel->getUserAccount($userId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lịch sử đơn hàng</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/lichSuMuaHang.css">
  <style>
    
    
    button:focus{
      color: #007bff;
    }
  </style>
</head>
<body>
  <div class="order-history">
    <div class="text-center mb-4">
        <img  src="./assets/image/poly.png" alt="" class="avarta">
    <div>
    <h3><?php echo htmlspecialchars($userProfile['username']); ?></h3>
    <p><?php echo htmlspecialchars($userProfile['phone_number']); ?></p>

    </div>
    </div>

    

    <!-- Bộ lọc -->
    <form method="POST" class="d-flex mb-3 all">
    <?php
    $selectedStatus = $_POST['status'] ?? ''; // Lấy giá trị 'status' đã chọn
    ?>

    <button type="submit" name="status" value="Tất cả" 
        class="btn <?php echo ($selectedStatus === 'Tất cả') ? 'btn-secondary' : 'btn-outline-secondary'; ?>">Tất cả</button>

    <button type="submit" name="status" value="Chờ xác nhận" 
        class="btn <?php echo ($selectedStatus === 'Chờ xác nhận') ? 'btn-secondary' : 'btn-outline-secondary'; ?>">Chờ xác nhận</button>

    <button type="submit" name="status" value="Đã xác nhận" 
        class="btn <?php echo ($selectedStatus === 'Đã xác nhận') ? 'btn-secondary' : 'btn-outline-secondary'; ?>">Đã xác nhận</button>

    <button type="submit" name="status" value="Đang vận chuyển" 
        class="btn <?php echo ($selectedStatus === 'Đang vận chuyển') ? 'btn-secondary' : 'btn-outline-secondary'; ?>">Đang vận chuyển</button>

    <button type="submit" name="status" value="Đã giao hàng" 
        class="btn <?php echo ($selectedStatus === 'Đã giao hàng') ? 'btn-secondary' : 'btn-outline-secondary'; ?>">Đã giao hàng</button>

    <button type="submit" name="status" value="Đã hủy" 
        class="btn <?php echo ($selectedStatus === 'Đã hủy') ? 'btn-secondary' : 'btn-outline-secondary'; ?>">Đã hủy</button>
</form>

<?php
$statusFilter = isset($_POST['status']) ? $_POST['status'] : 'Tất cả';
$filteredDonHangs = array_filter($donHangs, function($donHang) use ($statusFilter) {
    return $statusFilter === 'Tất cả' || $donHang['status_name'] === $statusFilter;
});
?>

<!-- Đơn hàng -->
<?php if ($filteredDonHangs && is_array($filteredDonHangs)): ?>
  <?php foreach ($filteredDonHangs as $donHang): ?>
    <div class="order-card">
        <div class="row">
            <div class="col-md-2 product-info">
                <img src="./admin/assets/images/uploads/<?= htmlspecialchars($donHang['image']) ?>" alt="Hình ảnh sản phẩm">
            </div>
            <div class="col-md-8">
                <h5><?= htmlspecialchars($donHang['product_name']) ?></h5>
                <p class="order-status"><?= htmlspecialchars($donHang['status_name']) ?></p>
                <p class="text-danger price"><?= number_format($donHang['Total_Price'], 0, ',', '.') ?>đ</p>
            </div>
            <div class="col-md-2 text-end doc">
                <p class='date'><?= htmlspecialchars($donHang['create_date']) ?></p>

                <?php 
                  if ($donHang['status_name'] == "Chờ xác nhận") { 
                  ?>
                  <form method="POST" action="index.php?act=cancel_order" onsubmit="return confirmCancel()">
                    <input type="hidden" name="order_id" value="<?= htmlspecialchars($donHang['order_id']) ?>">
                    <button type="submit" style="border: 1px solid red;border-radius:5px ;">Hủy đơn hàng</button>
                </form>

                <script>
                    function confirmCancel() {
                        return confirm("Bạn có chắc chắn muốn hủy đơn hàng này?");
                    }
                </script>
                <?php 
                } 
                ?>
                
                

            </div>
        </div>
    </div>
  <?php endforeach ?>
<?php else: ?>
    <p class="text-center">Không có đơn hàng nào!</p>
<?php endif; ?>

   

  </div>

</body>
</html>
