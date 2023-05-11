$(document).ready(function () {
    $(".post_list").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: $("#post_prev_btn"),
        nextArrow: $("#post_next_btn"),
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 3000,
    });
});

$(".btn_go_to_top").on("click", () => {
    $(window).scrollTop(0);
});

