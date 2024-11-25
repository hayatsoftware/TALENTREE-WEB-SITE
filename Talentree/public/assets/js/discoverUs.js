$(document).ready(function() {
    aboutgallery();
});
function aboutgallery() {
    if ($('.aboutSliderPage').length > 0) {
        var swiper = new Swiper(".aboutSliderPage .listing", {
            slidesPerView: 3,
            spaceBetween: 20,
            centeredSlides: false,
            lazy: true,
            speed:600,
            autoplay:true,
            grabCursor: true,
            slideToClickedSlide: true,
            navigation: {
                nextEl: "#aboutGalleryArrow .right",
                prevEl: "#aboutGalleryArrow .left",
            },
            breakpoints: {
                300: {
                    slidesPerView:1.2,
                    spaceBetween: 10,
                },
                767: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1300: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1700: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                2000: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                }
            }
        });
    }
}

$(window).on('load',function () {
    $('.aboutSliderPage .listing').css('opacity','1');
})