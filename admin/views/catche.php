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
                    <h1>Quản lý các đơn hàng của user</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h1>Users with Orders</h1>
                    <ul>
                        <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                        <li>
                            User ID: <?php echo $user['user_id']; ?><br>
                            Name: <?php echo $user['name']; ?><br>
                            Phone: <?php echo $user['phone_number']; ?><br>
                            Email: <?php echo $user['email']; ?><br>
                            <a href="?act=viewOrders&id=<?= $user['user_id'] ?>">View Orders</a>
                        </li>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <li>No users found with orders.</li>
                        <?php endif; ?>
                    </ul>
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
                                src="./admin/assets/images/uploads/<?= htmlspecialchars($product['Image']) ?>" alt=""
                                loading="lazy"></div>
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
                        {{ edit_1 }}
                        <!-- Display rating -->
                        <div class="product__rating">
                            <p>Rating: <?= htmlspecialchars($product['rating']) ?></p>
                        </div>
                        {{ edit_1_end }}
                    </a></div>
                <div class="rating-items">
                    <div class="bottom-div">
                        <div class="star-icon">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                            <div><img style="height: 20px; width: 20px;" src="./admin/assets/images/rating/star.png"
                                    alt="">
                            </div>
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
    </div>
</section>

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
                                src="./admin/assets/images/uploads/<?= htmlspecialchars($product['Image']) ?>" alt=""
                                loading="lazy"></div>
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
                        // ... existing code ...
                        {{ edit_1 }}
                        <!-- Hiển thị đánh giá -->
                        <?php
                            // Lấy đánh giá từ bảng comments
                            $productId = $product['id'];
                            $query = "SELECT AVG(rating) as average_rating FROM comments WHERE product_id = ?";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute([$productId]);
                            $averageRating = $stmt->fetchColumn();
                            ?>
                        <div class="product__rating">
                            <p>Đánh giá trung bình: <?= htmlspecialchars(number_format($averageRating, 1)) ?>
                            </p>
                        </div>
                        {{ edit_1_end }}
                        // ... existing code ...
                    </a></div>
                <div class="rating-items">
                    <div class="bottom-div">
                        <div class="star-icon">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                            <div><img style="height: 20px; width: 20px;" src="./admin/assets/images/rating/star.png"
                                    alt="">
                            </div>
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
    </div>
</section>
</body>

</html>


<!-- Form để cập nhật trạng thái -->
<form action="?act=updateOrderStatus&order_id=<?= $order['order_id']; ?>" method="post" style="display:inline;"
    onsubmit="return confirm('Bạn có chắc chắn muốn cập nhật trạng thái đơn hàng này không?');">
    <input type="hidden" name="order_id" value="<?= $order['order_id']; ?>">
    <select name="status_id" required>
        <?php foreach ($statuses as $status): ?>
        <option value="<?= $status['id']; ?>" <?= $status['id'] == $order['status_id'] ? 'selected' : ''; ?>>
            <?= $status['status_name']; ?>
        </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Update Status</button>
</form>

<!-- Form để xóa đơn hàng -->
<form action="?act=deleteOrder&order_id=<?= $order['order_id']; ?>" method="post" style="display:inline;">
    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?');">Delete</button>
</form>