<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="font-size: 34px; ">
        <!-- <img src="#" alt="AdminLogo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light ">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="?act=dashboard" class="d-block">Xin Chào<span class="user-admin"
                        style="font-weight: bold; color: #f39c12; font-size:20px; padding-left: 10px;"><?= isset($_SESSION['user_admin']['Username_admin']) ? htmlspecialchars($_SESSION['user_admin']['Username_admin']) : 'Khách' ?></span></a>


            </div>


        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="?act=dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="<?= '?act=listCategories' ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Quản Lý Danh Mục
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= '?act=listProduct' ?>" class="nav-link">
                        <i class="nav-icon fas fa-mobile"></i>
                        <p>
                            Quản Lý Sản Phẩm
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= '?act=listParentCategories' ?>" class="nav-link">
                        <i class="nav-icon fas fa-window-restore"></i>
                        <p>
                            Quản trị Parent
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= '?act=listSlides' ?>" class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            Quản trị Slide
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= '?act=listProductsComment' ?>" class="nav-link">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>
                            Quản trị Comments
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= '?act=viewUsersWithOrders' ?>" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Quản trị Đơn hàng
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= '?act=listUsers' ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Quản trị người dùng
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= '?act=listUserAdmins' ?>" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Quản trị admin
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?act=logout" class="nav-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p>
                            Đăng xuất
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>