// JavaScript Document


$(function () {
    /* 导航下拉菜单 */
    $("#nav .menu").each(function () {
        $(this).hover(
            function () {
                    $(this).children("a").removeClass("menuselect").addClass("menuselected").parent().find(".menu-on").show();
                
             },
            function () {
                if ($(this).children("a").hasClass("menuselected")) {
                    $(this).children("a").removeClass("menuselected").addClass("menuselect");
                } 
                $(".menu-on").hide();
            }
        );
    });
    /* 左侧藏品推荐 */
    $("#hot li").each(function () {
        $(this).mouseover(function () {
            $("#hot div").hide();
            $(this).find("div").show();
        });
    });

    /* 分页项当前页数字颜色 */
    $("#pageList span").css('color', '#fd8602');

    /* 藏品百科详细页图片切换 
    $("#baike-flash,.sale-flash,#myFocus-about").slides({
        play: 3000,
        pause: 2000,
        hoverPause: true,
        generatePagination: false
    });*/


});

