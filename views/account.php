<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Tài Khoản</title>
    <link rel="stylesheet" href="./assets/css/contacts.css">
    <style>
        .value-container {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .display-value {
            flex: 1;
        }

        .edit-input {
            width: 100%;
            padding: 10px;
            border: none;
            outline: none;
            font-size: inherit;
            background: transparent;
        }

        textarea.edit-input {
            min-height: 60px;
        }

        .text-value {
            display: inline-block;
            min-height: 20px;
        }

        .edit-icon {
            color: #666;
            cursor: pointer;
            margin-left: 10px;
        }

        label {
            color: #ff0000;  /* Màu đỏ cho label */
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px;
            border-radius: 4px;
            color: white;
            z-index: 1000;
        }

        .notification.success {
            background-color: #4CAF50;
        }

        .notification.error {
            background-color: #f44336;
        }

        .cap-nhat {
            margin-top: 20px;
            text-align: center;
        }

        .update-button {
            background-color: #d21e1e;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-button:hover {
            background-color: #45a049;
        }

        .notification.info {
            background-color: #2196F3;
        }
    </style>
</head>
<body>
    <div class="account-container">
        <div class="account-header">
        <img src="./assets/image/poly.png" alt="Avatar" class="avatar">
        <h2><?php echo htmlspecialchars($userProfile['username'] ?? ''); ?></h2>
        </div>
        
        <div class="account-info">
        
            <div class="info-item">
                <label>Họ và tên:</label>
                <div class="value-container">
                    <div class="display-value">
                        <span class="text-value"><?php echo htmlspecialchars($userProfile['name'] ?? ''); ?></span>
                        <input type="text" class="edit-input" data-field="name" style="display: none;" 
                               value="<?php echo htmlspecialchars($userProfile['name'] ?? ''); ?>">
                    </div>
                    <i class="fas fa-edit edit-icon"></i>
                </div>
            </div>

            <div class="info-item">
                <label>Email:</label>
                <div class="value-container">
                    <div class="display-value">
                        <span class="text-value"><?php echo htmlspecialchars($userProfile['email'] ?? ''); ?></span>
                        <input type="email" class="edit-input" data-field="email" style="display: none;" 
                        value="<?php echo htmlspecialchars($userProfile['email'] ?? ''); ?>">
                    </div>                
                    <i class="fas fa-edit edit-icon"></i>
                </div>

            </div>

            <div class="info-item">
                <label>Giới tính:</label>
                <div class="value-container">
                    <div class="display-value">
                        <span class="text-value"><?php echo htmlspecialchars($userProfile['gender'] ?? 'Chưa cập nhật'); ?></span>
                        
                    </div>
                </div>
            </div>

            <div class="info-item">
                <label>Số điện thoại:</label>
                <div class="value-container">
                    <div class="display-value">
                        <span class="text-value"><?php echo htmlspecialchars($userProfile['phone_number'] ?? ''); ?></span>
                        <input type="tel" class="edit-input" data-field="phone_number" style="display: none;" 
                        value="<?php echo htmlspecialchars($userProfile['phone_number'] ?? ''); ?>">
                    </div> 
                 <i class="fas fa-edit edit-icon"></i>
                </div>

            </div>

            <div class="info-item">
                <label>Sinh nhật:</label>
                <div class="value-container">
                   
                        <span class="text-value">
                            <?php 
                                echo !empty($userProfile['birthday']) 
                                    ? date('d/m/Y', strtotime($userProfile['birthday'])) 
                                    : 'Chưa cập nhật'; 
                            ?>
                        </span>
                        
                 
                   
                </div>

            </div>

          
           
            <!-- <div class="info-item">
                <label>Địa chỉ:</label>
                <div class="value-container">
                    <div class="display-value">
                        <span class="text-value"><?php echo htmlspecialchars($userProfile['address'] ?? 'Chưa có địa chỉ mặc định'); ?></span>
                        <textarea class="edit-input" data-field="address" style="display: none;">
                            <?php echo htmlspecialchars($userProfile['address'] ?? ''); ?>
                        </textarea>
                    </div>
                    <i class="fas fa-edit edit-icon"></i>
                </div>
            </div> -->
        </div>
        <div class="cap-nhat">
            <button type="button" onclick="updateAllInfo()" class="update-button">Cập nhật thông tin</button>
        </div>
    </div>

    <script>
        // Định nghĩa updateAllInfo ở phạm vi toàn cục
        function updateAllInfo() {
            const allInputs = document.querySelectorAll('.edit-input');
            
            allInputs.forEach(input => {
                const container = input.closest('.value-container');
                const textElement = container.querySelector('.text-value');
                const field = input.dataset.field;
                const value = input.value.trim();

                // Cập nhật UI ngay lập tức
                textElement.textContent = value;
                // Reset style về mặc định
                textElement.style.cssText = 'display: inline-block; font-size: 16px;'; // Thêm font-size cố định
                input.style.display = 'none';
                
                fetch('index.php?act=updateUserAccount', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `field=${encodeURIComponent(field)}&value=${encodeURIComponent(value)}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showNotification('Cập nhật thành công!', 'success');
                    } else {
                        showNotification('Có lỗi xảy ra!', 'error');
                    }
                });
            });
        }

        // Thêm hàm hiển thị thông báo
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.textContent = message;
            document.body.appendChild(notification);

            // Tự động ẩn sau 3 giây
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Xử lý sự kiện click cho các icon edit
            const editIcons = document.querySelectorAll('.edit-icon');
            editIcons.forEach(icon => {
                icon.addEventListener('click', function() {
                    const container = this.closest('.value-container');
                    const textElement = container.querySelector('.text-value');
                    const inputElement = container.querySelector('.edit-input');

                    textElement.style.display = 'none';
                    inputElement.style.display = 'block';
                    inputElement.value = textElement.textContent.trim();
                    inputElement.focus();
                });
            });

            // Xử lý sự kiện cho tất cả các input
            document.querySelectorAll('.edit-input').forEach(input => {
                // Xử lý sự kiện Enter
                input.addEventListener('keyup', function(e) {
                    if (e.key === 'Enter') {
                        updateValue(this);
                    }
                });

                // Xử lý sự kiện blur (click ra ngoài)
                input.addEventListener('blur', function() {
                    updateValue(this);
                });
            });

            // Hàm cập nhật giá trị
            function updateValue(input) {
                const container = input.closest('.value-container');
                const textElement = container.querySelector('.text-value');
                const field = input.dataset.field;
                const value = input.value.trim();

                fetch('index.php?act=updateUserAccount', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `field=${encodeURIComponent(field)}&value=${encodeURIComponent(value)}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Cập nhật giá trị và style
                        textElement.textContent = value;
                        // Bỏ tất cả style inline
                        textElement.removeAttribute('style');
                        // Hiển thị text và ẩn input
                        textElement.style.display = 'inline-block';
                        input.style.display = 'none';
                    }
                });
            }

            // Hàm validate email
            function isValidEmail(email) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }

            // Hàm validate số điện thoại
            function isValidPhone(phone) {
                return /^[0-9]{10,11}$/.test(phone);
            }
        });
    </script>
</body>

</html>