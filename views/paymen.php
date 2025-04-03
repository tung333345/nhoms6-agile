<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán - CellphoneS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/checkout.css">
    <style>
        .container-pay {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .header .back-btn {
            font-size: 20px;
            color: #333;
        }

        .header .title {
            font-size: 20px;
            font-weight: bold;
        }

        .steps {
            display: flex;
            margin-bottom: 30px;
            border-bottom: 1px solid #ddd;
        }

        .step {
            padding: 15px 30px;
            color: #666;
            position: relative;
        }

        .step.active {
            color: #d70018;
            border-bottom: 2px solid #d70018;
        }

        .section {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .coupon-input {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .coupon-input input {
            flex: 1;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .coupon-input button {
            padding: 12px 20px;
            background: #f4f4f4;
            border: none;
            border-radius: 4px;
            color: #333;
            cursor: pointer;
        }

        .coupon-select {
            color: #0066cc;
            margin: 10px 0;
            cursor: pointer;
        }

        .order-summary {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            color: #333;
        }

        .summary-row span:first-child {
            font-size: 15px;
            color: #7c8691;
        }

        .summary-row span:last-child {
            font-size: 16px;
            color: #212b36;
        }

        .total-row span:first-child {
            font-weight: 600;
            color: #111;
        }

        .total-row {
            font-weight: bold;
            font-size: 16px;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }

        .payment-section {
            margin-top: 20px;
        }

        .payment-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .payment-option {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            cursor: pointer;
        }

        .payment-option img {
            width: 30px;
            margin-right: 15px;
        }

        .payment-option .text {
            flex: 1;
        }

        .payment-option .arrow {
            color: #666;
        }

        .checkout-button {
            width: 100%;
            padding: 15px;
            background: #d70018;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
        }

        .product-check {
            text-align: center;
            color: #0066cc;
            margin-top: 10px;
            cursor: pointer;
        }

        .payment-methods {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .payment-option {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-option.active {
            border-color: #d70018;
            background-color: #fff5f5;
        }

        .payment-option:hover {
            border-color: #d70018;
        }
    </style>
</head>

<body>
    <div class="container-pay">
        <div class="cart-header">
            <a href="index.php?act=viewCart">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a>
            <div class="title">Thanh toán</div>
        </div>



        <div class="section">
            <!-- <div class="coupon-input">
                <input type="text" placeholder="Nhập mã giảm giá (chỉ áp dụng 1 lần)">
                <button>Áp dụng</button>
            </div> -->
            <!-- <div class="coupon-select">
                hoặc chọn từ 2 mã giảm giá có sẵn
            </div> -->
            <div class="order-summary">
                <div class="summary-row">
                    <span>Số lượng sản phẩm</span>
                    <span><?= $totalQuantity ?></span>
                </div>
                <div class="summary-row">
                    <span>Tiền hàng (tạm tính)</span>
                    <span><?= number_format($totalAmount, 0, ',', '.') ?>₫</span>
                </div>

                <div class="summary-row total-row">
                    <span>Tổng tiền (đã gồm VAT)</span>
                    <span><?= number_format($totalAmount, 0, ',', '.') ?>₫</span>
                </div>
            </div>


        </div>

        <div class="section">
            <div class="payment-title">THÔNG TIN THANH TOÁN</div>
            <div class="payment-methods">
                <div class="payment-option" data-method="momo">
                    <img src="https://th.bing.com/th/id/OIP.1GNvjAZu4hlbE0bWflshGwHaHa?rs=1&pid=ImgDetMain" alt="Momo">
                    <div class="text">Thanh toán qua Momo</div>
                    <!-- <div class="arrow">
                        <i class="fas fa-chevron-right"></i>
                    </div> -->
                </div>
                <div class="payment-option" data-method="bank">
                    <img src="https://th.bing.com/th/id/OIP.yVztzr5ke-D_hI472kIWzQHaHa?rs=1&pid=ImgDetMain" alt="Bank">
                    <div class="text">Thanh toán qua ngân hàng</div>
                    <!-- <div class="arrow">
                        <i class="fas fa-chevron-right"></i>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="section">
            <div class="payment-title">THÔNG TIN NHẬN HÀNG</div>
            <div class="order-summary">
                <div class="summary-row">
                    <span>Khách hàng</span>
                    <span><?= $userInfo['username'] ?></span>
                </div>
                <div class="summary-row">
                    <span>Số điện thoại</span>
                    <span><?= $userInfo['phone_number'] ?></span>
                </div>
                <div class="summary-row">
                    <span>Email</span>
                    <span><?= $userInfo['email'] ?></span>
                </div>
                <div class="summary-row">
                    <span>Nhận hàng tại</span>
                    <span><?= $order['Delivery_address'] ?></span>
                </div>
            </div>


        </div>
        <div class="section">
            <div class="summary-row total-row">
                <span>Tổng tiền tạm tính:</span>
                <span><?= number_format($totalAmount, 0, ',', '.') ?>₫</span>
            </div>
            <button class="checkout-button" type="submit" onclick="processPayment()">Thanh toán</button>
            <div class="product-check">
                Kiểm tra danh sách sản phẩm (1)
            </div>
        </div>




    </div>

    <script>
        let selectedPaymentMethod = '';

        document.querySelectorAll('.payment-option').forEach(option => {
            option.addEventListener('click', function () {
                selectedPaymentMethod = this.dataset.method;
                // Xóa active class từ tất cả options
                document.querySelectorAll('.payment-option').forEach(opt => {
                    opt.classList.remove('active');
                });
                // Thêm active class cho option được chọn
                this.classList.add('active');
            });
        });

        function processPayment() {
            if (!selectedPaymentMethod) {
                alert('Vui lòng chọn phương thức thanh toán');
                return;
            }

            // Lưu thông tin đơn hàng vào session trước khi chuyển trang
            const orderData = {
                method: selectedPaymentMethod,
                amount: <?= $totalAmount ?>,
                timestamp: new Date().getTime()
            };
            sessionStorage.setItem('pendingOrder', JSON.stringify(orderData));

            // Chuyển hướng với thông tin thanh toán
            window.location.href = `?act=payment_qr&method=${selectedPaymentMethod}&amount=<?= $totalAmount ?>`;
        }
    </script>
</body>

</html>