@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')

@if(!empty($product->product_trans('ar')))

{{$product->product_trans('ar')->name}}
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
        <a href="{{URL('/')}}"><span class="fa fa-home"></span></a>  > @foreach($shop as $shop)
        <a href="{{URL('shop/'.$shop->id)}}"> @if(!empty($shop->shops_trans('ar')))
            {{$shop->shops_trans('ar')->name}}
            @endif</a> > @endforeach


        @if(!empty($product->product_trans('ar')))
        <i>{{$product->product_trans('ar')->name}}</i>
        @endif

    </div>
</div>
<div class="container">
    <div class="product-page">
        <div class="row">
            <div class="col-md-9">
                <div class="prod-container">


                    <div class="row">


                        <div class="col-md-5">
                            <div class="hot-deal">
                                <div id="pro-carousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">



                                        <div class="item active zoom">
                                            <img class="img-responsive" id='ex1'  src="{{URL('uploads/'.$product->image)}}">
                                        </div>



                                        @foreach($product->images as $produc)
                                        <div class="item">
                                            <img class="img-responsive" src="{{URL('uploads/'.$produc->image)}}" >
                                        </div>
                                        @endforeach

                                        <ol class="carousel-indicators">
                                            <li data-target="#pro-carousel" data-slide-to="0">
                                                <img class="img-responsive" src="{{URL('uploads/'.$product->image)}}">
                                            </li>
                                            <?php $b = 0; ?>

                                            @if(!empty($product->images))
                                            @foreach($product->images as $produc)

                                            <?php $b = $b + 1; ?>

                                            <li data-target="#pro-carousel" data-slide-to="{{$b}}">
                                                <img class="img-responsive" src="{{URL('uploads/'.$produc->image)}}" >
                                            </li>

                                            @endforeach
                                            @endif
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-7">
                            <div class="prod-des">
                                <div class="product-title">

                                    @if(!empty($product->product_trans('ar')))

                                    {{$product->product_trans('ar')->name}}
                                    @endif

                                </div>
                                <div class="prod-id">
                                    رقم المنتج : {{$product->id}}
                                </div>
                                <div class="product-rating">
                                    <?php
                                    $filled_stars = $product->rate;
                                    $empty_stars = 5 - $product->rate;
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
                                </div>
                                <hr>
                                <div class="product-price">
                                    {{$product->price}}
                                    <span> متاح فى المخزن</span>
                                </div>
                                <div class="product-desc">


                                    @if(!empty($product->product_trans('ar')))
                                    {{$product->product_trans('ar')->details}}
                                    @endif
                                </div>
                                <hr>

                                <div class="btn-group wishlist">
                                    @if(auth()->user())
                                    @if ($product->favorite())
                                    <button type="button" class="btn btn-default product-fav-button">
                                        <span class="fa fa-heart"></span>
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-default product-fav-button">
                                        <span class="fa fa-heart-o"></span>
                                    </button>
                                    @endif
                                    @endif
                                </div>
                                <script>
                                    var favUrl = "{{URL('addfav/' . $product->id)}}";
                                    var loadingIcon = '<img src="{{URL("assets/front/images/loading.gif")}}" />';
                                    var token = '{{Session::token()}}';
                                </script>


                                <div class="btn-group cart">
                                    <a href="{{URL('cart/'.$product->id)}}" >
                                        <button type="button" class="btn btn-default">
                                            <span class="fa fa-shopping-cart"></span>
                                            إضافة إالى العربة
                                        </button>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="clearfix"></div>
                    <div class="ano-pro-det">
                        <div class="product-information">
                            <ul id="myTab" class="nav nav-tabs nav_tabs">
                                <li class="active"><a href="#service-one" data-toggle="tab">الوصف</a></li>
                                <li><a href="#service-two" data-toggle="tab">معلومات عن المنتج</a></li>
                                <li><a href="#service-three" data-toggle="tab">عرض التقييم </a></li>
                                <li><a href="#service-four" data-toggle="tab"> قيم الان  </a></li>

                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="service-one">
                                    <section class="product-info">


                                        @if(!empty($product->product_trans('ar')))
                                        {{$product->product_trans('ar')->details}}
                                        @endif

                                    </section>
                                </div>
                                <div class="tab-pane fade" id="service-two">
                                    <section class="product-info">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>الخاصيه </th>
                                                    <th>القيمه </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($product->p_attr('ar') as $pr1)
                                                <tr>
                                                    @if(isset($pr1->attribute->attribute_translation('ar')->name))
                                                    <td>{{ $pr1->attribute->attribute_translation('ar')->name }}</td>
                                                    <td>{{ $pr1->value}}</td>
                                                    @endif
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </section>
                                </div>

                                <div class="tab-pane fade" id="service-three">


                                    @foreach($product->review as $re)
                                    <?php
                                    $username = App\User::where('id', $re->user_id)->pluck('name')->first();

                                    $im = App\User::where('id', $re->user_id)->pluck('image')->first();
                                    ?>
                                    <section class="product-review">
                                        <div class="review-con">
                                            <div class="user-img">
                                                <img src="{{URL('uploads/'.$im)}}">
                                            </div>
                                            <div class="revi">
                                                <h1>
                                                    {{ $username }}
                                                </h1>
                                                <p>
                                                    {{ $re->review }}
                                                </p>
                                                <?php
                                                for ($i = 0; $i < $re->stars; $i++) {
                                                    ?>
                                                    <span class="fa fa-star"></span>
                                                <?php } ?>

                                                <?php
                                                for ($i = 0; $i < 5 - $re->stars; $i++) {
                                                    ?>
                                                    <span class="fa fa-star-o"></span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </section>
                                    @endforeach
                                </div>




                                <div class="tab-pane fade" id="service-four" >

                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"> الاسم   </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control">
                                            </div>
                                            <label class="col-sm-2 control-label"> الايميل    </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" >
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"> التفاصيل </label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <label class="col-sm-2 control-label">  </label>
                                            <div class="col-sm-10">

                                                <div class="star-rating">
                                                    <div class="star-rating__wrap">
                                                        <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
                                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 out of 5 stars"></label>
                                                        <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
                                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 out of 5 stars"></label>
                                                        <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
                                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 out of 5 stars"></label>
                                                        <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
                                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 out of 5 stars"></label>
                                                        <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
                                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 out of 5 stars"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">اضافه  </button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 hidden-sm hidden-xs3">
                @include('front/layouts/ads')
            </div>
        </div>
    </div>
</div>
<!--================== Start Vip ==========================-->
<!--========== Start Docans( offer / docans) ===============-->



@endsection

