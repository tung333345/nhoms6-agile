// Lấy thời gian kết thúc từ PHP
var endTime = new Date("<?php echo $getEndTime; ?>").getTime();
    // Cập nhật bộ đếm ngược mỗi giây
    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = endTime - now;

        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML = hours + " giờ : " + minutes + " phút : " + seconds +
            " giây ";

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);

    document.addEventListener('DOMContentLoaded', function() {
        const parentLinks = document.querySelectorAll('.mega-menu > ul > li > a');
        parentLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const parentLi = this.parentElement;
                parentLi.classList.toggle('active');
            });
        });
    });

    var slideIndex = 1;
    var autoSlideInterval;

    function plusSlides(n) {
        clearInterval(autoSlideInterval);
        showSlides(slideIndex += n);
        autoSlide();
    }

    function currentSlide(n) {
        clearInterval(autoSlideInterval);
        showSlides(slideIndex = n);
        autoSlide();
    }
    function showSlides(n) {
        var i;
        const slides = document.getElementsByClassName("slides")[0].getElementsByClassName("slide");
        const dots = document.getElementsByClassName("dot");
        const slidePosition = document.querySelector(".slide-position");

        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length;
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex -
            1].style.display = "flex";
        dots[slideIndex - 1].className += " active";
        slidePosition.textContent = slideIndex +
            " / " + slides.length;
    }

    function autoSlide() {
        autoSlideInterval = setInterval(function() {
                plusSlides(1);
            },
            3000);
    }
    var slideContents = document.getElementsByClassName("slide-content");
    for (var i = 0; i <
        slideContents.length; i++) {
        slideContents[i].addEventListener("click", function() {
            var
                index = Array.prototype.indexOf.call(this.parentNode.children, this);
            currentSlide(index + 1);
        });
    }
    window.onload = function() {
        showSlides(slideIndex);
        autoSlide();
    };

// var slideIndex = 1;
// var autoSlideInterval;

// window.onload = function() {
//     showSlides(slideIndex);
//     autoSlide();
// };

// function plusSlides(n) {
//     clearInterval(autoSlideInterval);
//     showSlides(slideIndex += n);
//     autoSlide();
// }

// function currentSlide(n) {
//     clearInterval(autoSlideInterval);
//     showSlides(slideIndex = n);
//     autoSlide();
// }

// function showSlides(n) {
//     var i;
//     const slides = document.getElementsByClassName("slides")[0].getElementsByClassName("slide");
//     const dots = document.getElementsByClassName("dot");
//     const slidePosition = document.querySelector(".slide-position");

//     if (n > slides.length) {
//         slideIndex = 1;
//     }
//     if (n < 1) {
//         slideIndex = slides.length;
//     }
//     for (i = 0; i < slides.length; i++) {
//         slides[i].style.display = "none";
//     }
//     for (i = 0; i < dots.length; i++) {
//         dots[i].className = dots[i].className.replace(" active", "");
//     }
//     slides[slideIndex -
//         1].style.display = "flex";
//     dots[slideIndex - 1].className += " active";
//     slidePosition.textContent = slideIndex +
//         " / " + slides.length;
// }

// function autoSlide() {
//     autoSlideInterval = setInterval(function() {
//             plusSlides(1);
//         },
//         3000);
// }
// var slideContents = document.getElementsByClassName("slide-content");
// for (var i = 0; i <
//     slideContents.length; i++) {
//     slideContents[i].addEventListener("click", function() {
//         var
//             index = Array.prototype.indexOf.call(this.parentNode.children, this);
//         currentSlide(index + 1);
//     });
// }