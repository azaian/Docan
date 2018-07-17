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
<link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/style.css')}}" />
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
  <div class="slider">
                    <div class="layerslider full_width" style="width:100%; height: 400px;">

                        <!-- - - - - - - - - - - - - - Slide 1 - - - - - - - - - - - - - - - - -->

                        <div class="ls-slide" data-ls="transition2d: 10, 27, 63, 67, 69;">

                            <img class="ls-bg" src="{{URL('assets/front/images/slide-2.png')}}" alt="">

                            <div class="ls-l layer_1" style="left: 80px; top:128px;" data-ls="offsetxin: -60; durationin: 650; easingin: easeOutBack;"></div>
                            <div class="ls-l layer_2" style="left: 80px; top: 188px;" data-ls="offsetxin: -60; durationin: 650; easingin: easeOutBack; delayin: 150;"></div>
                            <div class="ls-l layer_3" style="left: 80px; top: 252px;" data-ls="offsetxin: -60; durationin: 650; easingin: easeOutBack; delayin: 300;"></div>

                        </div>

                        <!-- - - - - - - - - - - - - - End of slide 1 - - - - - - - - - - - - - - - - -->

                        <!-- - - - - - - - - - - - - - Slide 2 - - - - - - - - - - - - - - - - -->

                        <div class="ls-slide" data-ls="transition2d: 10, 27, 63, 67, 69;">

                            <img class="ls-bg" src="{{URL('assets/front/images/slide-1.png')}}" alt="">

                            <div class="ls-l layer_5" style="left: 50%; top:114px;" data-ls="offsetxin: -60; durationin: 650; easingin: easeOutBack;">
                            </div>
                            <div class="ls-l layer_6" style="left: 50%; top: 185px;" data-ls="offsetxin: -60; durationin: 650; easingin: easeOutBack; delayin: 150; ">

                            </div>

                        </div>

                        <!-- - - - - - - - - - - - - - End of slide 2 - - - - - - - - - - - - - - - - -->

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
            <div class="row">
                <div class="sec-tit">
                    <i class="fa fa-star" style="float:right;border-left: 1px solid #fff;"></i>
                    <p>دكاكيــن VIP</p>
                    <i class="fa fa-star" style="float: left;border-right: 1px solid #fff;"></i>
                </div>
                <div id="vip-slider" class="carousel slide" id="myCarousel" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        
                                  <?php $s=0; ?>
                        <div class="item active">
                              
                            @foreach($shop::vipshop() as $sh)
                             @if($s<4)
                            <div class="doca">
                                <div class="img">
                                    <?php $s=$s+1; ?>
                                    <img src="{{URL('uploads/'.$sh->logo)}}">
                                    <div class="img-over">
                                        @foreach($sh->category as $ca)
                              <p>@if(!empty($ca->cat_trans('ar')))
                               {{$cat1->cat_trans('ar')->name}}
                               @endif</p>
                              @endforeach
                                         <a href="{{URL('shop/'.$sh->id)}}" data-toggle="tooltip" data-placement="top" title="مشاهدة الدكان"> <span class="fa fa-eye"></span> </a>
                                            @if(auth()->check())
                                             @if(!empty($sh->favorite(auth()->user()->id) ))
                                         
                                            
                                        
                                             @else
                                              <a href="{{URL('fav/'.$sh->id)}}" data-toggle="tooltip" data-placement="top" title="إضافة إلى المفضلة">
                                            <span class="fa fa-heart"></span>
                                        </a>
                                             @endif
                                        @if(!empty($sh->fallow(auth()->user()->id)))
                                           @else  
                                        <a href="{{URL('follow/'.$sh->id)}}" data-toggle="tooltip" data-placement="top" title="متابعة الدكان">
                                            <span class="fa fa-bell-o"></span>
                                        </a>
                                        @endif
                                            @endif
                                    </div>
                                </div>
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
    <div class="clear"></div>
    <!--===================================== Start Docans(موضه وازياء) ============================== -->


    <div class="docans" id="moda">
        <div class="container-fluid">
            
            <div class="row">
                <div class="docans-con">
                    <div class="sec-tit">
                        <span class="fa fa-female"></span> موضـة و أزياء
                    </div>
                    <div id="mod" class="carousel slide" data-ride="carousel">
                        <div class="ads">
                            <img src="{{URL('assets/front/images/ads-4.jpg')}}">

                        </div>
                        <!-- Wrapper for slides -->
                        
                                  <?php $s=0; ?>
                                
                              
                                         @if(!$cat1->subcat->isEmpty())
                                      
                                         @if($s<4)
                                         <div class="carousel-inner" role="listbox">
                            <div class="item active"> 
                                         @foreach ($cat1->subcat as $sub1)
                                         @foreach ($sub1->subcat as $sub2)
                                         @foreach ($sub2->shop()->get() as $sho)
                                
                               @if(!empty($sho->shops_trans('ar')))

                                <div class="doca">
                                    <div class="img">
                                        <?php $s=$s+1; ?>
                                        <img src="{{URL('uploads/'.$sho->logo)}}">
                                        <div class="img-over">
                                            <a href="{{URL('shop/'.$sho->id)}}" data-toggle="tooltip" data-placement="top" title="مشاهدة الدكان"> <span class="fa fa-eye"></span> </a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="إضافة إلى المفضلة">
                                                <span class="fa fa-heart"></span>
                                            </a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="متابعة الدكان">
                                                <span class="fa fa-bell-o"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="con">
                                        <a href="{{URL('shop/'.$sho->id)}}"><h1> {{$sho->shops_trans('ar')->name}}</h1></a>
                                        <div class="follow">
                                            <span class="fa fa-users"></span> {{$sho->views}} متابع
                                        </div>
                                        <p>@if(!empty($cat1->cat_trans('ar')))
                                              {{$cat1->cat_trans('ar')->name}}
                                           @endif</p>

                                        <div class="star">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star-o"></span>
                                        </div>
                                    </div>
                                </div>
  @endif
  
                                         @endforeach
                                         @endforeach
                                         @endforeach  
                            </div>
                                             
                                         @endif
                                         @endif
                             
                          
                          
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#mod" role="button" data-slide="prev">
                            <span class="fa fa-angle-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#mod" role="button" data-slide="next">
                            <span class="fa fa-angle-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    <!--================================= Start Docans(إلكترونيات) ==========================-->
    <div class="docans" id="elect">
        <div class="container-fluid">
            <div class="row">
                <div class="docans-con">
                    <div class="sec-tit">
                        <span class="fa fa-desktop"></span> الكترونيات
                    </div>
                    <div id="ele" class="carousel slide" data-ride="carousel">
                        <div class="ads">
                            <img src="{{URL('assets/front/images/ads-3.jpg')}}">

                        </div>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php $s=0; ?>
                           @if(!$cat2->subcat->isEmpty())
                                       
                                         @if($s<4)
                                         
                            <div class="item active"> 
                                         @foreach ($cat2->subcat as $sub1)
                                         @foreach($sub1->subcat as $sub2)
                                         @foreach($sub2->shop()->get() as $sho)
  @if(!empty($sho->shops_trans('ar')))
  <?php $sho->shops_trans('ar');?>
                                <div class="doca">
                                    <div class="img">
                                        <?php $s=$s+1; ?>
                                        <img src="{{URL('uploads/'.$sho->logo)}}">
                                        <div class="img-over">
                                            <a href="{{URL('shop/'.$sho->id)}}" data-toggle="tooltip" data-placement="top" title="مشاهدة الدكان"> <span class="fa fa-eye"></span> </a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="إضافة إلى المفضلة">
                                                <span class="fa fa-heart"></span>
                                            </a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="متابعة الدكان">
                                                <span class="fa fa-bell-o"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="con">
                                        <a href="{{URL('shop/'.$sho->id)}}"><h1> {{$sho->shops_trans('ar')->name}}</h1></a>
                                        <div class="follow">
                                            <span class="fa fa-users"></span> {{$sho->views}} متابع
                                        </div>
                                        <p>@if(!empty($cat1->cat_trans('ar')))
        {{$cat1->cat_trans('ar')->name}}
    @endif</p>

                                        <div class="star">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star-o"></span>
                                        </div>
                                    </div>
                                </div>
  @endif
  
                                         @endforeach
                                         @endforeach
                                         @endforeach  
                            </div>
                                             
                                         @endif
                                         @endif
                             
                            
                            
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#ele" role="button" data-slide="prev">
                            <span class="fa fa-angle-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#ele" role="button" data-slide="next">
                            <span class="fa fa-angle-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===================================== Start Docans(أثاث المنزل) ======================-->
    <div class="docans" id="furn">
        <div class="container-fluid">
            <div class="row">
                <div class="docans-con">
                    <div class="sec-tit">
                        <span class="fa fa-home"></span> أثاث المنزل
                    </div>
                    <div id="docans-slider" class="carousel slide" data-ride="carousel">
                        <div class="ads">
                            <img src="{{URL('assets/front/images/ads.jpg')}}">

                        </div>
                        <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">
                            <?php $s=0; ?>
                           @if(!$cat4->subcat->isEmpty())
                                       
                                         @if($s<4)
                                         
                            <div class="item active"> 
                                         @foreach ($cat4->subcat as $sub1)
                                         @foreach($sub1->subcat as $sub2)
                                         @foreach($sub2->shop()->get() as $sho)
  @if(!empty($sho->shops_trans('ar')))
  <?php $sho->shops_trans('ar');?>
                                <div class="doca">
                                    <div class="img">
                                        <?php $s=$s+1; ?>
                                        <img src="{{URL('uploads/'.$sho->logo)}}">
                                        <div class="img-over">
                                            <a href="{{URL('shop/'.$sho->id)}}" data-toggle="tooltip" data-placement="top" title="مشاهدة الدكان"> <span class="fa fa-eye"></span> </a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="إضافة إلى المفضلة">
                                                <span class="fa fa-heart"></span>
                                            </a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="متابعة الدكان">
                                                <span class="fa fa-bell-o"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="con">
                                        <a href="{{URL('shop/'.$sho->id)}}"><h1> {{$sho->shops_trans('ar')->name}}</h1></a>
                                        <div class="follow">
                                            <span class="fa fa-users"></span> {{$sho->views}} متابع
                                        </div>
                                        <p>
        @if(!empty($cat1->cat_trans('ar')))
        {{$cat1->cat_trans('ar')->name}}
    @endif</p>

                                        <div class="star">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star-o"></span>
                                        </div>
                                    </div>
                                </div>
  @endif
  
                                         @endforeach
                                         @endforeach
                                         @endforeach  
                            </div>
                                             
                                         @endif
                                         @endif
                             
                            
                            
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#docans-slider" role="button" data-slide="prev">
                            <span class="fa fa-angle-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#docans-slider" role="button" data-slide="next">
                            <span class="fa fa-angle-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===================================== Start Docans(إكسسورات) ===========================-->
    <div class="docans" id="access">
        <div class="container-fluid">
            <div class="row">
                <div class="docans-con">
                    <div class="sec-tit">
                        <span class="fa fa-diamond"></span> إكسسورات
                    </div>
                    <div id="acc" class="carousel slide" data-ride="carousel">
                        <div class="ads">
                            <img src="{{URL('assets/front/images/ads-2.jpg')}}">

                        </div>
                        <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                            <?php $s=0; ?>
                           @if(!$cat3->subcat->isEmpty())
                                       
                                         @if($s<4)
                                         
                            <div class="item active"> 
                                         @foreach ($cat3->subcat as $sub1)
                                         @foreach($sub1->subcat as $sub2)
                                         @foreach($sub2->shop()->get() as $sho)
  @if(!empty($sho->shops_trans('ar')))
                          
      <?php $sho->shops_trans('ar'); ?>
                          
                                <div class="doca">
                                    <div class="img">
                                        <?php $s=$s+1; ?>
                                        <img src="{{URL('uploads/'.$sho->logo)}}">
                                        <div class="img-over">
                                            <a href="{{URL('shop/'.$sho->id)}}" data-toggle="tooltip" data-placement="top" title="مشاهدة الدكان"> <span class="fa fa-eye"></span> </a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="إضافة إلى المفضلة">
                                                <span class="fa fa-heart"></span>
                                            </a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="متابعة الدكان">
                                                <span class="fa fa-bell-o"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="con">
                                        <a href="{{URL('shop/'.$sho->id)}}"><h1> {{$sho->shops_trans('ar')->name}}</h1></a>
                                        <div class="follow">
                                            <span class="fa fa-users"></span> {{$sho->views}} متابع
                                        </div>
                                        <p>@if(!empty($cat1->cat_trans('ar')))
        {{$cat1->cat_trans('ar')->name}}
    @endif</p>

                                        <div class="star">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star-o"></span>
                                        </div>
                                    </div>
                                </div>
  @endif
  
                                         @endforeach
                                         @endforeach
                                         @endforeach  
                            </div>
                                             
                                         @endif
                                         @endif
                             
                            
                            
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#acc" role="button" data-slide="prev">
                            <span class="fa fa-angle-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#acc" role="button" data-slide="next">
                            <span class="fa fa-angle-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection