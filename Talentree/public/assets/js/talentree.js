$(".lazy").lazy();

/*modalJs*/
$('.modalbg,.buttonCloses,.modalClose').click(function () {
    var widths = $(window).width();
    $(this).parents('.modalType ').removeClass('active');
    if (widths < 767) {
        $("body").css('overflow','auto');
    }
});
/*modalJs*/

$('.lang span').click(function (){
    $('.lang').toggleClass('active');
    //$('.lang ul').stop().slideToggle(250);
});

$('*').click(function(e){
    if ( !$(e.target).is('.lang') && !$(e.target).is('.lang *') ){
        $('.lang').removeClass('active');
    }
    if ( !$(e.target).is('.footer .miniMenu ul li span') && !$(e.target).is('.footer .miniMenu ul li span *') ){
        $('.footer .miniMenu .subFooterMenu ').removeClass('open');
    }
});


$(".header .menu").on("mouseleave", function () {
    $('.header .menu > ul > li').removeClass("hover");
});
$(".header .menu ul > li").on("mouseleave", function () {
    clearTimeout(e), e = null
});
$(".header .menu > ul > li").on("mouseenter ", function () {
    var a = $(this).stop();
    e = setTimeout(function () {
        $('.header .menu > ul > li').removeClass("hover"), a.addClass("hover");
    }, 350)
});


/*MOBILE CLICK*/
$(".menu ul > li > span").click(function (){
    $('.menu ul > li').removeClass('open');
    $(this).parent().toggleClass('open');
});

$('.submenu li.prev i').click(function (){
    setTimeout(function (){
        $('.menu ul > li').removeClass("open");
    },10);
});

$('.mobileLang span').click(function (){
    $(this).parent().find('ul').toggleClass('open');
});

$('.mobileLang ul li.close').click(function (){
    $('.mobileLang ul').removeClass('open');
});

$('.menuButton').click(function (){
    $(this).toggleClass('open');
    $('.header .menu').toggleClass('open');
    $('.menu ul li').removeClass('open');
    $('.mobileLang ul').removeClass('open');
});

/*MOBILE CLICK*/

$('.footer .miniMenu ul li > span').click(function (){
    $('.subFooterMenu').stop().toggleClass('open');
});

$(window).on('load',function () {
    $('.submenu').css('display','inline-block');
    $('.svgBox').addClass('active');
    $('.modalType').css('display','flex');
})

$(window).scroll(function() {
    scroll = $(window).scrollTop();
    var sticky = $('.header');
    if((scroll) >= 20){
        sticky.addClass('fixed');
    }
    else{
        sticky.removeClass('fixed');
    }
});

$('.mcPopupClose').click(function (){
    setTimeout(function (){
        $('.mcPopup').modal('hide');
    },100);
});
