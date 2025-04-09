<?php
// Kiểm tra đăng nhập trước khi cho phép truy cập trang checkout
if (!isset($_SESSION['user'])) {
    header("Location: index.php?act=login-client");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán đơn hàng - CellphoneS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/checkout.css">
</head>
<body>

    <div class="container-checkout">
        <!-- Đơn hàng - Chỉ hiển thị sản phẩm -->
        <div class="cart-header">
            <a href="index.php?act=viewCart">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a>
            <div class="title">Thông tin</div>
        </div>

        <div class="section">
            <?php foreach ($selectedProducts as $product): ?>
                <div class="product-item" style="display: flex; align-items: center; margin-bottom: 20px;">
                    <div class="product-image">
                        <img src="./admin/assets/images/uploads/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name_product']) ?>" style="width: 180px; height: auto;">
                    </div>
                    <div class="product-info">
                        <div class="product-name"><?= htmlspecialchars($product['name_product']) ?></div>
                        <div class="product-price"><?= number_format($product['price'], 0, ',', '.') ?> VNĐ</div>
                        <div class="product-quantity">Số lượng: <?= htmlspecialchars($product['quantity']) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <form action="index.php?act=processOrder" method="POST">
        <!-- Thông tin người mua -->
        <h2 class="section-title">Thông tin khách hàng</h2>
        <div class="section">
            <div class="user-info">
                <div class="info-item">
                    <label class="info-label">Họ tên</label>
                    <input type="text" class="form-control" name="recipient_name" value="<?= htmlspecialchars($user['name']) ?>" oninvalid="this.setCustomValidity('Trường này là bắt buộc.')" oninput="this.setCustomValidity('')"
                     required>
                </div>
                <div class="info-item">
                    <label class="info-label">Số điện thoại</label>
                    <input type="tel" class="form-control" name="recipient_phone" value="<?= htmlspecialchars($user['phone_number']) ?>" oninvalid="this.setCustomValidity('Trường này là bắt buộc.')" oninput="this.setCustomValidity('')" required>
                </div>
                <div class="info-item">
                    <label class="info-label">Email</label>
                    <input type="email" class="form-control" name="recipient_email" value="<?= htmlspecialchars($user['email']) ?>" oninvalid="this.setCustomValidity('Trường này là bắt buộc.')" oninput="this.setCustomValidity('')"
                     required>
                </div>
            </div>
        </div>

        <!-- Chọn hình thức nhận hàng -->
        <h2 class="section-title">Thông tin nhận hàng</h2>
        <div class="section">
            <div class="delivery-options">
                <div class="delivery-option" onclick="selectDelivery('store')">
                    <div class="option-content">
                        <div class="option-icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <div class="option-details">
                            <div class="option-title">Nhận tại cửa hàng</div>
                            <div class="option-desc">
                                <i class="fas fa-check-circle"></i> Miễn phí
                            </div>
                            <div class="option-desc">
                                <i class="fas fa-clock"></i> Nhận trong ngày
                            </div>
                        </div>
                    </div>
                </div>
                <div class="delivery-option" onclick="selectDelivery('home')">
                    <div class="option-content">
                        <div class="option-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="option-details">
                            <div class="option-title">Giao hàng tận nơi</div>
                            <div class="option-desc">
                                <i class="fas fa-coins"></i> Từ 30.000₫
                            </div>
                            <div class="option-desc">
                                <i class="fas fa-clock"></i> Giao trong ngày
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form nhận tại cửa hàng -->
            <div id="store-form" style="display: none;"> 
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="store_city">Thành phố</label>
                        <select class="form-control" name="store_city" id="store_city" aria-label=".form-select-sm" oninvalid="this.setCustomValidity('Trường này là bắt buộc.')" oninput="this.setCustomValidity('')" required>
                            <option value="" selected>Chọn tỉnh/thành phố</option>
                            <!-- <option>Hà Nội</option>
                            <option>TP HCM</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="store_district">Quận/Huyện</label>
                        <select class="form-control" name="store_district" id="store_district" aria-label=".form-select-sm" oninvalid="this.setCustomValidity('Trường này là bắt buộc.')" oninput="this.setCustomValidity('')" required>
                            <option value="" selected>Chọn quận/huyện</option>
                            <!-- <option>Cầu Giấy</option>
                            <option>Nam Từ Liêm</option> -->
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="store_location">Cửa hàng</label>
                    <select class="form-control" name="store_location" id="store_location" oninvalid="this.setCustomValidity('Trường này là bắt buộc.')" oninput="this.setCustomValidity('')" required>
                        <option value="">Chọn cửa hàng</option>
                        <option>CellphoneS 123 Xuân Thủy, Cầu Giấy</option>
                        <option>CellphoneS 456 Trần Duy Hưng, Cầu Giấy</option>
                    </select>
                </div>
                <textarea class="form-control" name="store_notes" placeholder="Ghi chú (không bắt buộc)"></textarea>
            </div>

            <!-- Form giao hàng tận nơi -->
            <div id="delivery-form" style="display: none;">
                <div class="form-group-row">
                    <div class="form-group">
                        <label class="info-label">Họ tên người nhận</label>
                        <input type="text" class="form-control" name="delivery_recipient_name" value="<?= htmlspecialchars($user['name']) ?>" oninvalid="this.setCustomValidity('Trường này là bắt buộc.')" oninput="this.setCustomValidity('')" required>
                    </div>
                    <div class="form-group">
                        <label class="info-label">Số điện thoại</label>
                        <input type="tel" class="form-control" name="delivery_recipient_phone" value="<?= htmlspecialchars($user['phone_number']) ?>" oninvalid="this.setCustomValidity('Trường này là bắt buộc.')" oninput="this.setCustomValidity('')" required>
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="delivery_city">Thành phố</label>
                        <select class="form-control" name="delivery_city" id="delivery_city" aria-label=".form-select-sm" oninvalid="this.setCustomValidity('Trường này là bắt buộc.')" oninput="this.setCustomValidity('')" required>
                            <option value="" selected>Chọn tỉnh/thành phố</option>
                            <!-- <option>Hà Nội</option>
                            <option>TP HCM</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="delivery_district">Quận/Huyện</label>
                        <select class="form-control" name="delivery_district" id="delivery_district" aria-label=".form-select-sm" oninvalid="this.setCustomValidity('Trường này là bắt buộc.')" oninput="this.setCustomValidity('')" required>
                            <option value="" selected>Chọn quận/huyện</option>
                            <!-- <option>Cầu Giấy</option>
                            <option>Nam Từ Liêm</option> -->
                        </select>
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="delivery_ward">Xã/Phường</label>
                        <select class="form-control" name="delivery_ward" id="delivery_ward" aria-label=".form-select-sm" oninvalid="this.setCustomValidity('Trường này là bắt buộc.')" oninput="this.setCustomValidity('')" required>
                            <option value="" selected>Chọn phường/xã</option>
                            <!-- <option>Dịch Vọng</option>
                            <option>Dịch Vọng Hậu</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="delivery_address">Địa chỉ cụ thể</label>
                        <input type="text" class="form-control" name="delivery_address" id="delivery_address" placeholder="Số nhà, tên đường" oninvalid="this.setCustomValidity('Trường này là bắt buộc.')" oninput="this.setCustomValidity('')" required>
                    </div>
                </div>
                <textarea class="form-control" name="delivery_notes" placeholder="Ghi chú (không bắt buộc)"></textarea>
            </div>
        </div>

        <!-- Tổng tiền và nút đặt hàng - Chuyển xuống cuối -->
        <div class="section order-total">
            <div class="price-summary">
                <div class="price-row total-row">
                    <span>Tổng tiền</span>
                    <span><?= number_format($totalPrice, 0, ',', '.') ?> VNĐ</span>
                </div>
            </div>
        </div>
        
        <!-- Form để gửi địa chỉ và tổng tiền -->
        <input type="hidden" name="cart_ids" value="<?= htmlspecialchars($_GET['cart_ids'] ?? '') ?>">
        <input type="hidden" name="total_price" value="<?= $totalPrice ?>">
        <input type="hidden" name="recipient_name" value="<?= htmlspecialchars($user['name']) ?>">
        <input type="hidden" name="recipient_phone" value="<?= htmlspecialchars($user['phone_number']) ?>">
        <input type="hidden" name="recipient_email" value="<?= htmlspecialchars($user['email']) ?>">
        <input type="hidden" name="delivery_recipient_name" value="<?= htmlspecialchars($user['name']) ?>">
        <input type="hidden" name="delivery_recipient_phone" value="<?= htmlspecialchars($user['phone_number']) ?>">
        
        <!-- Địa chỉ giao hàng -->
        <input type="hidden" name="delivery_city" id="delivery_city_hidden">
        <input type="hidden" name="delivery_district" id="delivery_district_hidden">
        <input type="hidden" name="delivery_ward" id="delivery_ward_hidden">
        <input type="hidden" name="delivery_address" id="delivery_address_hidden">
        
        <!-- Địa chỉ cửa hàng -->
        <input type="hidden" name="store_city" id="store_city_hidden">
        <input type="hidden" name="store_district" id="store_district_hidden">
        <input type="hidden" name="store_location" id="store_location_hidden">
        
        <!-- Ghi chú -->
        <input type="hidden" name="store_notes" id="store_notes_hidden">
        <input type="hidden" name="delivery_notes" id="delivery_notes_hidden">
        
        <!-- Để trống value để JavaScript cập nhật -->
        <input type="hidden" name="delivery_method" id="delivery_method" value="">

        <button type="submit" class="checkout-button">ĐẶT HÀNG</button>
        </form>

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
// Script xử lý địa chỉ cho cả delivery và store form
function initializeAddressSelects() {
    // Elements cho delivery form
    const deliveryCitis = document.getElementById("delivery_city");
    const deliveryDistricts = document.getElementById("delivery_district");
    const deliveryWards = document.getElementById("delivery_ward");

    // Elements cho store form
    const storeCitis = document.getElementById("store_city");
    const storeDistricts = document.getElementById("store_district");
    const storeWards = document.getElementById("store_ward");

    // Lấy dữ liệu từ API
    const Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };

    axios(Parameter).then(function (result) {
        // Xử lý delivery form
        renderDeliveryAddresses(result.data, deliveryCitis, deliveryDistricts, deliveryWards);
        // Xử lý store form
        renderStoreAddresses(result.data, storeCitis, storeDistricts, storeWards);
    });
}

// Xử lý địa chỉ cho delivery form
function renderDeliveryAddresses(data, citis, districts, wards) {
    // Thêm tỉnh/thành
    for (const x of data) {
        citis.options[citis.options.length] = new Option(x.Name, x.Id);
    }

    // Xử lý khi chọn tỉnh/thành
    citis.onchange = function () {
        districts.length = 1;
        wards.length = 1;
        if(this.value != "") {
            const result = data.filter(n => n.Id === this.value);
            for (const k of result[0].Districts) {
                districts.options[districts.options.length] = new Option(k.Name, k.Id);
            }
        }
        updateHiddenInputs();
    };

    // Xử lý khi chọn quận/huyện
    districts.onchange = function () {
        wards.length = 1;
        const dataCity = data.filter((n) => n.Id === citis.value);
        if (this.value != "") {
            const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;
            for (const w of dataWards) {
                wards.options[wards.options.length] = new Option(w.Name, w.Id);
            }
        }
        updateHiddenInputs();
    };

    // Xử lý khi chọn phường/xã
    wards.onchange = function() {
        updateHiddenInputs();
    };
}

// Xử lý địa chỉ cho store form
function renderStoreAddresses(data, citis, districts, wards) {
    // Thêm tỉnh/thành
    for (const x of data) {
        citis.options[citis.options.length] = new Option(x.Name, x.Id);
    }

    // Xử lý khi chọn tỉnh/thành
    citis.onchange = function () {
        districts.length = 1;
        if(this.value != "") {
            const result = data.filter(n => n.Id === this.value);
            for (const k of result[0].Districts) {
                districts.options[districts.options.length] = new Option(k.Name, k.Id);
            }
        }
        updateStoreHiddenInputs();
    };

    // Xử lý khi chọn quận/huyện
    districts.onchange = function () {
        const dataCity = data.filter((n) => n.Id === citis.value);
        if (this.value != "") {
            updateStoreHiddenInputs();
        }
    };
}

// Cập nhật hidden inputs cho delivery form
function updateHiddenInputs() {
    const citySelect = document.getElementById('delivery_city');
    const districtSelect = document.getElementById('delivery_district');
    const wardSelect = document.getElementById('delivery_ward');
    const addressInput = document.getElementById('delivery_address');

    document.getElementById('delivery_city_hidden').value = 
        citySelect.options[citySelect.selectedIndex]?.text || '';
    document.getElementById('delivery_district_hidden').value = 
        districtSelect.options[districtSelect.selectedIndex]?.text || '';
    document.getElementById('delivery_ward_hidden').value = 
        wardSelect.options[wardSelect.selectedIndex]?.text || '';
    document.getElementById('delivery_address_hidden').value = 
        addressInput.value;
}

// Cập nhật hidden inputs cho store form
function updateStoreHiddenInputs() {
    const citySelect = document.getElementById('store_city');
    const districtSelect = document.getElementById('store_district');
    const locationSelect = document.getElementById('store_location');

    document.getElementById('store_city_hidden').value = 
        citySelect.options[citySelect.selectedIndex]?.text || '';
    document.getElementById('store_district_hidden').value = 
        districtSelect.options[districtSelect.selectedIndex]?.text || '';
    document.getElementById('store_location_hidden').value = 
        locationSelect.value;
}

// Xử lý chọn phương thức giao hàng
function selectDelivery(type) {
    const storeForm = document.getElementById('store-form');
    const deliveryForm = document.getElementById('delivery-form');
    const deliveryMethodInput = document.getElementById('delivery_method');

    deliveryMethodInput.value = type;

    if (type === 'store') {
        storeForm.style.display = 'block';
        toggleRequired('store-form',true);
        deliveryForm.style.display = 'none';
        toggleRequired('delivery-form',false);
    } else {
        storeForm.style.display = 'none';
        toggleRequired('store-form',false);
        deliveryForm.style.display = 'block';
        toggleRequired('delivery-form',true);
    }
}

function toggleRequired(inputId, isRequired) {
    // Lấy phần tử input dựa trên ID
    var inputElement = document.getElementById(inputId);

    // Lấy tất cả các input và select trong phần tử inputElement
    var inputs = inputElement.querySelectorAll('input, select');
    
    // Duyệt qua tất cả các input và select
    inputs.forEach(function(input) {
        if (isRequired) {
            input.setAttribute('required', 'required'); // Thêm thuộc tính required
        } else {
            input.removeAttribute('required'); // Loại bỏ thuộc tính required
        }
    });
}


// Khởi tạo khi trang load xong
document.addEventListener('DOMContentLoaded', function() {
    initializeAddressSelects();
    selectDelivery('store');

    // Thêm sự kiện cho form submission
    document.querySelector('.checkout-button').addEventListener('click', function() {
        updateHiddenInputs();
        updateStoreHiddenInputs();
    });
});
</script>
</body>
</html>