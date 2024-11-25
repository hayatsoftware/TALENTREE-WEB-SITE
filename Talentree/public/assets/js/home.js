var $gallery = $('.homeSlider .listing');
var slideCount = null;
$( document ).ready(function() {
    $gallery.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 6000,
        lazyLoad: 'ondemand',
        fade:true,
        autoplay:false,
        infinite:false,
        arrows: false,
        dots:true,
        pauseOnHover:false
    });
});

$(document).ready(function() {
    features();
    people();
    $('.mcPopupClose').click(function (){
        setTimeout(function (){
            $('.mcPopup').modal('hide');
        },100);
    });
});

function features() {
    var swiper = new Swiper(".homeWhatAwaits .listing", {
        slidesPerView: 3.9,
        spaceBetween: 30,
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
                slidesPerView: 1.6,
                spaceBetween: 20,
            },
            767: {
                slidesPerView: 3.3,
                spaceBetween: 30,
            },
            1300: {
                slidesPerView: 4.2,
                spaceBetween: 30,
            },
            1700: {
                slidesPerView: 3.9,
                spaceBetween: 30,
            },
            2000: {
                slidesPerView: 3.3,
                spaceBetween: 30,
            }
        }
    });
}

function people() {
    var swiper = new Swiper(".homeCommentBox .listing", {
        slidesPerView:1,
        spaceBetween: 0,
        centeredSlides: false,
        autoHeight: true,
        lazy: true,
        speed:600,
        grabCursor: true,
        slideToClickedSlide: true,
        navigation: {
            nextEl: ".homeCommentBox .right",
            prevEl: ".homeCommentBox .left",
        }
    });
}

$(window).on('load',function () {
    $('.main').css('opacity','1')
})


$.fn.moveIt = function(){
    var $window = $(window);
    var instances = [];

    $(this).each(function(){
        instances.push(new moveItItem($(this)));
    });

    window.addEventListener('scroll', function(){
        var scrollTop = $window.scrollTop();
        instances.forEach(function(inst){
            inst.update(scrollTop);
        });
    }, {passive: true});
}

var moveItItem = function(el){
    this.el = $(el);
    this.speed = parseInt(this.el.attr('data-scroll-speed'));
};

moveItItem.prototype.update = function(scrollTop){
    this.el.css('transform', 'translateY(' + -(scrollTop / this.speed) + 'px)');
};

// Initialization
$(function(){
    $('[data-scroll-speed]').moveIt();
});
$(window).scroll(function () {

    if ($('.homeAwards ').length > 0) {
        $('.homeAwards ').each(function(){
            if (($(window).scrollTop() ) > $(this).offset()['top'] - 750) {
                $(this).find('.listing').addClass('effect');
            }else{
                $(this).find('.listing').removeClass('effect');
            }
        });
    }

    if ($('.homeVideoMessage  ').length > 0) {
        $('.homeVideoMessage  ').each(function(){
            if (($(window).scrollTop() ) > $(this).offset()['top'] - 800) {
                $(this).find('picture').addClass('effectLeft');
                $(this).find('.title').addClass('effectRight');
            }else{
                $(this).find('picture').removeClass('effectLeft');
                $(this).find('.title').removeClass('effectRight');
            }
        });
    }

    if ($('.homeWhatAwaits').length > 0) {
        $('.homeWhatAwaits').each(function(){
            if (($(window).scrollTop() ) > $(this).offset()['top'] - 700) {
                $(this).find('.titleBar').addClass('effect');
                $(this).find('.listing').addClass('effect');
            }else{
                $(this).find('.titleBar').removeClass('effect');
                $(this).find('.listing').removeClass('effect');
            }
        });
    }

    if ($('.homeBannerBig').length > 0) {
        $('.homeBannerBig').each(function(){
            if (($(window).scrollTop() ) > $(this).offset()['top'] - 750) {
                $(this).find('.all').addClass('effect');
            }else{
                $(this).find('.all').removeClass('effect');
            }
        });
    }

    if ($('.homeBoxesList').length > 0) {
        $('.homeBoxesList').each(function(){
            if (($(window).scrollTop() ) > $(this).offset()['top'] - 750) {
                $(this).find('.cols').addClass('effect');
            }else{
                $(this).find('.cols').removeClass('effect');
            }
        });
    }

    if ($('.homeCommentBox').length > 0) {
        $('.homeCommentBox').each(function(){
            if (($(window).scrollTop() ) > $(this).offset()['top'] - 600) {
                $(this).find('.container-fluid').addClass('effect');
            }else{
                $(this).find('.container-fluid').removeClass('effect');
            }
        });
    }

    if ($('.homeDiscoverBox ').length > 0) {
        $('.homeDiscoverBox ').each(function(){
            if (($(window).scrollTop() ) > $(this).offset()['top'] - 600) {
                $(this).find('.container-fluid').addClass('effect');
            }else{
                $(this).find('.container-fluid').removeClass('effect');
            }
        });
    }
});
