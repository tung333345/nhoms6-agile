<section>

    <div class="category_products">

        <?php if (!empty($productsByParent)): ?>

        <div class="products_byParentCategory">

            <?php foreach ($productsByParent as $product): ?>
            <div class="product">
                <div class="product__info">
                    <a href="?act=showProductDetail&id=<?= $product['id'] ?>" class="product__link">
                        <div class="product__price--percent">
                            <p class="product__price--percent-detail">Giảm&nbsp;
                                <?= htmlspecialchars($product['discount'] ?? '0') ?>%
                            </p>
                        </div>
                        <div class="product__image">
                            <img style="width: 160px; height: 160px;"
                                src="./admin/assets/images/uploads/<?= htmlspecialchars($product['Image']) ?>" alt=""
                                loading="lazy">
                        </div>
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
                            <p>Yêu Thích</p><a class="heat-icon" href="#"><img class="heat-icon-first"
                                    style="height: 20px; width: 20px;" src="./admin/assets/images/rating/heart.png"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>

        </div>

        <!-- Phân trang cho sản phẩm theo Parent -->

        <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?act=productByParent&id=<?= $parentId ?>&page=<?= $i ?>"
                class="<?= ($i === $currentPage) ? 'active' : '' ?>">
                <?= $i ?>
            </a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
        <?php elseif (!empty($productsByCategory)): ?>

        <div class="products_byCategory">

            <?php foreach ($productsByCategory as $product): ?>

            <div class="product">
                <div class="product__info">
                    <a href="?act=showProductDetail&id=<?= $product['id'] ?>" class="product__link">
                        <div class="product__price--percent">
                            <p class="product__price--percent-detail">Giảm&nbsp;
                                <?= htmlspecialchars($product['discount'] ?? '0') ?>%
                            </p>
                        </div>
                        <div class="product__image">
                            <img style="width: 160px; height: 160px;"
                                src="./admin/assets/images/uploads/<?= htmlspecialchars($product['Image']) ?>" alt=""
                                loading="lazy">
                        </div>
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
                            <p>Yêu Thích</p><a class="heat-icon" href="#"><img class="heat-icon-first"
                                    style="height: 20px; width: 20px;" src="./admin/assets/images/rating/heart.png"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>

        </div>

        <!-- Phân trang cho sản phẩm theo Category -->
        <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?act=productByCategory&id=<?= $categoryId ?>&page=<?= $i ?>"
                class="<?= ($i === $currentPage) ? 'active' : '' ?>">
                <?= $i ?>
            </a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
        <?php else: ?>
        <div class="error-mess">
            <p>Không có sản phẩm nào được tìm thấy.</p>
        </div>

        <?php endif; ?>

    </div>
</section>
<style>
.category_products {
    margin-top: 4rem;
    margin-bottom: 4rem;
}

.error-mess {
    margin: 0 auto;
}

.error-mess p {
    text-align: center;
    font-size: 24px;
    font-family: Roboto, sans-serif;
}

.products_byParentCategory,
.products_byCategory {
    margin-top: 4rem;
    margin-bottom: 4rem;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
    max-width: 130rem;
    margin: 0 auto;
    margin-bottom: 2rem;
    gap: 4rem 2rem;
}



.product__price--percent {
    background-image: url(./admin/assets/images/rating/detail_discount.png);
    background-position: 50%;
    background-repeat: no-repeat;
    background-size: contain;
    height: 34px;
    left: -8px;
    position: absolute;
    top: -6px;
    width: 80px;
}

.product__price--percent-detail {

    color: #fff;
    font-size: 12px;
    font-weight: 700;
    margin: 5px 0 0;
    text-align: center;
    width: 100%;
}

.product__image img {
    width: 100%;
    max-width: 15em;
    height: auto;
    object-fit: cover;
    border-radius: 1rem;
    font-family: Roboto, sans-serif;
}

.product__name h3 {
    font-size: 1.2em;
    margin: 1rem 0;
    text-align: center;
    height: 4em;
    font-size: 14px;
    font-weight: 600;
}

.block-box-price {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.product__price--show {
    font-size: 1.7em;
    color: #e74c3c;
    font-weight: bold;
}

.product__price--through {
    font-size: 1.2em;
    color: #999;
    text-decoration: line-through;
    font-weight: bold;
}

.product_Detail .Detail-price {
    align-items: flex-start;
    background: #f3f4f6;
    border: 1px solid #e5e7eb;
    border-radius: 5px;
    display: flex;
    font-size: 12px;
    line-height: 1.5;
    margin-left: 0;
    overflow: hidden;
    padding: 5px;
    text-transform: none;
    width: auto;
}

.parent_left {
    flex: 1;
}

.categories_right {
    flex: 2;
}


.product {
    min-height: 250px;
    border: 1px solid #ddd;
    padding: 10px;
    margin: 10px;
    border-radius: 1rem;
    box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .1), 0 2px 6px 2px rgba(60, 64, 67, .15);
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: transparent;
    position: relative;
    justify-content: space-between;
}

.product__info {
    text-align: center;
}

.product__link {
    text-decoration: none;
    color: inherit;
}

.product__price--show {
    font-size: 1.5em;
    color: #e74c3c;
    font-weight: bold;
}

.product__price--through {
    font-size: 1.2em;
    color: #999;
    text-decoration: line-through;
}

/* .pagination {
    margin-top: 20px;
    text-align: center;
    padding: 10px;
    margin: 0 auto;

    max-width: 130rem;
}

.pagination a {
    margin: 0 5px;
    text-decoration: none;
    color: #E24B5C;
    font-weight: bold;
    font-size: 22px;
    border: 1px solid #999;
    padding: 10px 15px;
    border-radius: 1rem;
}

.pagination a:hover {
    text-decoration: underline;
} */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination a {
    margin: 0 5px;
    padding: 10px 15px;
    text-decoration: none;
    color: #E24B5C;
    font-weight: bold;
    border: 1px solid #E24B5C;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

.pagination a:hover {
    background-color: #E24B5C;
    color: #fff;
}

.pagination a.active {
    background-color: #E24B5C;
    color: #fff;
}


.bottom-div {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 3.5em;
    margin-top: auto;

}

.star-icon {
    display: flex;
}

.heart-content {
    display: flex;
    align-items: center;


}
</style>

<script>
document.querySelectorAll('.heat-icon').forEach(item => {
    item.addEventListener('click', event => {

        alert('Đã thêm vào yêu thích!');
    });
});
</script>