$(function() {
    // $(".login").on("mouseenter",function(){
    //     $(".login-box").show().mouseleave(function(){
    //         $(this).hide()
    //     })
    // })   

    // $('.login').hover(function () {
    //     $('.login-box').show();
    // }, function () {
    //     $('.login-box').hide();
    // })

    //点击小箭头朝上

    $(".dianji").on("click", function() {
        // console.log($(this).find('.layui-nav-more'))
        $(this).find('.layui-nav-more').toggleClass("active")
    })


    //侧边伸缩的jq
    $(".shen").on("click", function(e) {
        e.stopPropagation()
        $('.container').animate({
            'padding-left': '60px'
        })
        $('.top').animate({
            'padding-left': '60px'
        })
        $(".nav-left").css({
            "display": "block"
        })
        $(".nav-left1").css({
            "display": "none"
        })

        $(".nav-top-left-li1>a").toggleClass("yin")

    })
    $(".nav-top-left-li1>.suo")
        .click(function(e) {
            e.stopPropagation();
            $('.container').animate({
                'padding-left': '220px'
            })
            $('.top').animate({
                'padding-left': '220px'
            })
            $(".nav-left").css({
                "display": "none"
            })
            $(".nav-left1").css({
                "display": "block"
            })
            $(".nav-top-left-li1>a").toggleClass("yin")
            // $(".suo i").addClass("layui-icon layui-icon-spread-right")
        })

    //长条jquery 
    $(".dianji").mouseenter(function() {
        $(".changtiao").css({
            top: $(this).offset().top - $(window).scrollTop(),
            transform: "scale(1,1)"
        })
        // console.log($('nav'))
    })


}) //   入口函数括号