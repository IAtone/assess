
$('.flag').click(function (e) {
    e.preventDefault();
    $('.flag').toggleClass('active');
});

var lock = true;
$('.arrow').click(function (e) {
    e.preventDefault();
    if (lock) {
        $('header section').addClass('lock');
        lock = false;
        $(this).children('span').html('更多');
    } else {
        $('header section').removeClass('lock');
        $(this).children('span').html('收起');
        lock = true;
    }
});

// 轮播图

var mySwiper = new Swiper('.swiper-container', {
    autoplay: true,//可选选项，自动滑动
    loop: true,
    delay: 3000,
    pagination: {
        el: '.swiper-pagination',
        type: 'fraction'
    }
})

