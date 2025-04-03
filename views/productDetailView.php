<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta nameauto;wport content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['Name_product']) ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" type="text/css" href="./assets/css/home_fe.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/productDetail.css">
    <link rel="stylesheet" href="./assets/css/product.css">
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const breadcrumb = document.querySelector('.breadcrumb');
        const path = window.location.pathname.split('/').filter(segment => segment);
        let breadcrumbHTML = '<li><a href="/">Home</a></li>';

        path.forEach((segment, index) => {
            const url = '/' + path.slice(0, index + 1).join('/');
            if (index === path.length - 1) {
                breadcrumbHTML += `<li>${segment}</li>`;
            } else {
                breadcrumbHTML += `<li><a href="${url}">${segment}</a></li>`;
            }
        });

        breadcrumb.innerHTML = breadcrumbHTML;
    });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (isset($_GET['success'])): ?>
            Swal.fire({
                title: 'Thành công!',
                text: 'Đã thêm sản phẩm vào giỏ hàng!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>
        
        <?php if (isset($_GET['error'])): ?>
            Swal.fire({
                title: 'Lỗi!',
                text: 'Có lỗi xảy ra khi thêm vào giỏ hàng!',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>
    });
</script>
</head>

<body>
    <?php
    $url = $_SERVER['REQUEST_URI'];
    $urlParts = explode('/', trim($url, '/'));
    ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <?php
            $path = '';
            foreach ($urlParts as $part) {
                $path .= '/' . $part;
                echo '<li class="breadcrumb-item"><a href="' . $path . '">' . ucfirst($part) . '</a></li>';
            }
            ?>
        </ol>
    </nav>

    <section>

        <div class="box-detail-product">
            <div class="box-detail-product-left">
                <div class="title-product">
                    <h1><?= htmlspecialchars($product['Title']) ?></h1>
                </div>
                <div class="box-left">
                    <div class="box-detail-product-left-Gallery">
                        <div class="box-proview">
                            <img src="./admin/assets/images/uploads/<?= htmlspecialchars($product['Image']) ?>">
                            <div>
                                <p class="tilte-desktop">
                                    Tính năng nổi bật
                                </p>
                                <div class="description">
                                    <?= htmlspecialchars($product['Description']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns-mt1">
                        <div class="columns-mt1-is-haft">
                            <div class="box-warranty-info">
                                <div class="box-title">
                                    <p>Thông tin sản phẩm</p>
                                </div>
                                <div class="box-content">
                                    <div class="items-info">
                                        <div class="icon">
                                            <img src="./admin/assets/images/gallery/1.png" alt="">
                                        </div>
                                        <div class="description">Máy mới 100% , chính hãng Apple Việt
                                            Nam.<br>CellphoneS hiện là đại lý bán lẻ uỷ quyền iPhone
                                            chính hãng VN/A của Apple Việt Nam</div>
                                    </div>
                                    <div class="items-info">
                                        <div class="icon">
                                            <img src="./admin/assets/images/gallery/2.png" alt="">
                                        </div>
                                        <div class="description">Hộp, Sách hướng dẫn, Cây lấy sim, Cáp
                                            Type C</div>
                                    </div>
                                    <div class="items-info">
                                        <div class="icon">
                                            <img src="./admin/assets/images/gallery/3.png" alt="">
                                        </div>
                                        <div class="description">1 ĐỔI 1 trong 30 ngày nếu có lỗi phần
                                            cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành
                                            chính hãng Apple: CareS.vn<a target="_blank" href="#"
                                                style="color: red;">(xem chi tiết)</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns-mt1-haft">
                            <div class="box-warranty-info">
                                <div class="stock-option">
                                    <div class="stock-option-local">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-detail-product-right">
                <!-- <div class="list-linked">
                    <a href="#" class="item-list-linked">
                        <div>
                            <strong></strong>
                        </div>
                        <span></span>
                    </a>
                    <a href="#" class="item-list-linked">
                        <div>
                            <strong></strong>
                        </div>
                        <span></span>
                    </a>
                    <a href="#" class="item-list-linked">
                        <div>
                            <strong></strong>
                        </div>
                        <span></span>
                    </a>
                </div> -->
                <div class="block-box-price">
                    <p class="product__price--show">
                        <?= htmlspecialchars($product['Promotion_price']) ?>đ
                    </p>
                    <p class="product__price--through">
                        <?= htmlspecialchars($product['Price']) ?>đ
                    </p>
                </div>
                <div class="box-title">
                    <p>Chọn màu để xem giá và chi nhánh có hàng</p>
                </div>
                <div class="list-box-variant">
                    <div class="box-content">
                        <ul class="list-variant">
                            <li class="item-variant">
                                <a href="#" class="button__change-color">
                                    <img src="./admin/assets/images/uploads/<?= htmlspecialchars($product['Image']) ?>">
                                    <div class="flex">
                                        <strong class="name"><?= htmlspecialchars($product['Color']) ?>
                                        </strong>
                                        <p class="product__price--show"
                                            style="color:#444;font-size:12px  ;font-weight:normal  ">
                                            <?= htmlspecialchars($product['Promotion_price']) ?>đ
                                        </p>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="banner-block-right-promotion">
                    <div class="block-promotion-banner">
                        <a href="#" class="banner">
                            <!-- <img src="/Cellpones/image/product/iphone/iPhone-product-banner-v1.webp" alt=""> -->
                        </a>
                    </div>
                </div>
                <div class="box-product-promotion">
                    <div class="pay-left">
                        <a href="?act=buyNow&id=<?= $product['id'] ?>">
                            <div class="p1">
                                <strong>MUA NGAY</strong>
                            </div>
                            <div class="p2">
                                <p>(Giao hàng nhanh từ 2 giờ hoặc nhận tại cửa hàng)</p>
                            </div>
                        </a>
                    </div>
                    <div class="add-to-card">
                        <form action="?act=add-to-cart" method="POST">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['Name_product']) ?>">
                            <input type="hidden" name="product_price" value="<?= $product['Promotion_price'] ?>">
                            <input type="hidden" name="product_image" value="<?= htmlspecialchars($product['Image']) ?>">
                            <button type="submit" class="box-pay-to-card">
                                <div class="img">
                                    <img src="./admin/assets/images/add-to-cart.png" alt="">
                                </div>
                                <div class="p">
                                    <p>Thêm vào giỏ hàng</p>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="category_products">
            <div class="category_products">
                <div class="category__products_controller">
                    <div class="parent_left">

                        <div class="specific-parent-category">
                            <div class="parent-category" id="parentCategory-4">
                                <h1>
                                    SẢN PHẨM TƯƠNG TỰ
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="categories_right">

                    </div>
                </div>
            </div>
            <div class="products_byParentCategory">
                <?php foreach ($relatedProducts as $relatedProduct): ?>
                <div class="product">
                    <div class="product__info"><a href="?act=showProductDetail&id=<?= $relatedProduct['id'] ?> "
                            class="product__link">
                            <div class="product__price--percent">
                                <p class="product__price--percent-detail">Giảm&nbsp;
                                    <?= htmlspecialchars($relatedProduct['discount'] ?? '0') ?>%
                                </p>
                            </div>
                            <div class="product__image"><img style="width: 160px; height: 160px;"
                                    src="./admin/assets/images/uploads/<?= htmlspecialchars($relatedProduct['Image']) ?>"
                                    alt="" loading="lazy"></div>
                            <div class="product__name">
                                <h3>
                                    <?= htmlspecialchars($relatedProduct['Name_product']) ?>
                                </h3>
                            </div>
                            <div class="block-box-price">
                                <p class="product__price--show">
                                    <?= htmlspecialchars($relatedProduct['Promotion_price']) ?>
                                </p>
                                <p class="product__price--through">
                                    <?= htmlspecialchars($relatedProduct['Price']) ?>
                                </p>
                            </div>
                            <div class="product_Detail">
                                <div class="Detail">
                                    <p class="Detail-price">
                                        <?= htmlspecialchars($relatedProduct['Detail']) ?>
                                    </p>
                                </div>
                            </div>
                        </a></div>d
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
    <section>
        <div class="technicalInfo">
            <div class="technicalInfo_left">
                <div class="box-Des">
                    <h2>ĐẶC ĐIỂM NỔI BẬT</h2>
                </div>
                <div id="boxFAQ">
                    <p class="boxFAQ_title">Câu hỏi thường gặp</p>
                    <div role="tablist" class="accordion">
                        <div class="mb-1">
                            <div class="b-button button__show-faq">
                                <p>Tại sao nên mua
                                    <?php echo htmlspecialchars($product['Name_product']); ?> tại CellphoneS?
                                </p>
                                <div></div>
                            </div>

                            <div class="mb-1">
                                <div class="b-button button__show-faq">
                                    <p>Thiết kế của
                                        <?php echo htmlspecialchars($product['Name_product']); ?> ra sao?
                                    </p>
                                    <div></div>
                                </div>

                            </div>

                            <div class="mb-1">
                                <div class="b-button button__show-faq">
                                    <p>Công nghệ trên
                                        <?php echo htmlspecialchars($product['Name_product']); ?> có gì nổi bật?
                                    </p>
                                    <div></div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="technicalInfo_right">
                <div class="technical-info">
                    <div class="content-top">
                        <h2 class="title-m-b-3">Thông số kỹ thuật</h2>
                    </div>
                    <ul class="technical-content">
                        <li class="technical-content-item">
                            <p>Tốc độ CPU</p>
                            <div><?= htmlspecialchars($product['Cpu_speed']) ?></div>
                        </li>
                        <li class="technical-content-item">
                            <p>Bộ nhớ</p>
                            <div><?= htmlspecialchars($product['Memory']) ?></div>
                        </li>
                        <li class="technical-content-item">
                            <p>Cân nặng</p>
                            <div><?= htmlspecialchars($product['Weight']) ?></div>
                        </li>
                        <li class="technical-content-item">
                            <p>Kích thước</p>
                            <div><?= htmlspecialchars($product['Size']) ?></div>
                        </li>
                        <li class="technical-content-item">
                            <p>Hệ điều hành</p>
                            <div><?= htmlspecialchars($product['Os']) ?></div>
                        </li>
                        <li class="technical-content-item">
                            <p>Camera chính</p>
                            <div><?= htmlspecialchars($product['Camera_primary']) ?></div>
                        </li>
                        <li class="technical-content-item">
                            <p>Camera phụ</p>
                            <div><?= htmlspecialchars($product['Camera_secondary']) ?></div>
                        </li>
                        <li class="technical-content-item">
                            <p>WLAN</p>
                            <div><?= htmlspecialchars($product['Wlan']) ?></div>
                        </li>
                        <li class="technical-content-item">
                            <p>Màn hình</p>
                            <div><?= htmlspecialchars($product['Screen']) ?></div>
                        </li>
                    </ul>
                </div>
            </div>
    </section>
    <section>
    <section>
    <div class="rating-summary-container">
        <h2>Đánh giá & Bình luận</h2>
        
        <?php if (isset($ratingSummary) && is_array($ratingSummary)): ?>
        <div class="rating-summary">
            <div class="rating-average-column">
                <div class="average-score">
                    <?php 
                        $averageRating = isset($ratingSummary['average_rating']) ? 
                            number_format($ratingSummary['average_rating'], 1) : '0.0';
                        echo $averageRating;
                    ?>
                </div>
                <div class="star-display">
                    <?php 
                        $avgRating = floatval($ratingSummary['average_rating'] ?? 0);
                        for($i = 1; $i <= 5; $i++): 
                    ?>
                        <i class="fas fa-star <?php echo $i <= $avgRating ? 'active' : ''; ?>"></i>
                    <?php endfor; ?>
                </div>
                <div class="total-ratings">
                    <?php echo isset($ratingSummary['total_reviews']) ? 
                        $ratingSummary['total_reviews'] : 0; ?> đánh giá
                </div>
            </div>

            <div class="rating-bars-column">
                <?php 
                $ratings = [
                    ['label' => '5 sao', 'count' => $ratingSummary['five_star'] ?? 0, 'percent' => $ratingSummary['five_star_percent'] ?? 0],
                    ['label' => '4 sao', 'count' => $ratingSummary['four_star'] ?? 0, 'percent' => $ratingSummary['four_star_percent'] ?? 0],
                    ['label' => '3 sao', 'count' => $ratingSummary['three_star'] ?? 0, 'percent' => $ratingSummary['three_star_percent'] ?? 0],
                    ['label' => '2 sao', 'count' => $ratingSummary['two_star'] ?? 0, 'percent' => $ratingSummary['two_star_percent'] ?? 0],
                    ['label' => '1 sao', 'count' => $ratingSummary['one_star'] ?? 0, 'percent' => $ratingSummary['one_star_percent'] ?? 0]
                ];
                foreach ($ratings as $rating): ?>
                <div class="rating-bar-row">
                    <div class="star-label"><?php echo $rating['label']; ?></div>
                    <div class="progress-bar">
                        <div class="progress" style="width: <?php echo $rating['percent']; ?>%"></div>
                    </div>
                    <div class="rating-count"><?php echo $rating['count']; ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php else: ?>
            <p>Chưa có đánh giá nào cho sản phẩm này</p>
        <?php endif; ?>
    </div>

    <div class="box_comment">
        <?php if (is_array($comments) && count($comments) > 0): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment-item">
                    <div class="comment-header">
                        <strong><?= htmlspecialchars($comment['username']) ?></strong>
                        <div class="comment-rating">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <i class="fas fa-star <?= $i <= $comment['rating'] ? 'active' : '' ?>"></i>
                            <?php endfor; ?>
                        </div>
                        <span class="comment-time"><?= date('d/m/Y H:i', strtotime($comment['comment_time'])) ?></span>
                    </div>
                    <p class="comment-content"><?= htmlspecialchars($comment['comment_content']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Chưa có bình luận nào.</p>
        <?php endif; ?>
    </div>

    <!-- Form bình luận -->
    <?php if (isset($_SESSION['user'])): ?>
        <form class="form2" action="?act=submit-comment" method="POST" onsubmit="return validateForm()">            
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
            <div class="rating-input">
                <p>Đánh giá của bạn: <span class="required">*</span></p>
                <div class="star-rating">
                    <i class="fas fa-star" data-rating="1"></i>
                    <i class="fas fa-star" data-rating="2"></i>
                    <i class="fas fa-star" data-rating="3"></i>
                    <i class="fas fa-star" data-rating="4"></i>
                    <i class="fas fa-star" data-rating="5"></i>
                    <input type="hidden" name="rating" id="rating-value" value="" required>
                </div>
                <span id="rating-error" class="error-message"></span>
            </div>
            <div>
                <textarea name="comment_content" id="comment_content" placeholder="Nhập đánh giá của bạn..." oninvalid="this.setCustomValidity('Nhập bình luận trước khi submit.')" oninput="this.setCustomValidity('')" required></textarea>
                <span id="comment-error" class="error-message"></span>
            </div>
            <button class="button2" type="submit">Gửi bình luận</button>
        </form>
    <?php else: ?>
        <p>Vui lòng <a href="?act=login-client">đăng nhập</a> để bình luận.</p>
    <?php endif; ?>
</div>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star-rating .fas');
            const ratingInput = document.getElementById('rating-value');
            const ratingError = document.getElementById('rating-error');
            const commentError = document.getElementById('comment-error');
            
            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = parseInt(this.dataset.rating);
                    ratingInput.value = rating;
                    
                    // Reset error message khi người dùng chọn sao
                    ratingError.textContent = '';
                    document.querySelector('.star-rating').classList.remove('error');
                    
                    // Reset tất cả các sao
                    stars.forEach(s => s.classList.remove('active'));
                    
                    // Đổi màu các sao được chọn
                    stars.forEach(s => {
                        if (parseInt(s.dataset.rating) <= rating) {
                            s.classList.add('active');
                        }
                    });
                });
            });
        });

    // Hàm validate form trước khi submit
        function validateForm() {
            let isValid = true;
            const ratingInput = document.getElementById('rating-value');
            const commentInput = document.getElementById('comment_content');
            const ratingError = document.getElementById('rating-error');
            const commentError = document.getElementById('comment-error');
            
            // Reset error messages
            ratingError.textContent = '';
            commentError.textContent = '';
            document.querySelector('.star-rating').classList.remove('error');
            commentInput.classList.remove('error');
            
            // Kiểm tra đánh giá sao
            if (!ratingInput.value) {
                ratingError.textContent = 'Vui lòng chọn số sao đánh giá';
                document.querySelector('.star-rating').classList.add('error');
                isValid = false;
            }
            
            // Kiểm tra nội dung bình luận
            if (!commentInput.value.trim()) {
                commentError.textContent = 'Vui lòng nhập nội dung bình luận';
                commentInput.classList.add('error');
                isValid = false;
            } else if (commentInput.value.trim().length < 10) {
                commentError.textContent = 'Nội dung bình luận phải có ít nhất 10 ký tự';
                commentInput.classList.add('error');
                isValid = false;
            }
            
            if (!isValid) {
                // Nếu có lỗi, hiển thị thông báo tổng quát
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Vui lòng kiểm tra lại thông tin đánh giá',
                    icon: 'error',
                    confirmButtonText: 'Đóng'
                });
            }
            
            return isValid;
        }
</script>

</body>

</html>