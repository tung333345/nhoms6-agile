<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" type="text/javascript" href="./assets/js/script.js">
    <script>
        // Lấy thời gian kết thúc từ PHP

        var endTime = new Date("<?php echo $getEndTime; ?>").getTime();
        // Cập nhật bộ đếm ngược mỗi giây
        var x = setInterval(function () {
            var now = new Date().getTime();
            var distance = endTime - now;

            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML = hours + " giờ : " + minutes + " phút : " + seconds +
                " giây ";

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "EXPIRED";
            }
        }, 1000);

        document.addEventListener('DOMContentLoaded', function () {
            const parentLinks = document.querySelectorAll('.mega-menu > ul > li > a');
            parentLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const parentLi = this.parentElement;
                    parentLi.classList.toggle('active');
                });
            });
        });

        var slideIndex = 1;
        var autoSlideInterval;

        function plusSlides(n) {
            clearInterval(autoSlideInterval);
            showSlides(slideIndex += n);
            autoSlide();
        }

        function currentSlide(n) {
            clearInterval(autoSlideInterval);
            showSlides(slideIndex = n);
            autoSlide();
        }

        function showSlides(n) {
            var i;
            const slides = document.getElementsByClassName("slides")[0].getElementsByClassName("slide");
            const dots = document.getElementsByClassName("dot");
            const slidePosition = document.querySelector(".slide-position");

            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "flex";
            dots[slideIndex - 1].className += " active";

            // Kiểm tra xem slidePosition có tồn tại không
            if (slidePosition) {
                slidePosition.textContent = slideIndex + " / " + slides.length;
            } else {
                console.error("Element with class 'slide-position' not found.");
            }
        }
        function autoSlide() {
            autoSlideInterval = setInterval(function () {
                plusSlides(1);
            },
                2000);
        }
        var slideContents = document.getElementsByClassName("slide-content");
        for (var i = 0; i <
            slideContents.length; i++) {
            slideContents[i].addEventListener("click", function () {
                var
                    index = Array.prototype.indexOf.call(this.parentNode.children, this);
                currentSlide(index + 1);
            });
        }
        window.onload = function () {
            showSlides(slideIndex);
            autoSlide();
        };
    </script>
    <style>
        .slide {
            display: flex; /* Đảm bảo nội dung bên trong được căn giữa */
            justify-content: center; /* Căn giữa nội dung theo chiều ngang */
            align-items: center; /* Căn giữa nội dung theo chiều dọc */
        }

        .slide img {
            height: 330px;
             /* Đảm bảo hình ảnh không vượt quá chiều cao của slide */
        }
        .product__price--percent {
            background-color: red;
            /* Màu nền để nổi bật */
            color: white;
            /* Màu chữ */
            font-size: 18px;
            /* Kích thước chữ */
            padding: 5px 10px;
            border-radius: 5px;
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 10;
        }
    </style>

</head>

<body>


    <body>
        <div class="box-controll">
            <div class="body-menu-tree">
                <nav class="mega-menu">
                    <ul class="box-menu">
                        <?php foreach ($parentCategories as $parentCategory): ?>
                            <li>
                                <a href="?act=productByParent&id=<?php echo htmlspecialchars($parentCategory['id']) ?>">
                                    <?= htmlspecialchars($parentCategory['parent_name']) ?>
                                </a>
                                <ul>
                                    <?php foreach ($categories[$parentCategory['id']] as $category): ?>
                                        <li><a
                                                href=" ?act=productByCategory&id=<?php echo htmlspecialchars($category['id']) ?>">
                                                <?= htmlspecialchars($category['Category_name']) ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
            <div class="slide-swiper-pre">
            <div class="slideshow-swiper-container">
                <div class="slides">
                    <?php foreach (array_slice($slides1, 0, 5) as $slide): ?>
                        <div class="slide">
                            <div class="slide-image">
                                <a href="page-product.html">
                                    <img class="slide-img" src="./admin/assets/images/uploads/<?= htmlspecialchars($slide['image']) ?>" alt="<?= htmlspecialchars($slide['title']) ?>">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>
                <div class="dots">
                    <?php for ($i = 1; $i <= count($slides1); $i++): ?>
                        <span class="dot" onclick="currentSlide(<?= $i ?>)"></span>
                    <?php endfor; ?>
                </div>
            </div>
                <div class="title-boxes">
                    <?php foreach (array_slice($slides1, 0, 5) as $index => $slide): ?>
                        <div class="title-box" onclick="currentSlide(<?= $index + 1 ?>)">
                            <?= htmlspecialchars($slide['title']) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="slide-right">
                <div class="slide-container">
                    <?php foreach ($slides2 as $slide): ?>
                        <div class="slide2">
                            <div class="slide-image"><img
                                    src="./admin/assets/images/uploads/<?= htmlspecialchars($slide['image']) ?>"
                                    alt="<?= htmlspecialchars($slide['title']) ?>"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="banner-sale">
            <?php foreach ($slides3 as $slide3): ?>
                <div class="slide3">
                    <div class="slide-image3"><img
                            src="./admin/assets/images/uploads/<?= htmlspecialchars($slide3['image']) ?>"
                            alt="<?= htmlspecialchars($slide3['title']) ?>"></div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="box_products_sale">
            <div class="box_products_sale_controller">
                <div class="sale-banner"><span class="flame-icon">🔥</span><span class="sale-text">HOT SALE</span></div>
                <div class="box_countdown"><span>Kết Thúc Sau: </span>
                    <div class="countdown" id="countdown"></div>
                </div>
            </div>
            <div class="box_sale_products_byParentCategory">
                <?php if (isset($productsMaxDiscount) && is_array($productsMaxDiscount)): ?>
                    <?php foreach ($productsMaxDiscount as $product): ?>
                        <!-- Hiển thị thông tin sản phẩm -->
                        <div class="product">
                            <div class="product__info">
                                <a href="?act=showProductDetail&id=<?= $product['id'] ?>" class="product__link">
                                    <!-- <div class="product__price--percent">
                        <p class=""><?= htmlspecialchars($product['discount'] ?? '0') ?>%</p>
                    </div> -->
                                    <div class="product__image">
                                        <img style="width: 160px; height: 160px;"
                                            src="./admin/assets/images/uploads/<?= htmlspecialchars($product['Image']) ?>"
                                            alt="" loading="lazy">
                                    </div>
                                    <div class="product__name">
                                        <h3><?= htmlspecialchars($product['Name_product']) ?></h3>
                                    </div>
                                    <div class="block-box-price">
                                        <p class="product__price--show"><?= htmlspecialchars($product['Promotion_price']) ?></p>
                                        <p class="product__price--through"><?= htmlspecialchars($product['Price']) ?></p>
                                    </div>
                                    <div class="product_Detail">
                                        <div class="Detail">
                                            <p class="Detail-price"><?= htmlspecialchars($product['Detail']) ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="rating-items">
                                <div class="bottom-div">
                                    <div class="star-icon">
                                        <?php for ($i = 0; $i < 5; $i++): ?>
                                            <div><img style="height: 20px; width: 20px;" src="./admin/assets/images/rating/star.png"
                                                    alt=""></div>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="heart-content">
                                        <p>Yêu Thích</p>
                                        <a class="heat-icon" href="#">
                                            <img class="heat-icon-first" style="height: 20px; width: 20px;"
                                                src="./admin/assets/images/rating/heart.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có sản phẩm nào với mức giảm giá lớn nhất.</p>
                <?php endif; ?>

            </div>
        </div>
        <section>
            <div class="category_products">
                <div class="category__products_controller">
                    <div class="parent_left">
                        <?php foreach ($parentCategories as $parentCategory): ?>
                            <?php if ($parentCategory['id'] == 3): ?>
                                <div class="specific-parent-category">
                                    <div class="parent-category" id="parentCategory-3">
                                        <h1>
                                            <?php echo htmlspecialchars($parentCategory['parent_name']); ?>
                                        </h1>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="categories_right">
                        <?php if (isset($categories[3]) && is_array($categories[3])): ?>
                            <?php foreach ($categories[3] as $category): ?><a
                                    href="?act=productByCategory&id=<?php echo htmlspecialchars($category['id']) ?>">
                                    <?= htmlspecialchars($category['Category_name']) ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?><a href="?act=productByParent&id=3">Xem tất
                            cả</a>
                    </div>
                </div>
                <div class="products_byParentCategory">
                    <?php foreach ($products1 as $product): ?>
                        <div class="product">
                            <div class="product__info"><a href="?act=showProductDetail&id=<?= $product['id'] ?> "
                                    class="product__link">
                                    <div class="product__price--percent">
                                        <p class="product__price--percent-detail">Giảm&nbsp;
                                            <?= htmlspecialchars($product['discount'] ?? '0') ?>%
                                        </p>
                                    </div>
                                    <div class="product__image"><img style="width: 160px; height: 160px;"
                                            src="./admin/assets/images/uploads/<?= htmlspecialchars($product['Image']) ?>"
                                            alt="" loading="lazy"></div>
                                    <div class="product__name">
                                        <h3>
                                            <?= htmlspecialchars($product['Name_product']) ?>
                                        </h3>
                                    </div>
                                    <div class="block-box-price">
                                        <p class="product__price--show">
                                            <?= htmlspecialchars($product['Promotion_price']) ?>đ
                                        </p>
                                        <p class="product__price--through">
                                            <?= htmlspecialchars($product['Price']) ?>
                                        </p>
                                    </div>
                                    <div class="product_Detail">
                                        <div class="Detail">
                                            <p class="Detail-price">
                                                <?= htmlspecialchars($product['Detail']) ?>
                                            </p>
                                        </div>
                                    </div>
                                </a></div>
                            <div class="rating-items">
                                <div class="bottom-div">
                                    <div class="star-icon">
                                        <?php for ($i = 0; $i < 5; $i++): ?>
                                            <div><img style="height: 20px; width: 20px;"
                                                    src="./admin/assets/images/rating/star.png" alt=""></div>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="heart-content">
                                        <p>Yêu Thích</p><a class="heat-icon" href="#"><img class="heat-icon-first"
                                                style="height: 20px; width: 20px;"
                                                src="./admin/assets/images/rating/heart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section>
            <div class="category_products">
                <div class="category__products_controller">
                    <div class="parent_left">
                        <?php foreach ($parentCategories as $parentCategory): ?>
                            <?php if ($parentCategory['id'] == 4): ?>
                                <div class="specific-parent-category">
                                    <div class="parent-category" id="parentCategory-4">
                                        <h1>
                                            <?php echo htmlspecialchars($parentCategory['parent_name']); ?>
                                        </h1>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="categories_right">
                        <?php if (isset($categories[4]) && is_array($categories[4])): ?>
                            <?php foreach ($categories[4] as $category): ?><a
                                    href="?act=productByCategory&id=<?php echo htmlspecialchars($category['id']) ?>">
                                    <?= htmlspecialchars($category['Category_name']) ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?><a href="?act=productByParent&id=4">Xem tất
                            cả</a>
                    </div>
                </div>
                <div class="products_byParentCategory">
                    <?php foreach ($products2 as $product): ?>
                        <div class="product">
                            <div class="product__info"><a href="?act=showProductDetail&id=<?= $product['id'] ?> "
                                    class="product__link">
                                    <div class="product__price--percent">
                                        <p class="product__price--percent-detail">Giảm&nbsp;
                                            <?= htmlspecialchars($product['discount'] ?? '0') ?>%
                                        </p>
                                    </div>
                                    <div class="product__image"><img style="width: 160px; height: 160px;"
                                            src="./admin/assets/images/uploads/<?= htmlspecialchars($product['Image']) ?>"
                                            alt="" loading="lazy"></div>
                                    <div class="product__name">
                                        <h3>
                                            <?= htmlspecialchars($product['Name_product']) ?>
                                        </h3>
                                    </div>
                                    <div class="block-box-price">
                                        <p class="product__price--show">
                                            <?= htmlspecialchars($product['Promotion_price']) ?>đ
                                        </p>
                                        <p class="product__price--through">
                                            <?= htmlspecialchars($product['Price']) ?>
                                        </p>
                                    </div>
                                    <div class="product_Detail">
                                        <div class="Detail">
                                            <p class="Detail-price">
                                                <?= htmlspecialchars($product['Detail']) ?>
                                            </p>
                                        </div>
                                    </div>
                                </a></div>
                            <div class="rating-items">
                                <div class="bottom-div">
                                    <div class="star-icon">
                                        <?php for ($i = 0; $i < 5; $i++): ?>
                                            <div><img style="height: 20px; width: 20px;"
                                                    src="./admin/assets/images/rating/star.png" alt=""></div>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="heart-content">
                                        <p>Yêu Thích</p><a class="heat-icon" href="#"><img class="heat-icon-first"
                                                style="height: 20px; width: 20px;"
                                                src="./admin/assets/images/rating/heart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section>
            <div class="category_products">
                <div class="category__products_controller">
                    <div class="parent_left">
                        <?php foreach ($parentCategories as $parentCategory): ?>
                            <?php if ($parentCategory['id'] == 5): ?>
                                <div class="specific-parent-category">
                                    <div class="parent-category" id="parentCategory-4">
                                        <h1>
                                            <?php echo htmlspecialchars($parentCategory['parent_name']); ?>
                                        </h1>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="categories_right">
                        <?php if (isset($categories[5]) && is_array($categories[5])): ?>
                            <?php foreach ($categories[5] as $category): ?><a
                                    href="?act=productByCategory&id=<?php echo htmlspecialchars(5) ?>">
                                    <?= htmlspecialchars($category['Category_name']) ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?><a href="?act=productByParent&id=5">Xem tất
                            cả</a>
                    </div>
                </div>
                <div class="products_byParentCategory">
                    <?php foreach ($products3 as $product): ?>
                        <div class="product">
                            <div class="product__info"><a href="?act=showProductDetail&id=<?= $product['id'] ?> "
                                    class="product__link">
                                    <div class="product__price--percent">
                                        <p class="product__price--percent-detail">Giảm&nbsp;
                                            <?= htmlspecialchars($product['discount'] ?? '0') ?>%
                                        </p>
                                    </div>
                                    <div class="product__image"><img style="width: 160px; height: 160px;"
                                            src="./admin/assets/images/uploads/<?= htmlspecialchars($product['Image']) ?>"
                                            alt="" loading="lazy"></div>
                                    <div class="product__name">
                                        <h3>
                                            <?= htmlspecialchars($product['Name_product']) ?>
                                        </h3>
                                    </div>
                                    <div class="block-box-price">
                                        <p class="product__price--show">
                                            <?= htmlspecialchars($product['Promotion_price']) ?>đ
                                        </p>
                                        <p class="product__price--through">
                                            <?= htmlspecialchars($product['Price']) ?>
                                        </p>
                                    </div>
                                    <div class="product_Detail">
                                        <div class="Detail">
                                            <p class="Detail-price">
                                                <?= htmlspecialchars($product['Detail']) ?>
                                            </p>
                                        </div>
                                    </div>
                                </a></div>
                            <div class="rating-items">
                                <div class="bottom-div">
                                    <div class="star-icon">
                                        <?php for ($i = 0; $i < 5; $i++): ?>
                                            <div><img style="height: 20px; width: 20px;"
                                                    src="./admin/assets/images/rating/star.png" alt=""></div>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="heart-content">
                                        <p>Yêu Thích</p><a class="heat-icon" href="#"><img class="heat-icon-first"
                                                style="height: 20px; width: 20px;"
                                                src="./admin/assets/images/rating/heart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section>
            <div class="category_products">
                <div class="category__products_controller">
                    <div class="parent_left">
                        <?php foreach ($parentCategories as $parentCategory): ?>
                            <?php if ($parentCategory['id'] == 6): ?>
                                <div class="specific-parent-category">
                                    <div class="parent-category" id="parentCategory-4">
                                        <h1>
                                            <?php echo htmlspecialchars($parentCategory['parent_name']); ?>
                                        </h1>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>x
                    <div class="categories_right">
                        <?php if (isset($categories[6]) && is_array($categories[6])): ?>
                            <?php foreach ($categories[6] as $category): ?><a
                                    href="?act=productByCategory&id=<?php echo htmlspecialchars($category['id']) ?>">
                                    <?= htmlspecialchars($category['Category_name']) ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?><a href="?act=productByParent&id=6">Xem tất
                            cả</a>
                    </div>
                </div>
                <div class="products_byParentCategory">
                    <?php foreach ($products4 as $product): ?>
                        <div class="product">
                            <div class="product__info"><a href="?act=showProductDetail&id=<?= $product['id'] ?> "
                                    class="product__link">
                                    <div class="product__price--percent">
                                        <p class="product__price--percent-detail">Giảm&nbsp;
                                            <?= htmlspecialchars($product['discount'] ?? '0') ?>%
                                        </p>
                                    </div>
                                    <div class="product__image"><img style="width: 160px; height: 160px;"
                                            src="./admin/assets/images/uploads/<?= htmlspecialchars($product['Image']) ?>"
                                            alt="" loading="lazy"></div>
                                    <div class="product__name">
                                        <h3>
                                            <?= htmlspecialchars($product['Name_product']) ?>
                                        </h3>
                                    </div>
                                    <div class="block-box-price">
                                        <p class="product__price--show">
                                            <?= htmlspecialchars($product['Promotion_price']) ?>đ
                                        </p>
                                        <p class="product__price--through">
                                            <?= htmlspecialchars($product['Price']) ?>
                                        </p>
                                    </div>
                                    <div class="product_Detail">
                                        <div class="Detail">
                                            <p class="Detail-price">
                                                <?= htmlspecialchars($product['Detail']) ?>
                                            </p>
                                        </div>
                                    </div>
                                </a></div>
                            <div class="rating-items">
                                <div class="bottom-div">
                                    <div class="star-icon">
                                        <?php for ($i = 0; $i < 5; $i++): ?>
                                            <div><img style="height: 20px; width: 20px;"
                                                    src="./admin/assets/images/rating/star.png" alt=""></div>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="heart-content">
                                        <p>Yêu Thích</p><a class="heat-icon" href="#"><img class="heat-icon-first"
                                                style="height: 20px; width: 20px;"
                                                src="./admin/assets/images/rating/heart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section>
            <div class="category_products">
                <div class="category__products_controller">
                    <div class="parent_left">
                        <?php foreach ($parentCategories as $parentCategory): ?>
                            <?php if ($parentCategory['id'] == 7): ?>
                                <div class="specific-parent-category">
                                    <div class="parent-category" id="parentCategory-4">
                                        <h1>
                                            <?php echo htmlspecialchars($parentCategory['parent_name']); ?>
                                        </h1>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="categories_right">
                        <?php if (isset($categories[7]) && is_array($categories[7])): ?>
                            <?php foreach ($categories[7] as $category): ?><a
                                    href="?act=productByCategory&id=<?php echo htmlspecialchars($category['id']) ?>">
                                    <?= htmlspecialchars($category['Category_name']) ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?><a href="?act=productByParent&id=7">Xem tất
                            cả</a>
                    </div>
                </div>
            </div>
            <div class="products_byParentCategory">
                <?php foreach ($products5 as $product): ?>
                    <div class="product">
                        <div class="product__info"><a href="?act=showProductDetail&id=<?= $product['id'] ?> "
                                class="product__link">
                                <div class="product__price--percent">
                                    <p class="product__price--percent-detail">Giảm&nbsp;
                                        <?= htmlspecialchars($product['discount'] ?? '0') ?>%
                                    </p>
                                </div>
                                <div class="product__image"><img style="width: 160px; height: 160px;"
                                        src="./admin/assets/images/uploads/<?= htmlspecialchars($product['Image']) ?>"
                                        alt="" loading="lazy"></div>
                                <div class="product__name">
                                    <h3>
                                        <?= htmlspecialchars($product['Name_product']) ?>
                                    </h3>
                                </div>
                                <div class="block-box-price">
                                    <p class="product__price--show">
                                        <?= htmlspecialchars($product['Promotion_price']) ?>đ
                                    </p>
                                    <p class="product__price--through">
                                        <?= htmlspecialchars($product['Price']) ?>
                                    </p>
                                </div>
                                <div class="product_Detail">
                                    <div class="Detail">
                                        <p class="Detail-price">
                                            <?= htmlspecialchars($product['Detail']) ?>
                                        </p>
                                    </div>
                                </div>
                            </a></div>
                        <div class="rating-items">
                            <div class="bottom-div">
                                <div class="star-icon">
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <div><img style="height: 20px; width: 20px;" src="./admin/assets/images/rating/star.png"
                                                alt=""></div>
                                    <?php endfor; ?>
                                </div>
                                <div class="heart-content">
                                    <p>Yêu Thích</p><a class="heat-icon" href="#"><img class="heat-icon-first"
                                            style="height: 20px; width: 20px;" src="./admin/assets/images/rating/heart.png"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section>
            <div class="category_products">
                <div class="category__products_controller">
                    <div class="parent_left">
                        <?php foreach ($parentCategories as $parentCategory): ?>
                            <?php if ($parentCategory['id'] == 8): ?>
                                <div class="specific-parent-category">
                                    <div class="parent-category" id="parentCategory-4">
                                        <h1>
                                            <?php echo htmlspecialchars($parentCategory['parent_name']); ?>
                                        </h1>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="categories_right">
                        <?php if (isset($categories[8]) && is_array($categories[8])): ?>
                            <?php foreach ($categories[8] as $category): ?><a
                                    href="?act=productByCategory&id=<?php echo htmlspecialchars($category['id']) ?>">
                                    <?= htmlspecialchars($category['Category_name']) ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?><a href="?act=productByParent&id=7">Xem tất
                            cả</a>
                    </div>
                </div>
            </div>
            <div class="products_byParentCategory">
                <?php foreach ($products6 as $product): ?>
                    <div class="product">
                        <div class="product__info"><a href="?act=showProductDetail&id=<?= $product['id'] ?> "
                                class="product__link">
                                <div class="product__price--percent">
                                    <p class="product__price--percent-detail">Giảm&nbsp;
                                        <?= htmlspecialchars($product['discount'] ?? '0') ?>%
                                    </p>
                                </div>
                                <div class="product__image"><img style="width: 160px; height: 160px;"
                                        src="./admin/assets/images/uploads/<?= htmlspecialchars($product['Image']) ?>"
                                        alt="" loading="lazy"></div>
                                <div class="product__name">
                                    <h3>
                                        <?= htmlspecialchars($product['Name_product']) ?>
                                    </h3>
                                </div>
                                <div class="block-box-price">
                                    <p class="product__price--show">
                                        <?= htmlspecialchars($product['Promotion_price']) ?>đ
                                    </p>
                                    <p class="product__price--through">
                                        <?= htmlspecialchars($product['Price']) ?>
                                    </p>
                                </div>
                                <div class="product_Detail">
                                    <div class="Detail">
                                        <p class="Detail-price">
                                            <?= htmlspecialchars($product['Detail']) ?>
                                        </p>
                                    </div>
                                </div>
                            </a></div>
                        <div class="rating-items">
                            <div class="bottom-div">
                                <div class="star-icon">
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <div><img style="height: 20px; width: 20px;" src="./admin/assets/images/rating/star.png"
                                                alt=""></div>
                                    <?php endfor; ?>
                                </div>
                                <div class="heart-content">
                                    <p>Yêu Thích</p><a class="heat-icon" href="#"><img class="heat-icon-first"
                                            style="height: 20px; width: 20px;" src="./admin/assets/images/rating/heart.png"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section>
            <div class="category_products">
                <div class="category__products_controller">
                    <div class="parent_left">

                        <div class="specific-parent-category">
                            <div class="parent-category" id="parentCategory-4">
                                <h1>
                                    TOP SẢN PHẨM YÊU THÍCH
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="categories_right">

                    </div>
                </div>
            </div>
            <div class="products_byParentCategory">
                <?php foreach ($topProducts as $product): ?>
                    <div class="product">
                        <div class="product__info"><a href="?act=showProductDetail&id=<?= $product['id'] ?> "
                                class="product__link">
                                <div class="product__price--percent">
                                    <p class="product__price--percent-detail">Giảm&nbsp;
                                        <?= htmlspecialchars($product['discount'] ?? '0') ?>%
                                    </p>
                                </div>
                                <div class="product__image"><img style="width: 160px; height: 160px;"
                                        src="./admin/assets/images/uploads/<?= htmlspecialchars($product['Image']) ?>"
                                        alt="" loading="lazy"></div>
                                <div class="product__name">
                                    <h3>
                                        <?= htmlspecialchars($product['Name_product']) ?>
                                    </h3>
                                </div>
                                <div class="block-box-price">
                                    <p class="product__price--show">
                                        <?= htmlspecialchars($product['Promotion_price']) ?>
                                    </p>
                                    <p class="product__price--through">
                                        <?= htmlspecialchars($product['Price']) ?>
                                    </p>
                                </div>
                                <div class="product_Detail">
                                    <div class="Detail">
                                        <p class="Detail-price">
                                            <?= htmlspecialchars($product['Detail']) ?>
                                        </p>
                                    </div>
                                </div>
                            </a></div>
                        <div class="rating-items">
                            <div class="bottom-div">
                                <div class="star-icon">
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <div><img style="height: 20px; width: 20px;" src="./admin/assets/images/rating/star.png"
                                                alt=""></div>
                                    <?php endfor; ?>
                                </div>
                                <div class="heart-content">
                                    <p>Yêu Thích</p><a class="heat-icon" href="#"><img class="heat-icon-first"
                                            style="height: 20px; width: 20px;"
                                            src="./admin/assets/images/rating/heart-hover.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </section>
        <section class="box_slides_bottom">
            <h1>ƯU ĐÃI SINH VIÊN</h1>
            <div class="slides_bottom">
                <?php foreach ($slides7 as $slide): ?>
                    <div class="slide_image"><a href="#?id=<?= htmlspecialchars($slide['id']) ?>"><img
                                src="./admin/assets/images/uploads/<?= htmlspecialchars($slide['image']) ?>"
                                alt="<?= htmlspecialchars($slide['title']) ?>"></a></div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="box_slides_bottom">
            <h1>ƯU ĐÃI THANH TOÁN</h1>
            <div class="slides_bottom">
                <?php foreach ($slides8 as $slide): ?>
                    <div class="slide_image"><a href="#?id=<?= htmlspecialchars($slide['id']) ?>"><img
                                src="./admin/assets/images/uploads/<?= htmlspecialchars($slide['image']) ?>"
                                alt="<?= htmlspecialchars($slide['title']) ?>"></a></div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="box_slides_bottom">
            <h1>CHUYÊN TRANG THƯƠNG HIỆU</h1>
            <div class="slides_bottom">
                <?php foreach ($slides9 as $slide): ?>
                    <div class="slide_image"><a href="#?id=<?= htmlspecialchars($slide['id']) ?>"><img
                                src="./admin/assets/images/uploads/<?= htmlspecialchars($slide['image']) ?>"
                                alt="<?= htmlspecialchars($slide['title']) ?>"></a></div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="box_slides_bottom">
            <h1>TIN TỨC CÔNG NGHỆ</h1>
            <div class="slides_bottom">
                <?php foreach ($slides10 as $slide): ?>
                    <div class="slide_image"><a href="#?id=<?= htmlspecialchars($slide['id']) ?>"><img
                                src="./admin/assets/images/uploads/<?= htmlspecialchars($slide['image']) ?>"
                                alt="<?= htmlspecialchars($slide['title']) ?>">
                            <div class="news_title">
                                <p>
                                    <?= htmlspecialchars($slide['title']) ?>
                                </p>
                            </div>
                        </a></div>
                <?php endforeach; ?>
            </div>
        </section>
    </body>

</body>

</html>