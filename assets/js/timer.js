
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            var countdown = setInterval(function () {
                minutes = parseInt(timer / 60, 10); 
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes; 
                seconds = seconds < 10 ? "0" + seconds : seconds; 

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(countdown);
                    alert("Hết thời gian thanh toán!");
                    window.location.href = 'index.php?act=viewCart';
                }
            }, 1000);
        }

        window.onload = function () {
            var fiveMinutes = 60 * 5,
                display = document.querySelector('#countdown');
            startTimer(fiveMinutes, display);
        };

        function confirmPayment() {
            Swal.fire({
                title: 'Xác nhận thanh toán',
                text: 'Bạn đã hoàn tất thanh toán?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Đã thanh toán',
                cancelButtonText: 'Chưa thanh toán'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Thanh toán thành công!',
                        text: 'Cảm ơn bạn đã mua hàng. Đơn hàng của bạn đang được xử lý.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        window.location.href = 'index.php';
                    });
                }
            });
        }