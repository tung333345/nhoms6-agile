document.addEventListener('DOMContentLoaded', function() {
    // Lấy các elements
    const selectAllCheckbox = document.querySelector('.top .rounded-checkbox');
    const itemCheckboxes = document.querySelectorAll('.cart-item .rounded-checkbox');
    const checkoutBtn = document.querySelector('.checkout-btn');

    // 1. Xử lý checkbox "Chọn tất cả"
    if(selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function() {
            const isChecked = this.checked;
            console.log("Chọn tất cả:", isChecked); // Debug log

            // Cập nhật trạng thái các checkbox con
            itemCheckboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
            });

            // Cập nhật tổng tiền và trạng thái nút mua hàng
            updateTotalPrice();
            checkoutBtn.disabled = !isChecked; // Quan trọng: Cập nhật trực tiếp trạng thái nút
        });
    }

    // 2. Xử lý checkbox từng sản phẩm
    itemCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const hasCheckedItems = Array.from(itemCheckboxes).some(cb => cb.checked);
            console.log("Có sản phẩm được chọn:", hasCheckedItems); // Debug log

            updateTotalPrice();
            checkoutBtn.disabled = !hasCheckedItems;

            // Cập nhật trạng thái "Chọn tất cả"
            if(selectAllCheckbox) {
                const allChecked = Array.from(itemCheckboxes).every(cb => cb.checked);
                selectAllCheckbox.checked = allChecked;
            }
        });
    });

    // Hàm cập nhật tổng tiền
    function updateTotalPrice() {
        let total = 0;
        const checkedItems = document.querySelectorAll('.cart-item .rounded-checkbox:checked');
        
        checkedItems.forEach(checkbox => {
            const cartItem = checkbox.closest('.cart-item');
            const priceText = cartItem.querySelector('.price').textContent;
            const price = parseFloat(priceText.replace(/[^\d]/g, ''));
            const quantity = parseInt(cartItem.querySelector('.quantity-input').value);
            total += price * quantity;
        });

        const totalElement = document.querySelector('.cart-total span');
        if(totalElement) {
            totalElement.textContent = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(total).replace('₫', 'đ');
        }
    }

    // Thêm event listener cho nút checkout
    checkoutBtn.addEventListener('click', function() {
        const checkedItems = document.querySelectorAll('.cart-item .checkbox-wrapper .rounded-checkbox:checked');
        console.log("Số sản phẩm được chọn:", checkedItems.length);

        // Lấy cart IDs
        const cartIds = [];
        checkedItems.forEach(checkbox => {
            const cartItem = checkbox.closest('.cart-item');
            if (cartItem) {
                const itemId = cartItem.dataset.id;
                if (itemId) {
                    cartIds.push(itemId);
                    console.log("Added ID:", itemId);
                }
            }
        });

        console.log("Cart IDs:", cartIds);

        if (cartIds.length > 0) {
            window.location.href = 'index.php?act=checkout&cart_ids=' + cartIds.join(',');
        } else {
            alert('Vui lòng chọn ít nhất một sản phẩm để thanh toán');
            return;
        }
    });

    // Khởi tạo ban đầu
    updateTotalPrice();
    checkoutBtn.disabled = true;
});

