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
<!-- js -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Bình Luận</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="sort-options">
        <label for="category-select">Sắp xếp theo danh mục:</label>
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

                        <!-- checkbox -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <!-- <th>Name</th> -->
                                        <th>Title</th>

                                        <th>Image</th>
                                        <!-- <th class="col-memory">Memory</th> -->

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($productsComment) && is_array($productsComment)): ?>
                                    <?php foreach ($productsComment as $row): ?>

                                    <tr>
                                        <td data-label="ID"><?= $row['id'] ?></td>
                                        <td data-label="Title"><?= $row['Title'] ?></td>
                                        <td data-label="Image"><img
                                                src="./assets/images/uploads/<?= htmlspecialchars($row['Image']) ?>"
                                                alt="Product Image" height="50"></td>
                                        <td data-label="Actions">
                                            <a href="index.php?act=listComments&product_id=<?php echo $row['id']; ?>"
                                                class="btn btn-danger">Xem bình luận</a>

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>

                                    <?php else: ?>
                                    <tr>

                                    </tr>
                                    <?php endif; ?>
                                </tbody>

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
$(function() {
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
    (function() {
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
        socket.onmessage = function(msg) {
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