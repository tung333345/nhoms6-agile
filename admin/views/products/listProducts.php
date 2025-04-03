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
        window.location.href = '?act=listProduct&categoryId=' + categoryId;
    }
</script>
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
    <div class="sort-options">
        <label for="category-select">Sắp xếp theo Danh Mục:</label>
        <select id="category-select" onchange="sortByCategory(this.value)">
            <option value="">Tất cả Danh Mục</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= $category['Category_name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="?act=insertProduct">
                                <button class="btn btn-success">Thêm Sản Phẩm</button>
                            </a>
                        </div>
                        <?php
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }

                        if (isset($_SESSION['success_message'])) {
                            echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
                            unset($_SESSION['success_message']);
                        }
                        ?>
                        <!-- checkbox -->
                        <div class="toggle-columns">
                            <label><input type="checkbox" onclick="toggleColumn('col-description')" checked>
                                Description</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-size')" checked> Size</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-weight')" checked> Weight</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-color')" checked> Color</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-memory')" checked> Memory</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-os')" checked> OS</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-cpu-speed')" checked> CPU
                                Speed</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-camera-primary')" checked> Primary
                                Camera</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-camera-secondary')" checked>
                                Secondary
                                Camera</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-battery')" checked> Battery</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-warranty')" checked>
                                Warranty</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-bluetooth')" checked>
                                Bluetooth</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-promotion-price')" checked>
                                Promotion
                                Price</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-start-promotion')" checked> Start
                                Promotion</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-end-promotion')" checked> End
                                Promotion</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-wlan')" checked> WLAN</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-detail')" checked> Details</label>
                            <label><input type="checkbox" onclick="toggleColumn('col-screen')" checked> Screen</label>
                        </div>
                        <!-- checkbox -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th class="col-description">Description</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th class="col-size">Size</th>
                                        <th class="col-weight">Weight</th>
                                        <th class="col-color">Color</th>
                                        <th>Image</th>
                                        <th class="col-memory">Memory</th>
                                        <th class="col-os">OS</th>
                                        <th class="col-cpu-speed">CPU Speed</th>
                                        <th class="col-camera-primary">Primary Camera</th>
                                        <th class="col-camera-secondary">Secondary Camera</th>
                                        <th class="col-battery">Battery</th>
                                        <th class="col-warranty">Warranty</th>
                                        <th class="col-bluetooth">Bluetooth</th>
                                        <th class="col-promotion-price">Promotion Price</th>
                                        <th class="col-start-promotion">Start Promotion</th>
                                        <th class="col-end-promotion">End Promotion</th>
                                        <th class="col-wlan">WLAN</th>
                                        <th>Category ID</th>
                                        <th class="col-detail">Details</th>
                                        <th class="col-screen">Screen</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($products) && is_array($products)): ?>
                                        <?php foreach ($products as $row): ?>

                                            <tr>
                                                <td data-label="ID"><?= $row['id'] ?></td>
                                                <td data-label="Name"><?= $row['Name_product'] ?></td>
                                                <td data-label="Title"><?= $row['Title'] ?></td>
                                                <td class="col-description" data-label="Description">
                                                    <div class="limited-height">
                                                        <span class="truncate"><?= $row['Description'] ?></span>
                                                        <span class="expandable"><?= $row['Description'] ?></span>
                                                        <span class="show-more" onclick="toggleDescription(this)">Xem
                                                            thêm</span>
                                                    </div>
                                                </td>
                                                <td data-label="Price"><?= $row['Price'] ?></td>
                                                <td data-label="Quantity"><?= $row['Quanlity'] ?></td>
                                                <td class="col-size" data-label="Size"><?= $row['Size'] ?></td>
                                                <td class="col-weight" data-label="Weight"><?= $row['Weight'] ?></td>
                                                <td class="col-color" data-label="Color"><?= $row['Color'] ?></td>
                                                <td data-label="Image"><img
                                                        src="./assets/images/uploads/<?= htmlspecialchars($row['Image']) ?>"
                                                        alt="Product Image" height="50"></td>
                                                <td class="col-memory" data-label="Memory"><?= $row['Memory'] ?></td>
                                                <td class="col-os" data-label="OS"><?= $row['Os'] ?></td>
                                                <td class="col-cpu-speed" data-label="CPU Speed"><?= $row['Cpu_speed'] ?></td>
                                                <td class="col-camera-primary" data-label="Primary Camera">
                                                    <?= $row['Camera_primary'] ?>
                                                </td>
                                                <td class="col-camera-secondary" data-label="Secondary Camera">
                                                    <?= $row['Camera_secondary'] ?>
                                                </td>
                                                <td class="col-battery" data-label="Battery"><?= $row['Battery'] ?></td>
                                                <td class="col-warranty" data-label="Warranty"><?= $row['Warranty'] ?></td>
                                                <td class="col-bluetooth" data-label="Bluetooth"><?= $row['Bluetooth'] ?></td>
                                                <td class="col-promotion-price" data-label="Promotion Price">
                                                    <?= $row['Promotion_price'] ?>
                                                </td>
                                                <td class="col-start-promotion" data-label="Start Promotion">
                                                    <?= $row['Start_promotion'] ?>
                                                </td>
                                                <td class="col-end-promotion" data-label="End Promotion">
                                                    <?= $row['End_promotion'] ?>
                                                </td>
                                                <td class="col-wlan" data-label="WLAN"><?= $row['Wlan'] ?></td>
                                                <td data-label="Category ID"><?= $row['Id_cat'] ?></td>
                                                <td class="col-detail" data-label="Details"><?= $row['Detail'] ?></td>
                                                <td class="col-screen" data-label="Screen"><?= $row['Screen'] ?></td>
                                                <td data-label="Actions">
                                                    <a href="?act=editProduct&id=<?= $row['id'] ?>"
                                                        class="btn btn-warning">Edit</a>
                                                    <a href="?act=deleteProduct&id=<?= $row['id'] ?>" class="btn btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm <?= $row['Name_product'] ?>');">Delete</a>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>

                                    <?php else: ?>
                                        <tr>
                                            <td colspan="26">No products found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Category_name</th>
                                        <th>Parent_id</th>
                                        <th>Chức Năng</th>

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
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- Code injected by live-server -->
<script>
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
        (function () {
            function refreshCSS() {
                var sheets = [].slice.call(document.getElementsByTagName("link"));
                var head = document.getElementsByTagName("head")[0];
                for (var i = 0; i < sheets.length; ++i) {
                    var elem = sheets[i];
                    var parent = elem.parentElement || head;
                    parent.removeChild(elem);
                    var rel = elem.rel;
                    if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                        var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                        elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date()
                            .valueOf());
                    }
                    parent.appendChild(elem);
                }
            }
            var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
            var address = protocol + window.location.host + window.location.pathname + '/ws';
            var socket = new WebSocket(address);
            socket.onmessage = function (msg) {
                if (msg.data == 'reload') window.location.reload();
                else if (msg.data == 'refreshcss') refreshCSS();
            };
            if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                console.log('Live reload enabled.');
                sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
            }
        })();
    } else {
        console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
    // ]]>
</script>

</body>

</html>