@extends('front/layouts/master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
    DOCAAN
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// style/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('style')
    <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/style.css')}}"/>
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// scripts/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('scripts')
    <script src="{{URL('assets/front/js/home-script.js')}}"></script>
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// slider/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('slider')



    <div class="container-fluid">


        <section class="features1">
            <div class="row">
                <div class="cat">
                    <ul>
                        @foreach($catsicon as $cat_icon)
                            <li>
                              <a href="{{url('alldocans/search/'.$cat_icon->category_id)}}"><i class="{{$cat_icon->icon_class}}"></i>
                                <span class="caption">{{$cat_icon->name}}</span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="slider">
                <div class="layerslider full_width" style="width:100%; height: 400px;">

                    <!-- - - - - - - - - - - - - - Slide 1 - - - - - - - - - - - - - - - - -->

                    <div class="ls-slide" data-ls="transition2d: 10, 27, 63, 67, 69;">

                        <img class="ls-bg" src="{{URL('assets/front/images/slide-2.png')}}" alt="">

                        <div class="ls-l layer_1" style="left: 80px; top:128px;"
                             data-ls="offsetxin: -60; durationin: 650; easingin: easeOutBack;"></div>
                        <div class="ls-l layer_2" style="left: 80px; top: 188px;"
                             data-ls="offsetxin: -60; durationin: 650; easingin: easeOutBack; delayin: 150;"></div>
                        <div class="ls-l layer_3" style="left: 80px; top: 252px;"
                             data-ls="offsetxin: -60; durationin: 650; easingin: easeOutBack; delayin: 300;"></div>

                    </div>

                    <!-- - - - - - - - - - - - - - End of slide 1 - - - - - - - - - - - - - - - - -->

                    <!-- - - - - - - - - - - - - - Slide 2 - - - - - - - - - - - - - - - - -->

                    <div class="ls-slide" data-ls="transition2d: 10, 27, 63, 67, 69;">

                        <img class="ls-bg" src="{{URL('assets/front/images/slide-1.png')}}" alt="">

                        <div class="ls-l layer_5" style="left: 50%; top:114px;"
                             data-ls="offsetxin: -60; durationin: 650; easingin: easeOutBack;">
                        </div>
                        <div class="ls-l layer_6" style="left: 50%; top: 185px;"
                             data-ls="offsetxin: -60; durationin: 650; easingin: easeOutBack; delayin: 150; ">

                        </div>

                    </div>

                    <!-- - - - - - - - - - - - - - End of slide 2 - - - - - - - - - - - - - - - - -->

                </div>
            </div>
        </div>
    </div>
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// content/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('content')
    <section class="features">
        <div class="container-fluid">


            <div class="row">
                <div class="feat">
                    <ul>
                        <li>
                            <i class="fa fa-thumbs-o-up"></i>
                            <span class="caption">عملائنا محط إهتمامنا</span>
                        </li>
                        <li>
                            <i class="fa  fa-paper-plane-o"></i>
                            <span class="caption">شعارنا الخدمة المتميزة</span>
                        </li>
                        <li class="ss">
                            <i class="fa fa-lock"></i>
                            <span class="caption">المصداقية والموثوقية</span>
                        </li>
                        <li>
                            <i class="fa fa-diamond"></i>
                            <span class="caption">الريادة فى الأعمـال</span>
                        </li>
                        <li>
                            <i class="fa  fa-ticket"></i>
                            <span class="caption">الخدمة مجانية لجميع الزائرين </span>
                        </li>

                    </ul>
                </div>
            </div>


        </div>
    </section>

    <div class="clear"></div>

    <!--================== Start Vip ==========================-->
    <div class="vip">
        <div class="container-fluid over">
            <div class="row vip-box">
                <div class="sec-tit">
                    <i class="fa fa-star" style="float:right;border-left: 1px solid #fff;"></i>
                    <p>دكاكيــن VIP</p>
                    <i class="fa fa-star" style="float: left;border-right: 1px solid #fff;"></i>
                </div>
                <div id="vip-slider" class="carousel slide" id="myCarousel" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">

                        <?php $s = 0; ?>
                        @foreach($shop::vipshop() as $sh)


                            @if($s%4==0 & $s==0)
                                <div class="item active">
                                    @endif

                                    @if($s%4==0 & $s!=0)
                                        <div class="item">
                                            @endif


                                            <div class="doca">
                                                <div class="img">
                                                    <?php $s = $s + 1; ?>
                                                    <img src="{{URL('uploads/'.$sh->logo)}}">
                                                    <div class="img-over">

                                                        <p>
                                                            @if(!empty($sh->shops_trans('ar')->name))
                                                                {{ $sh->shops_trans('ar')->name }}
                                                            @endif
                                                        </p>
                                                        <a href="{{URL('shop/'.$sh->id)}}" data-toggle="tooltip"
                                                           data-placement="top" title="مشاهدة الدكان"> <span
                                                                    class="fa fa-eye"></span> </a>
                                                        @if(auth()->check())
                                                            @if(!empty($sh->fallow(auth()->user()->id)))
                                                            @else
                                                                <a href="{{URL('addfollow/'.$sh->id)}}"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="متابعة الدكان">
                                                                    <span class="fa fa-bell-o"></span>
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                            @if($s%4==0 & $s==0)
                                        </div>
                                    @endif

                                    @if($s%4==0 & $s!=0)
                                </div>
                            @endif

                        @endforeach

                    </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#vip-slider" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#vip-slider" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="clear"></div>

    <div class="docans">
        <div class="container">
            <div class="row">
                <div class="docans-con">
                    <div class="col-xs-12">
                        <div class="panel panel-default ">
                            <div class="panel-heading">أحدث الدكاكين</div>
                            <div class="panel-body last_d">
                                <div class="owl-carousel">


                                    @foreach($latshop as $shop)
                                        @if(!empty($shop->shops_trans('ar')))
                                            <div class="doca">
                                                <div class="img">

                                                    <img src="{{URL('uploads/'.$shop->logo)}}">
                                                    <div class="img-over">
                                                        <a href="{{URL('shop/'.$shop->id)}}" data-toggle="tooltip"
                                                           data-placement="top" title=""
                                                           data-original-title="مشاهدة الدكان"> <span
                                                                    class="fa fa-eye"></span>
                                                        </a>


                                                        @if(auth()->user())
                                                            @if (auth()->user()->thisShop($shop->id))
                                                                <a href="{{URL('getaddfollow/' . $shop->id)}}"
                                                                   data-toggle="tooltip" data-placement="bottom"
                                                                   title="الغاء المتابعة">
                                                                    <span class="fa fa-bell"></span>
                                                                </a>
                                                            @else
                                                                <a href="{{URL('getaddfollow/' . $shop->id)}}"
                                                                   data-toggle="tooltip" data-placement="bottom"
                                                                   title="متابعة الدكان">
                                                                    <span class="fa fa-bell-o"></span>
                                                                </a>
                                                            @endif
                                                        @else
                                                            <a href="{{URL('login')}}" data-toggle="tooltip"
                                                               data-placement="bottom" title="متابعة الدكان">
                                                                <span class="fa fa-bell-o"></span>
                                                            </a>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="con">
                                                    <a href="{{URL('shop/' . $shop->id)}}">
                                                        <h1>
                                                            {{$shop->shops_trans('ar')->name}}
                                                        </h1>
                                                    </a>
                                                    <div class="follow">
                                                        <span class="fa fa-users"></span>
                                                        {{$shop->followers->count()}} متابع
                                                    </div>
                                                    <p>

                                                    </p>

                                                    <div class="star">
                                                        <?php
                                                        $filled_stars = $shop->rate;
                                                        $empty_stars = 5 - $shop->rate;
                                                        $i = 0;
                                                        while ($filled_stars > $i) {
                                                            echo '<span class="fa fa-star"></span>';
                                                            $i++;
                                                        }
                                                        $x = 0;
                                                        while ($empty_stars > $x) {
                                                            echo '<span class="fa fa-star-o"></span>';
                                                            $x++;
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="docans">
        <div class="container">
            <div class="row">
                <div class="docans-con">
                    <div class="col-xs-12">
                        <div class="panel panel-default ">
                            <div class="panel-heading"> احدث الاعلانات</div>
                            <div class="panel-body last_d">
                                <div class="owl-carousel">


                                    @foreach($latad as $lat)
                                        @foreach($produc::products($lat->product_id) as $product)

                                            <div class="doca">
                                                <div class="img">

                                                    <img src="{{URL('uploads/'.$product->image)}}">
                                                    <div class="img-over">
                                                        <a href="{{URL('souq/'.$product->id)}}" data-toggle="tooltip"
                                                           data-placement="top" title=""
                                                           data-original-title="مشاهدة الدكان"> <span
                                                                    class="fa fa-eye"></span>
                                                        </a>

                                                        @if (auth()->user())
                                                            @if ($product->favorite())
                                                                <a href="{{URL('getaddfav/'.$product->id)}}"
                                                                   data-toggle="tooltip" data-placement="bottom"
                                                                   title="ازاله من المفضله">
                                                                    <span class="fa fa-bell"></span>
                                                                </a>
                                                            @else
                                                                <a href="{{URL('getaddfav/'.$product->id)}}"
                                                                   data-toggle="tooltip" data-placement="bottom"
                                                                   title="اضافه الى المفضله">
                                                                    <span class="fa fa-bell"></span>
                                                                </a>
                                                            @endif
                                                        @else
                                                            <a href="{{URL('login')}}" data-toggle="tooltip"
                                                               data-placement="bottom" title="اضافه الى المفضله">
                                                                <span class="fa fa-bell"></span>
                                                            </a>
                                                        @endif


                                                    </div>
                                                </div>
                                                <div class="con">
                                                    <a href="{{URL('souq/product/'.$product->id)}}">
                                                        @if(!empty($product->product_trans('ar')))
                                                            <h1>
                                                                {{$product->product_trans('ar')->name}}
                                                            </h1>
                                                        @endif
                                                    </a>

                                                </div>
                                            </div>

                                        @endforeach
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- =====================================
                   Start Docans
         ====================================== -->

@endsection