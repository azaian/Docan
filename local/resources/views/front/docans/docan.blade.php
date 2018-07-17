@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
@if(!empty($shop->shops_trans('ar')))
{{$shop->shops_trans('ar')->name}}
@endif
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// style/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('style')
<link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/pages-style.css')}}" />
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// scripts/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('scripts')
<script src="{{URL('assets/front/js/custom.js')}}"></script>
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// slider/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('slider')
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// content/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->

@section('content')
<div class="container">
      <div class="page-title">
            <a href=" {{URL('/')}}"><span class="fa fa-home"></span></a> > @foreach($cat as $cat)<a href="{{url('category/'.$cat->id)}}">{{$cat->cat_trans('ar')->name}}</a>@endforeach  > <i>{{$shop->shops_trans('ar')->name}}</a></i>
      </div>
</div>





<!--========== Start Docans( offer / docans) ===============-->
<div class="container">
      <div class="offer">
            <div class="row" >
                  <div class="col-xs-12">
                        <div class="brand-hed">
                              <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                          <div class="brand-logo">
                                                <img src="{{url('uploads/'.$shop->logo)}}">
                                          </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                          <div class="brand-det">
                                                <div class="tit">
                                                      <h1>{{$shop->shops_trans('ar')->name}}</h1>
                                                </div>
                                                <p>
                                                      {{$shop->shops_trans('ar')->description}}
                                                      @if(auth()->user())
                                                        @if (auth()->user()->thisShop($shop->id))
                                                        <a href="#" id="follow-button">
                                                              <button class="btn btn-default unfollow" id="follow-text">الغاء المتابعة</button>
                                                        </a>
                                                        @else
                                                        <a href="#" id="follow-button">
                                                              <button class="btn btn-default follow" id="follow-text"><span class="fa fa-bullhorn"></span> متابعة الدكان</button>
                                                        </a>
                                                        @endif
                                                      @endif
                                                      <script>
                                                        var followUrl = "{{URL('addfollow/'.$shop->id)}}";
                                                        var token = '{{Session::token()}}';
                                                        var loadingIcon = '<img src="{{URL("assets/front/images/loading.gif")}}" />';
                                                      </script>
                                                      <br />
                                                          <?php
                                                          $filled_stars = $shop->rate;
                                                          $empty_stars = 5 - $shop->rate;
                                                          $i = 0;
                                                          while ($filled_stars > $i) {
                                                            echo '<i class="fa fa-star gold"></i>';
                                                            $i++;
                                                          }
                                                          $x = 0;
                                                          while ($empty_stars > $x) {
                                                            echo '<i class="fa fa-star-o"></i>';
                                                            $x++;
                                                          }
                                                        ?>
                                                </p>
                                          </div>

                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                          <div class="docan-det">
                                                <p>
                                                      <span class="fa fa-map-marker"></span>
                                                      {{$shop->shops_trans('ar')->address}}
                                                </p>
                                                <p>
                                                      <span class="fa fa-phone"></span>
                                                      {{$shop->phone}}
                                                </p>
                                                <p>
                                                      <span class="fa fa-mobile fa-lg"></span>
                                                      {{$shop->mobile}}
                                                </p>
                                                <p>
                                                      <span class="fa fa-envelope-o"></span>
                                                      {{$shop->email}}
                                                </p>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>



            <div class="row">
                  <div class="col-md-9">
                        <div class="offer-con">
                              <div class="tit">المنتجات</div>
                              <div class="row">
                                    @foreach($products as $product)
                                    <div class="col-md-4 col-xs-6">
                                          <div class="prod-type-3">
                                                <img src="{{URL('uploads/'.$product->image)}}" class="on">


                                                @if(!empty($product->images))
                                                <img src="{{URL('uploads/'.$product->images->first()->image)}}" class="off">
                                                @endif

                                                <div class="offer-prod-det">
                                                      @if(!empty($product->product_trans('ar')))
                                                      <a href="{{URL('product/'.$product->id)}}">
                                                            <h1>
                                                                  {{$product->product_trans('ar')->name}}
                                                            </h1>
                                                      </a>
                                                      @endif
                                                      <p>
                                                          <?php
                                                            $filled_stars = $product->rate;
                                                            $empty_stars = 5 - $product->rate;
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
                                                      </p>
                                                      <div class="price">
                                                            <h3>{{$product->price}}$</h3>
                                                      </div>

                                                </div>


                                                <div class="img-over">

                                                      <div id="ca" >
                                                            <a href="{{URL('cart/'.$product->id)}}" >
                                                                  <button class="btn btn-default">
                                                                        <span class="fa fa-shopping-cart"></span>إضافة إلى عربة الشراء
                                                                  </button>
                                                            </a>
                                                      </div>
                                                      @if(auth()->user())
                                                        @if($product->favorite())
                                                          <a href="{{URL('getaddfav/'.$product->id)}}" >
                                                                <span class="fa fa-heart">
                                                                </span>
                                                          </a>
                                                        @else
                                                          <a href="{{URL('getaddfav/'.$product->id)}}" >
                                                                <span class="fa fa-heart-o">
                                                                </span>
                                                          </a>
                                                        @endif
                                                      @else
                                                        <a href="{{URL('login')}}" >
                                                              <span class="fa fa-heart">
                                                              </span>
                                                        </a>
                                                      @endif


                                                </div>


                                          </div>
                                    </div>
                                    @endforeach
                              </div>

                              <ul class="pagination">
                                    {!!$products->render()!!}
                              </ul>
                        </div>
                  </div>

                  <div class="col-md-3 hidden-sm hidden-xs3">
                        @include('front/layouts/ads')
                  </div>
            </div>









      </div>
</div>

@endsection
