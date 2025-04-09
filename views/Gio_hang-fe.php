<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="page-product.html">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/news.css">
    <link rel="stylesheet" href="./assets/css/gio_hangs.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./assets/js/script.js"></script>
</head>

<body>

    <!-- End Header -->
    <div class="container-box-cart">
        <div class="body-cart">
            <div class="cart-header">
                <a href="index.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
                <div class="title">
                    GIỎ HÀNG CỦA BẠN
                </div>
            </div>

            <div class="btn-cart">
                <a href="/Cellpones/Gio_hang.html">Giỏ hàng</a>
            </div>

            <div class="listItem-super-cart">
                <div class="top">
                    <input type="checkbox" class="rounded-checkbox">
                    <div class="check-box-title">Chọn tất cả</div>
                </div>

                <div class="cart-list-items">
                    <?php if (!empty($cartItems)) { ?>
                        <?php foreach ($cartItems as $index => $item) { ?>
                            <div class="cart-item" data-id="<?= $item['id'] ?>" data-index="<?= $index ?>">
                                <div class="item-top">
                                    <div class="checkbox-wrapper">
                                        <input type="checkbox" class="rounded-checkbox" data-price="<?= $item['price'] ?>">
                                    </div>

                                    <div class="img-item">
                                        <img src="./admin/assets/images/uploads/<?= $item['image'] ?>" alt="<?= $item['name_product'] ?>">
                                    </div>

                                    <div class="item-left">
                                        <div class="item-left-top">
                                            <div class="title"><?= $item['name_product'] ?></div>
                                            <div class="delete-wrapper">
                                                <form action="index.php?act=deleteCart" method="POST">
                                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                    <button type="submit" class="delete-btn" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                                        <ion-icon name="trash-bin-outline"></ion-icon>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="item-left-bot">
                                            <div class="price-quantity-wrapper">
                                                <div class="price"><?= number_format($item['price'], 0, ',', '.') ?>đ</div>
                                                <form class="form2" action="index.php?act=update_quantity" method="POST">
                                                    <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>"> <!-- ID của sản phẩm -->
                                                    <div class="action">
                                                        <button type="submit" name="is_add" value="false" class="decrease-btn">-</button>
                                                        <input type="text" style="border:2px solid #00000066" class="quantity-input" value="<?= $item['quantity'] ?>" readonly>
                                                        <button type="submit" name="is_add" value="true" class="increase-btn">+</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="empty-cart">Giỏ hàng trống</div>
                    <?php } ?>
                </div>

                <div class="cart-summary">
                    <div class="cart-total">Tổng tiền: <span>0đ</span></div>
                    <button type="button" id="checkoutBtn" class="checkout-btn">Mua ngay</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    </script>

    <script src="./assets/js/cart.js"></script>

</body>

</html>
