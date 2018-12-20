
$('.open').click(function () {
    $('.mask').show();
    $('.login').show();
})

$('.close').click(function () {
    $('.mask').hide();
    $('.login').hide();
})

// 返回顶部与首页
$(window).scroll(function () {
    if ( $(window).scrollTop() >= 500 ) {
        $('.fixed').show();
    } else {
        $('.fixed').hide();
    }
})

$('.returnTop').click(function () {
    $(window).scrollTop(0); 
})