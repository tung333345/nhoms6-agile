<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" onclick="toggleSidebar()"><i
                    class="fas fa-bars"></i></a>
        </li> -->
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= 'http://localhost/Duan1Nhom4/Duan1Nhom4/' ?>" class="nav-link">WEBSITE</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" onclick="toggleFullscreen()">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>
</nav>
<!-- /.navbar -->
<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    if (sidebar.style.display === 'none' || sidebar.style.display === '') {
        sidebar.style.display = 'block';
    } else {
        sidebar.style.display = 'none';
    }
}

function toggleFullscreen() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        }
    }
}
</script>