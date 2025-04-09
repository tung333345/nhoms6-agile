<!DOCTYPE html>
<html>
<head>
    <title>Tìm Cửa Hàng</title>
    <meta charset="UTF-8">
    <style>
        .map-container {
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .map-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .map-responsive {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }
        .map-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }
        .store-list {
            width: 100%;
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .store-list h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
        }

        .store-item {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }

        .store-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            background-color: #f8f9fa;
        }

        .store-item h3 {
            color: #2d86ff;
            margin: 0 0 15px 0;
            font-size: 20px;
        }

        .store-item p {
            margin: 8px 0;
            color: #666;
            line-height: 1.5;
        }

        .store-item strong {
            color: #333;
        }

        @media (max-width: 768px) {
            .map-responsive {
                height: 350px;
            }
            
            .map-container, .store-list {
                padding: 0 15px;
            }
            
            .store-item {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="map-container">
        <h2>Hệ Thống Cửa Hàng FphoneS</h2>
        <div class="map-responsive">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14895.52833688018!2d105.75700428715818!3d21.03740360000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134558e2d7cf155%3A0xf91ada903d2bc3b4!2sCellphoneS!5e0!3m2!1svi!2s!4v1732985914579!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                width="600" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        </div>

    </div>
        <div class="store-list">
            <h2>Danh Sách Cửa Hàng Tại Hà Nội</h2>
            
            <div class="store-item">
                <h3>FphoneS Cầu Giấy</h3>
                <p><strong>Địa chỉ:</strong> 95 Cầu Giấy, P.Quan Hoa, Q.Cầu Giấy, Hà Nội</p>
                <p><strong>SĐT:</strong> (024) 7108 9999</p>
                <p><strong>Giờ mở cửa:</strong> 8:30 - 21:30</p>
            </div>

            <div class="store-item">
                <h3>FphoneS Thái Hà</h3>
                <p><strong>Địa chỉ:</strong> 347 Thái Hà, Q.Đống Đa, Hà Nội</p>
                <p><strong>SĐT:</strong> (024) 7109 9999</p>
                <p><strong>Giờ mở cửa:</strong> 8:30 - 21:30</p>
            </div>

            <div class="store-item">
                <h3>FphoneS Times City</h3>
                <p><strong>Địa chỉ:</strong> TTTM Vincom Mega Mall Times City, 458 Minh Khai, Hai Bà Trưng, Hà Nội</p>
                <p><strong>SĐT:</strong> (024) 7107 9999</p>
                <p><strong>Giờ mở cửa:</strong> 9:00 - 22:00</p>
            </div>

            <div class="store-item">
                <h3>FphoneS Hoàn Kiếm</h3>
                <p><strong>Địa chỉ:</strong> 95 Hàng Bạc, P.Hàng Bạc, Q.Hoàn Kiếm, Hà Nội</p>
                <p><strong>SĐT:</strong> (024) 7106 9999</p>
                <p><strong>Giờ mở cửa:</strong> 8:30 - 21:30</p>
            </div>

            <div class="store-item">
                <h3>FphoneS Long Biên</h3>
                <p><strong>Địa chỉ:</strong> 143 Nguyễn Văn Cừ, P.Ngọc Lâm, Q.Long Biên, Hà Nội</p>
                <p><strong>SĐT:</strong> (024) 7105 9999</p>
                <p><strong>Giờ mở cửa:</strong> 8:30 - 21:30</p>
            </div>
        </div>
</body>
</html>