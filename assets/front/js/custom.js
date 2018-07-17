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


    $("#pr").click(function() {
        $("#do").fadeToggle();
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

    $("#fav-button").on('click', function() {
          var span = $('#fav-button').find('span').attr('class');
          var status = "";
          var heart = "";
          if (span == 'fa fa-heart') {
            var current = 'ازالة من المفضله';
            var status = 'اضافة الى المفضله';
            var heart = "fa fa-heart-o";
          }
          else if (span == 'fa fa-heart-o'){
            var current = 'اضافة الى المفضله';
            var status = 'ازالة من المفضله';
            var heart = "fa fa-heart";
          }
          $.ajax({
          method: 'POST',
          url: favUrl,
          data: {_token: token},
          beforeSend: function() {
            $('#fav-button').html(loadingIcon + ' ' + current);
          }
          })
          .done(function() {
            $('#fav-button').html('<span class="' + heart +'"></span> ' + status);
          });

    });

    $(".product-fav-button").on('click', function() {
        var span = $('.product-fav-button').find('span').attr('class');
        var heart = "";
        if (span == 'fa fa-heart') {
          var heart = "fa fa-heart-o";
        }
        else {
          var heart = "fa fa-heart";
        }
        $.ajax({
        method: 'POST',
        url: favUrl,
        data: {_token: token},
        beforeSend: function() {
          $('.product-fav-button').html(loadingIcon);
        }
        })
        .done(function() {
          $('.product-fav-button').html("<span class='" + heart + "'></span>");
        });
    });

    $(".fav-bell").on('click', function() {
      event.preventDefault();
      console.log(shop_id);
    });

    $("#follow-button").on('click', function() {
        event.preventDefault();
        var followed = $('#follow-text').attr('class');
        var result = "";
        var current = '';
        if (followed == "btn btn-default unfollow") {
            result = '<span class="fa fa-bullhorn"></span> متابعة الدكان';
            current = 'الغاء المتابعة';
            followed = $('#follow-text').attr('class', 'btn btn-default follow');
        }
        else {
            result = 'الغاء المتابعة';
            current = "متابعة الدكان";
            followed = $('#follow-text').attr('class', 'btn btn-default unfollow');
        }
        $.ajax({
        method: 'POST',
        url: followUrl,
        data: {_token: token},
        beforeSend: function() {
          $('#follow-text').html(loadingIcon + '' + current);
        }
        })
        .done(function() {
          $('#follow-text').html(result);
        });
    });
});
