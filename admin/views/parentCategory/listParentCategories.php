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
                    <h1>Quan Lý Parent</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="index.php?act=addParentCategory">
                                <button class="btn btn-success">Thêm Parent</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                  if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                  }

                  if (isset($_SESSION['success_message'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
                    unset($_SESSION['success_message']);
                  }
                  foreach ($parentCategories as $parentCategory): ?>
                                    <tr>
                                        <td><?= $parentCategory['id'] ?></td>
                                        <td><?= isset($parentCategory['parent_name']) ? $parentCategory['parent_name'] : 'N/A' ?>
                                        </td>
                                        <td>
                                            <a href="index.php?act=editParentCategory&id=<?= $parentCategory['id'] ?>"
                                                class="btn btn-warning">Chỉnh sửa</a>
                                            <a href="index.php?act=deleteParentCategory&id=<?= $parentCategory['id'] ?>"
                                                class="btn btn-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?');">Xóa</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Actions</th>

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