<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CellphoneS</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="./assets/css/home_fe.css">
    <script src="./assets/js/script.js"></script>

    <link rel="icon" href="../image/logo.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    p {
        margin-top: 0;
        margin-bottom: 1rem;
        font-size: 13px;
        font-size: 13px;
    }

    .dropdown {
        position: relative;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        border-radius: 4px;
        min-width: 150px;
        z-index: 1000;
    }

    .dropdown-menu.show {
        display: block;
    }

    .dropdown-item {
        display: block;
        padding: 8px 16px;
        color: #333;
        text-decoration: none;
    }

    .dropdown-item:hover {
        background-color: #f5f5f5;
    }

    .fa-circle-user {
        cursor: pointer;
    }

    .head {
        font-size: 13px;
    }

    .head {
        font-size: 13px;
    }
</style>

<body>
    <header>
        <div class="box-header-top">
            <div class="header-top-swiper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 py-1 img-fluid">
                            <img src="./assets/image/top-banner-chinh-sach-bao-hanh-doi-tra.webp" alt="">
                        </div>
                        <div class="col-md-4 py-1 img-fluid">
                            <img src="./assets/image/top-banner-chinh-hang-xuat-vat-day-du.webp" alt="">
                        </div>
                        <div class="col-md-4 py-1 img-fluid">
                            <img src="./assets/image/top-banner-giao-nhanh-mien-phi.webp" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div id="cps-container-navbar">

            <div class="container">
                <div class="cps-container-navbar-sticky">


                    <div>
                        <a href="index.php">
                            <div class="box-logo">
                                <img src="assets/image/logo3.png" alt="">
                            </div>
                        </a>
                    </div>


                    <!-- <a href="#" class="header-item-button-menu">
                            <div class="about_box-icon">

                            </div>
                            <div class="about_box-content">
                                <p>Danh Mục</p>
                            </div>

                        </a> -->


                    <div class="box-search">
                        <form action="?act=search" method="POST">
                            <div class="input-group-button">
                                <input class="input" type="text" name="query" placeholder="Bạn cần tìm gì?....."
                                    required>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>

                    <a href="tel:18002044" class="contact-hotline">
                        <div class="about-box-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="about-box-content">

                            <p class="head">Mua hàng</p>
                            <p class="head">18002097</p>
                        </div>
                    </a>

                    <a href="?act=store-map" class="header-box-about-store">
                        <div class="about-box-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="header-box-about-content">
                            <p class="head">Cửa hàng</p>
                            <p class="head">gần bạn</p>
                        </div>
                    </a>

                    <a href="?act=lich-su-mua-hang" class="header-box-search-item-product">

                        <a href="?act=lich-su-mua-hang" class="header-box-search-item-product">
                            <div class="about-box-icon">
                                <i class="fa-solid fa-truck-fast"></i>

                            </div>
                            <div class="header-box-about-content">
                                <p class="head">Lịch sửa</p>
                                <p class="head">Đơn hàng</p>
                            </div>
                        </a>

                        <a href="?act=viewCart" class="header-box-cart">
                            <div class="about-box-icon">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                            <div class="header-box-about-content">
                                Giỏ hàng
                            </div>
                        </a>

                        <div class="box-login">
                            <?php if (isset($_SESSION['user'])) { ?>
                                <div class="box-user dropdown">
                                    <div class="about-contact">
                                        <i class="fa-regular fa-circle-user" onclick="toggleDropdown()"
                                            style="color: white; font-size: 25px; cursor: pointer;"></i>
                                        <p style="color: white;">
                                            <?php echo isset($_SESSION['user']['username']) ? htmlspecialchars($_SESSION['user']['username']) : 'Khách' ?>
                                        </p>
                                    </div>
                                    <div class="dropdown-menu" id="userDropdown">
                                        <a href="?act=account" class="dropdown-item">Tài khoản</a>
                                        <a href="?act=logout-client" class="dropdown-item">Đăng xuất</a>
                                    </div>
                                </div>


                            <?php } else { ?>
                                <a href="?act=login-client">
                                    <div class="about-icon">
                                        <i class="fa-regular fa-circle-user" style="color: white; font-size: 25px;"></i>
                                    </div>
                                    <div class="about-contact">
                                        <p style="color: white;">Đăng nhập</p>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>


                </div>
            </div>



        </div>
    </header>
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        window.onclick = function (event) {
            if (!event.target.matches('.fa-circle-user')) {
                const dropdowns = document.getElementsByClassName('dropdown-menu');
                for (let dropdown of dropdowns) {
                    if (dropdown.classList.contains('show')) {
                        dropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

</body>




</html>