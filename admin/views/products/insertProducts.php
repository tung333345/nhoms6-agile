<!-- header -->
<?php include './views/layout/header.php'; ?>
<!-- header -->
<!-- <nav>

    <?php include './views/layout/navbar.php'; ?>
  </nav> -->

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
        errorMessage.textContent = ''; // Xóa lỗi cũ
        if (input && input.value.trim() === '') {
            let message = field + ' là bắt buộc.';
            errors.push(message);
            errorMessage.textContent = message; // Hiển thị lỗi ngay cạnh trường nhập
        }
    });

    if (errors.length > 0) {
        event.preventDefault(); // Ngăn chặn gửi form nếu có lỗi
    }
});
</script>

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

                            <div class="container">
                                <div class="container">
                                    <h2 style="text-align: center;">Thêm mới sản phẩm</h2>
                                    <form action="?act=insertProduct" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div>
                                                <label for="Name_product" class="form-label">Tên Sản Phẩm</label>
                                                <input type="text" id="Name_product" class="form-control"
                                                    name="Name_product">
                                                <span class="error-message" id="error-Name_product"></span>
                                            </div>
                                            <div>
                                                <label for="Title" class="form-label">Tiêu đề sản phẩm</label>
                                                <input type="text" id="Title" name="Title" class="form-control">
                                                <span class="error-message" id="error-Title"></span>
                                            </div>
                                            <div class="full-width">
                                                <div id="error-container"></div>
                                                <label for=" Description" class="form-label">Mô tả</label>
                                                <input type="text" id="Description" name="Description"
                                                    class="form-control">
                                            </div>
                                            <div>
                                                <label for="Price" class="form-label">Giá</label>
                                                <input type="text" id="Price" name="Price" class="form-control">
                                                <span class="error-message" id="error-Price"></span>
                                            </div>
                                            <div>
                                                <label for="Quanlity" class="form-label">Số lượng</label>
                                                <input type="number" id="Quanlity" name="Quanlity" class="form-control">
                                                <span class="error-message" id="error-Quanlity"></span>
                                            </div>
                                            <div class="full-width">
                                                <br>
                                                <label for="parent" class="form-label">Danh mục </label>
                                                <select name="parent_cate" id="">
                                                    <option value="3">Điện Thoại</option>
                                                    <option value="4">Máy Tính</option>
                                                    <option value="5">Máy Tính Bảng</option>
                                                    <option value="6">Âm Thanh</option>
                                                    <option value="7">Đồng Hồ Thông Minh</option>
                                                    <option value="8">Đồ Gia Dụng</option>
                                                    <option value="9">Phụ kiện</option>
                                                    <option value="10">Tivi</option>
                                                    <option value="11">Hàng Cũ</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div>
                                                <label for="Size" class="form-label">Kích thước</label>
                                                <input type="text" id="Size" name="Size" class="form-control">
                                                <span class="error-message" id="error-Size"></span>
                                            </div>
                                            <div>
                                                <label for="Weight" class="form-label">Trọng lượng</label>
                                                <input type="text" id="Weight" name="Weight" class="form-control">
                                                <span class="error-message" id="error-Weight"></span>
                                            </div>
                                            <div>
                                                <label for="Color" class="form-label">Màu sắc</label>
                                                <input type="text" id="Color" name="Color" class="form-control">
                                                <span class="error-message" id="error-Color"></span>
                                            </div>
                                            <br>
                                            <div>
                                                <label for="Image" class="form-label">Ảnh</label>
                                                <input type="file" id="Image" name="Image">
                                                <span class="error-message" id="error-Image"></span>
                                            </div>
                                            <br>
                                            <div>
                                                <label for="Memory" class="form-label">Bộ nhớ RAM</label>
                                                <input type="text" id="Memory" name="Memory" class="form-control">
                                                <span class="error-message" id="error-Memory"></span>
                                            </div>
                                            <div>
                                                <label for="Os" class="form-label">Hệ điều hành</label>
                                                <input type="text" id="Os" name="Os" class="form-control">
                                                <span class="error-message" id="error-Os"></span>
                                            </div>
                                            <div>
                                                <label for="Cpu_speed" class="form-label">Tốc độ CPU</label>
                                                <input type="text" id="Cpu_speed" name="Cpu_speed" class="form-control">
                                                <span class="error-message" id="error-Cpu_speed"></span>
                                            </div>
                                            <div>
                                                <label for="Camera_primary" class="form-label">Camera trước</label>
                                                <input type="text" id="Camera_primary" name="Camera_primary"
                                                    class="form-control">
                                                <span class="error-message" id="error-Camera_primary"></span>
                                            </div>
                                            <div>
                                                <label for="Camera_secondary" class="form-label">Camera sau</label>
                                                <input type="text" id="Camera_secondary" name="Camera_secondary"
                                                    class="form-control">
                                                <span class="error-message" id="error-Camera_secondary"></span>
                                            </div>
                                            <div>
                                                <label for="Battery" class="form-label">Pin</label>
                                                <input type="text" id="Battery" name="Battery" class="form-control">
                                                <span class="error-message" id="error-Battery"></span>
                                            </div>
                                            <div>
                                                <label for="Warranty" class="form-label">Bảo hành</label>
                                                <input type="text" id="Warranty" name="Warranty" class="form-control">
                                                <span class="error-message" id="error-Warranty"></span>
                                            </div>
                                            <div>
                                                <label for="Bluetooth" class="form-label">Bluetooth</label>
                                                <input type="text" id="Bluetooth" name="Bluetooth" class="form-control">
                                                <span class="error-message" id="error-Bluetooth"></span>
                                            </div>
                                            <div>
                                                <label for="Promotion_price" class="form-label">Giá khuyến mãi</label>
                                                <input type="text" id="Promotion_price" name="Promotion_price"
                                                    class="form-control">
                                                <span class="error-message" id="error-Promotion_price"></span>
                                            </div>
                                            <div>
                                                <label for="Start_promotion" class="form-label">Ngày bắt đầu khuyến
                                                    mãi</label>
                                                <input type="date" id="Start_promotion" name="Start_promotion"
                                                    class="form-control">
                                                <span class="error-message" id="error-Start_promotion"></span>
                                            </div>
                                            <div>
                                                <label for="End_promotion" class="form-label">Ngày kết thúc khuyến
                                                    mãi</label>
                                                <input type="date" id="End_promotion" name="End_promotion"
                                                    class="form-control">
                                                <span class="error-message" id="error-End_promotion"></span>
                                            </div>
                                            <div>
                                                <label for="Wlan" class="form-label">WLAN</label>
                                                <input type="text" id="Wlan" name="Wlan" class="form-control">
                                                <span class="error-message" id="error-Wlan"></span>
                                            </div>
                                            <div class="full-width">
                                                <label for="id" class="form-label">Loại sản phẩm</label>
                                                <select id="id" name="Id_cat">
                                                    <?php foreach ($categories as $cate): ?>
                                                    <option value="<?php echo $cate['id']; ?>">
                                                        <?php echo htmlspecialchars($cate['Category_name']) . ' (' . htmlspecialchars($cate['Parent_id']) . ')'; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="full-width">
                                                <label for="Detail" class="form-label">Chi tiết khác</label>
                                                <input type="text" id="Detail" name="Detail" class="form-control">
                                            </div>
                                            <div>
                                                <label for="Screen" class="form-label">Màn hình</label>
                                                <input type="text" id="Screen" name="Screen" class="form-control">
                                                <span class="error-message" id="error-Screen"></span>
                                            </div>
                                            <div>
                                                <label for="discount" class="form-label">Discount</label>
                                                <input type="number" id="discount" name="discount" class="form-control">
                                                <span class="error-message" id="error-discount"></span>
                                            </div>
                                            <br>
                                            <div class="full-width">
                                                <div id="error-container"></div>
                                                <!-- <input  type="submit" value="Thêm sản phẩm" name="btn_insert" > -->
                                                <button type="submit" value="Thêm sản phẩm" name="btn_insert"
                                                    class="btn btn-primary">Thêm Sản Phẩm</button>
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



</body>

</html>