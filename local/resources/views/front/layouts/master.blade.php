<!DOCTYPE html>
<html ng-app="app">

      <head>
            <meta charset="UTF-8">
            <meta name="_token" content="{!! csrf_token() !!}"/>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="{{URL('assets/front/images/fav-icon.png')}}" rel='icon' type="image/x-icon"/>
            <!-- ================================== include CSS files ======================================= -->
            <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/bootstrap.css')}}" />
            <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/rtl.css')}}" />
            <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/font-awesome.css')}}" />
            <link rel="stylesheet" href="{{URL('assets/front/js/layerslider/css/layerslider.css')}}">
            <link rel="stylesheet" href="{{URL('assets/front/css/owl.carousel.css')}}">
            <script src="{{URL('assets/front/js/angular.min.js')}}"></script>
            <script src="{{URL('assets/front/js/angular-messages.min.js')}}"></script>
            <script src="{{URL('assets/front/js/app.js')}}"></script>

            @yield('style')
            <!-- ================================== include CSS files ======================================= -->
            <title>@yield('title')</title>
      </head>

      <body>


            <!--========================================  Start Header ========================================-->
            @include('front.layouts._header')
            <!--========================================  End Header ========================================-->
            <div class="clear"></div>
            <!--========================================  Start Content ========================================-->
            <!--======= Start top-content ( sid-menu / slider)=======-->
            @include('front.layouts._sidemenu')
            <div class="clear"></div>
            <!--================== Start Features ==========================-->
            @yield('content')
            <!--========================================  Start Subscrib   ========================================-->
            <div class="clear"></div>
            @include('front.layouts._footer')
            <!-- ================================== include JS files ======================================= -->

            <script src="{{URL('assets/front/js/jquery.js')}}"></script>
            <script src="{{URL('assets/front/js/layerslider/js/greensock.js')}}"></script>
            <script src="{{URL('assets/front/js/layerslider/js/layerslider.transitions.js')}}"></script>
            <script src="{{URL('assets/front/js/layerslider/js/layerslider.kreaturamedia.jquery.js')}}"></script>
            <script src="{{URL('assets/front/js/nicescroll.js')}}"></script>
            <script src="{{URL('assets/front/js/countdown.js')}}"></script>
            <script src="{{URL('assets/front/js/bootstrap.js')}}"></script>
            <script src="{{URL('assets/front/js/owl.carousel.min.js')}}"></script>
            <script>
                 $('#progress1').hide();
                  (function ($) {
                        $('.owl-carousel').owlCarousel({
                              loop: true,
                              margin: 10,
                              nav: true,
                              navText: ['<i class="fa fa-fw fa-angle-left"></i>', '<i class="fa fa-fw fa-angle-right"></i>'],
                              rtl: true,
                              responsive: {
                                    0: {
                                          items: 1
                                    },
                                    600: {
                                          items: 3
                                    },
                                    1000: {
                                          items: 5
                                    }
                              }
                        })
                  })(jQuery);
                  $(document).ready(function () {
        $('#sub').click(function () {
            
             var email = $('#email').val();

       
        var _token = $('#_token').val();
        var data = new FormData();
         $.ajax({
            url: "{{url('share')}}" + "/" + email,
            type: 'get',
            headers: {
                'X-CSRF-Token': _token
            },
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('#progress1').show();
            },
            success: function (data3) {
               alert(data3);
                $('#progress1').hide();
            },
        });
        });
                  });
            </script>




            @yield('scripts')
            <!-- ====================================== End JS files ========================================= -->

      </body>

</html>