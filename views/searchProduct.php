<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Kết quả Tìm kiếm Sản phẩm</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
    /* Cập nhật chung cho toàn bộ trang */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    /* Sửa menu mega-menu */
    .mega-menu {
        /* background-color: #333; */
        padding: 10px 0;
    }

    .mega-menu a {
        color: #fff;
        text-decoration: none;
        padding: 10px 20px;
        display: block;
        font-size: 16px;
    }

    .mega-menu ul ul {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #444;
        border-radius: 5px;
    }

    .mega-menu>ul>li:hover>ul {
        display: block;
    }

    .mega-menu ul ul li {
        width: 200px;
    }

    .mega-menu ul ul a {
        padding: 10px;
        font-size: 14px;
    }

    /* Tạo một kiểu dáng đẹp cho các sản phẩm */
    .products_byParentCategory {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        max-width: 130rem;
        margin: 0 auto;
        padding: 20px;
    }

    .product {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        padding: 15px;
        transition: transform 0.3s ease-in-out;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .product:hover {
        transform: translateY(-10px);
    }

    /* Hình ảnh sản phẩm */
    .product__image img {
        width: 100%;
        max-width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    /* Tên sản phẩm */
    .product__name h3 {
        font-size: 16px;
        font-weight: bold;
        color: #333;
        text-align: center;
        margin: 10px 0;
    }

    /* Giá sản phẩm */
    .block-box-price {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .product__price--show {
        font-size: 18px;
        color: #e74c3c;
        font-weight: bold;
    }

    .product__price--through {
        font-size: 14px;
        color: #999;
        text-decoration: line-through;
    }

    /* Hiệu ứng giảm giá */
    .product__price--percent {
        background-color: red;
        /* Màu nền để nổi bật */
        ;
        color: white;
        border-radius: 20px;
        font-size: 11px;
        padding: 10px 10px;
        position: absolute;
        top: 10px;
        left: 10px;

    }

    /* Phần slide */
    /* Phần slide */
    .box_slides_bottom {
        max-width: 130rem;
        margin: 40px auto;
        overflow: hidden;
        /* Ẩn thanh cuộn ngang */
    }

    .slides_bottom {
        display: flex;
        gap: 10px;
        overflow-x: hidden;
        /* Ẩn thanh cuộn ngang */
        overflow-y: hidden;
        /* Ẩn thanh cuộn dọc */
        padding-bottom: 10px;
        width: 100%;
        /* Đảm bảo chiều rộng không tràn */
        scroll-snap-type: x mandatory;
        /* Dùng để tạo hiệu ứng cuộn ngang nếu cần */
    }



    .slide_image {
        flex: 0 0 calc(25% - 10px);
        position: relative;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }


    .news_title {
        height: 80px;
        /* position: absolute; */
        bottom: 10px;
        left: 10px;
        font-size: 14px;
        font-weight: bold;
        /* color: white; */
        /* background-color: rgba(0, 0, 0, 0.6);   */
        padding: 5px;
        border-radius: 5px;
    }

    /* Trang kết quả tìm kiếm */
    .box-searchProduct {
        padding: 20px;
        text-align: center;
    }

    h1 {
        color: #333;
        font-size: 24px;
        margin-bottom: 30px;
    }

    /* Phân trang */
    .pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }

    .pagination a {
        text-decoration: none;
        background-color: #3498db;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .pagination a:hover {
        background-color: #2980b9;
    }
    </style>
</head>

<body>

    <div class="box-searchProduct">
        <h1>Kết quả Tìm kiếm cho từ khóa "<?= htmlspecialchars($query) ?>":</h1>
        <div class="search-results">
            <div class="products_byParentCategory">
                <?php foreach ($products as $product): ?>
                <div class="product">
                    <div class="product__info"><a href="?act=showProductDetail&id=<?= $product['id'] ?> "
                            class="product__link">
                            <div class="product__price--percent">
                                <p class="">Giảm&nbsp;
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
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?act=searchProducts&page=<?= $i ?>&query=<?= urlencode($query) ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>

    </div>

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

</html>