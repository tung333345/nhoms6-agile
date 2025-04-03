<!-- header -->
<?php include './views/layout/header.php'; ?>
<!-- header -->
<!-- <nav>
    <?php include './views/layout/navbar.php'; ?>
  </nav> -->

<!-- js  -->
<script>
document.querySelector('form').addEventListener('submit', function(event) {
    let errors = [];
    let fields = ['Name_product', 'Title', 'Screen', 'Price', 'Quanlity', 'Size', 'Weight', 'Color',
        'Image', 'Memory', 'Os', 'Cpu_speed', 'Camera_primary', 'Camera_secondary', 'Battery',
        'Warranty', 'Bluetooth', 'Promotion_price', 'Start_promotion', 'End_promotion', 'Wlan',
        'discount', 'like_view', 'id', 'Detail', 'Description'
    ];

    fields.forEach(function(field) {
        let input = document.getElementById(field);
        let errorMessage = document.getElementById('error-' + field);
        errorMessage.textContent = '';
        if (input && input.value.trim() === '') {
            let message = field + ' là bắt buộc.';
            errors.push(message);
            errorMessage.textContent = message;
        }
    });

    if (errors.length > 0) {
        event.preventDefault();
    }
});
</script>
<!-- js  -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Sản Phẩm</h1>
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

                            <div class="content">
                                <h2>Cập nhật sản phẩm</h2>
                                <form action="?act=updateProduct&id=<?= $products['id'] ?>" class="update" method="post"
                                    enctype="multipart/form-data">

                                    <div class="form-group">
                                        <div>
                                            <label for="Name_product" class="form-label">Tên Sản
                                                Phẩm</label>
                                            <input type="text" id="Name_product" class="form-control"
                                                name="Name_product"
                                                value="<?= htmlspecialchars($products['Name_product'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Title" class="form-label">Tiêu đề sản phẩm</label>
                                            <input type="text" id="Title" class="form-control" name="Title"
                                                value="<?= htmlspecialchars($products['Title'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Screen" class="form-label">Màn hình</label>
                                            <input type="text" id="Screen" class="form-control" name="Screen"
                                                value="<?= htmlspecialchars($products['Screen'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Price" class="form-label">Giá</label>
                                            <input type="text" id="Price" class="form-control" name="Price"
                                                value="<?= htmlspecialchars($products['Price'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Quanlity" class="form-label">Số lượng</label>
                                            <input type="number" id="Quanlity" class="form-control" name="Quanlity"
                                                value="<?= htmlspecialchars($products['Quanlity'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Size" class="form-label">Kích thước</label>
                                            <input type="text" id="Size" class="form-control" name="Size"
                                                value="<?= htmlspecialchars($products['Size'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Weight" class="form-label">Trọng lượng</label>
                                            <input type="text" id="Weight" class="form-control" name="Weight"
                                                value="<?= htmlspecialchars($products['Weight'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Color" class="form-label">Màu sắc</label>
                                            <input type="text" id="Color" class="form-control" name="Color"
                                                value="<?= htmlspecialchars($products['Color'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Image" class="form-label">Ảnh</label>
                                            <input type="file" id="Image" name="Image">
                                            <p>Ảnh hiện tại</p><img
                                                src="./assets/images/uploads/<?= $products['Image'] ?>"
                                                alt="Product Image" height="100">
                                        </div>
                                        <div>
                                            <label for="Memory" class="form-label">Bộ nhớ RAM</label>
                                            <input type="text" id="Memory" class="form-control" name="Memory"
                                                value="<?= htmlspecialchars($products['Memory'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Os" class="form-label">Hệ điều hành</label>
                                            <input type="text" id="Os" class="form-control" name="Os"
                                                value="<?= htmlspecialchars($products['Os'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Cpu_speed" class="form-label">Tốc độ CPU</label>
                                            <input type="text" id="Cpu_speed" class="form-control" name="Cpu_speed"
                                                value="<?= htmlspecialchars($products['Cpu_speed'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Camera_primary" class="form-label">Camera
                                                trước</label>
                                            <input type="text" class="form-control" id="Camera_primary"
                                                name="Camera_primary"
                                                value="<?= htmlspecialchars($products['Camera_primary'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Camera_secondary" class="form-label">Camera
                                                sau</label>
                                            <input type="text" class="form-control" id="Camera_secondary"
                                                name="Camera_secondary"
                                                value="<?= htmlspecialchars($products['Camera_secondary'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Battery" class="form-label">Pin</label>
                                            <input type="text" class="form-control" id="Battery" name="Battery"
                                                value="<?= htmlspecialchars($products['Battery'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Warranty" class="form-label">Bảo hành</label>
                                            <input type="text" class="form-control" id="Warranty" name="Warranty"
                                                value="<?= htmlspecialchars($products['Warranty'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Bluetooth" class="form-label">Bluetooth</label>
                                            <input type="text" class="form-control" id="Bluetooth" name="Bluetooth"
                                                value="<?= htmlspecialchars($products['Bluetooth'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Promotion_price" class="form-label">Giá khuyến
                                                mãi</label>
                                            <input type="text" class="form-control" id="Promotion_price"
                                                name="Promotion_price"
                                                value="<?= htmlspecialchars($products['Promotion_price'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Start_promotion" class="form-label">Ngày bắt đầu
                                                khuyến mãi</label>
                                            <input type="date" class="form-control" id="Start_promotion"
                                                name="Start_promotion"
                                                value="<?= htmlspecialchars($products['Start_promotion'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="End_promotion" class="form-label">Ngày kết thúc
                                                khuyến mãi</label>
                                            <input type="date" class="form-control" id="End_promotion"
                                                name="End_promotion"
                                                value="<?= htmlspecialchars($products['End_promotion'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="Wlan" class="form-label">WLAN</label>
                                            <input type="text" class="form-control" id="Wlan" name="Wlan"
                                                value="<?= htmlspecialchars($products['Wlan'] ?? '') ?>">
                                        </div>
                                        <div>
                                            <label for="discount" class="form-label">Discount</label>
                                            <input type="number" class="form-control" id="discount" name="discount"
                                                value="<?= htmlspecialchars($products['discount'] ?? '') ?>">
                                            <span class="error-message" id="error-discount"></span>
                                        </div>

                                        <div class="full-width">
                                            <label for="Id_cat" class="form-label">Loại sản phẩm</label>
                                            <select id="Id_cat" name="Id_cat">
                                                <?php foreach ($categories as $cate): ?>
                                                <option value="<?= $cate['id'] ?>"
                                                    <?= $cate['id'] == $products['Id_cat'] ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($cate['Category_name']) ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="full-width">
                                            <label for="Detail" class="form-label">Chi tiết khác</label>
                                            <input type="text" class="form-control" id="Detail" name="Detail"
                                                value="<?= htmlspecialchars($products['Detail'] ?? '') ?>">
                                        </div>
                                        <div class="full-width">
                                            <label for="Description" class="form-label">Mô tả</label>
                                            <input type="text" class="form-control" id="Description" name="Description"
                                                value="<?= htmlspecialchars($products['Description'] ?? '') ?>">
                                        </div>
                                        <div class="full-width">
                                            <input type="submit" value="Cập nhật sản phẩm" name="btn_update">
                                        </div>
                                    </div>




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