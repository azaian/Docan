$(function() {

    var action;
    $(".number-spinner button").mousedown(function() {
        btn = $(this);
        input = btn.closest('.number-spinner').find('input');
        btn.closest('.number-spinner').find('button').prop("disabled", false);

        if (btn.attr('data-dir') == 'up') {
            action = setInterval(function() {
                if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
                    input.val(parseInt(input.val()) + 1);
                } else {
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
        } else {
            action = setInterval(function() {
                if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
                    input.val(parseInt(input.val()) - 1);
                } else {
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
        }
    }).mouseup(function() {
        clearInterval(action);
    });

    $('.layerslider').layerSlider({
        responsive: false,
        responsiveUnder: 1140,
        layersContainer: 1140,
        skinsPath: 'js/layerslider/skins/',
        hoverPrevNext: false,
        navButtons: false,
        navStartStop: false,
        showCircleTimer: false
    });
    $('[data-toggle="tooltip"]').tooltip();

    $(".add-docan").click(function() {
        $("#build-docan").show();
    });
    $("#closeee").click(function() {
        $("#build-docan").hide();
    });
    $(".build").click(function() {
        $("#build-docan").show();
    });
    $("#closeee").click(function() {
        $("#build-docan").hide();
    });

    $(".shop-icon .cart").hover(function() {
        $(".cart-content").css({
            "transform": "translateY(-50px)",
            "transition": ".5s all ease-in-out",
            "z-index": "9999999",
            "opacity": "1"
        });
    });
    $(".shop-icon").mouseleave(function() {
        $(".cart-content").css({
            "transform": "translateY(50px)",
            "transition": ".5s all ease-in-out",
            "z-index": "0",
            "opacity": "0"
        });
    });
});