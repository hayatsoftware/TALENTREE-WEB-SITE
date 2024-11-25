$(document).ready(function() {
    features();
    gallery();

    if ($('.imgAndVideo').length > 0) {
        $('.imgAndVideo').each(function(){
            $(this).parent().parent().parent().parent().addClass('mbVarMini');
        });
    }
    if ($('.counters').length > 0) {
        $('.counters').counterUp({
            delay: 10,
            time: 2000
        });
    }
});

function features() {
    if ($('.internshipVideo').length > 0) {
        var swiper = new Swiper(".internshipVideo .listing", {
            slidesPerView: 2,
            spaceBetween: 20,
            centeredSlides: false,
            lazy: true,
            speed:600,
            grabCursor: true,
            slideToClickedSlide: true,
            navigation: {
                nextEl: "#whatAwaitArrow .right",
                prevEl: "#whatAwaitArrow .left",
            },
            breakpoints: {
                300: {
                    slidesPerView: 1.02,
                    spaceBetween: 20,
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
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                2000: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                }
            }
        });
    }
}

function gallery() {
    if ($('.galleryBoxListing').length > 0) {
        var swiper = new Swiper(".galleryBoxListing .listing", {
            slidesPerView: 3,
            spaceBetween: 20,
            centeredSlides: false,
            lazy: true,
            speed:600,
            grabCursor: true,
            slideToClickedSlide: true,
            navigation: {
                nextEl: "#galleryArrow .right",
                prevEl: "#galleryArrow .left",
            },
            breakpoints: {
                300: {
                    slidesPerView:2,
                    spaceBetween: 20,
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
