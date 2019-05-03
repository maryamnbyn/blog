$(document).ready(function () {

    $(".dropdown").hover(function () {
        $('>div', this).fadeIn(400);
        $(".content").css('background')

    }, function () {
        // $(".menu-level-1 li").hover(function () {
        $('>div', this).hide();

    });


});