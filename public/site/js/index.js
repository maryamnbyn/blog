/*----carousel----*/
/*----modals------*/
/*----menu--------*/
/*----basket------*/



$(document).ready(function() {
    /*----carousel----*/
    $('.carousel').carousel('pause');

    /*----modals------*/
    //login modal
    $('.login').click(function () {
       $("#login_modal2").modal('show');
        $("#signup_modal2").modal('hide');
    });
    //sign up modal
    $('.new-account').click(function () {
        $("#login_modal2").modal('hide');
       $("#signup_modal2").modal('show');
    });
    //login $ sign up form
    $("#login_modal").on("show.bs.modal",function () {
        $( ".log-input" ).each(function() {

            if($(this).val()===""){

                $(this).prev().addClass("log-label");
                $(this).prev().removeClass("log-label-move");
            }else {
                $(this).prev().removeClass("log-label");
                $(this).prev().addClass("log-label-move");
            }

        });
    });
    $('.log-input').focusin(function () {
        $(this).prev().removeClass("log-label");
        $(this).prev().addClass("log-label-move");
    });
    $('.log-input').focusout(function () {
        if($(this).val()==="") {
            $(this).prev().addClass("log-label");
            $(this).prev().removeClass("log-label-move");
        }
    });
    /*----menu--------*/
    // breakpoint and up
    $(window).resize(function(){
        if ($(window).width() >= 980){

            // when you hover a toggle show its dropdown menu
            $(".navbar .dropdown-toggle").hover(function () {
                $(this).parent().toggleClass("show");
                $(this).parent().find(".dropdown-menu").toggleClass("show");
            });

            // hide the menu when the mouse leaves the dropdown
            $( ".navbar .dropdown-menu" ).mouseleave(function() {
                $(this).removeClass("show");
            });

            // do something here
        }
    });

    /*----basket------*/
    // $(".basket").click(function () {
    //     $(".prev-basket").fadeIn();
    // });
    $(document).on("click",function (e) {
        var menu= $(".prev-basket");

        if($('.basket ,.basket-count , .fa-shopping-basket').is(e.target))
        {
            $(".prev-basket").fadeToggle();
        }
        else{
            menu.fadeOut();
        }
    });

// document ready
});