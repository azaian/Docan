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
        <a href="{{URL('/')}}"><span class="fa fa-home"></span></a>  >
        <a href="{{URL('souq')}}"> سوق الجمعه</a> >


        @if(!empty($product->product_trans('ar')))
        <i>{{$product->product_trans('ar')->name}}</i>
        @endif

    </div>
</div>
<div class="container">
    <div class="souq-product-page">

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



                                        @foreach($product->images as $produc1)
                                        <div class="item">
                                            <img class="img-responsive" src="{{URL('uploads/'.$produc1->image)}}" >
                                        </div>
                                        @endforeach

                                        
                                        
                                        
                                        
                                        <ol class="carousel-indicators">
                                            
                                            <li data-target="#pro-carousel" data-slide-to="0">
                                                <img class="img-responsive" src="{{URL('uploads/'.$product->image)}}">
                                            </li>
                                            
                                            
                                            
                                            <?php $b = 0; ?>

                                            @if(!empty($product->images))
                                            @foreach($product->images as $produc2)

                                            <?php $b = $b + 1; ?>

                                            <li data-target="#pro-carousel" data-slide-to="{{$b}}">
                                                <img class="img-responsive" src="{{URL('uploads/'.$produc2->image)}}" >
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
                                    تم اضافه الاعلان  فى   : {{$product->created_at}}
                                </div>

                                <div class="product-price">
                                    اسم صاحب الاعلان  :
                                    {{$product->user->pluck('name')->first() }}


                                </div>

                                <div class="docan-det">
                                    <p>
                                        <span class="fa fa-map-marker"></span>
                                        يفبغلاتىمنةكمو
                                    </p>
                                    <p>
                                        <span class="fa fa-mobile"></span>
                                        {{$product->user->pluck('phone')->first() }}
                                    </p>

                                </div>




                                <div class="product-desc">


                                    @if(!empty($product->product_trans('ar')))
                                    {{$product->product_trans('ar')->details}}
                                    @endif
                                </div>
                                <hr>

                                <div class="btn-group cart">

                                    <div class="btn-group cart">

                                        @if(auth()->user())
                                        @if ($product->favorite())
                                        <button type="button" class="btn btn-default" id="fav-button">
                                            <span class="fa fa-heart"></span>
                                            ازالة من المفضله
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-default" id="fav-button">
                                            <span class="fa fa-heart-o"></span>
                                            اضافة الى المفضله
                                        </button>
                                        @endif
                                        @else
                                        <a href="{{URL('login')}}">
                                            <button type="button" class="btn btn-default">
                                                <span class="fa fa-heart-o"></span>
                                                اضافة الى المفضله
                                            </button>
                                        </a>
                                        @endif

                                    </div>



                                    <script>
                                        var favUrl = "{{URL('addfav/' . $product->id)}}";
                                        var loadingIcon = '<img src="{{URL("assets/front/images/loading.gif")}}" />';
                                        var token = '{{Session::token()}}';
                                    </script>


                                    <div class="btn-group wishlist">
                                        <button type="button" class="btn btn-default">
                                            <span class="fa fa-eye"></span>
                                            {{   $product->views }}
                                        </button>
                                    </div>
                                </div>

                            </div>



                        </div>
                        <div class="clearfix"></div>
                        <div class="ano-pro-det">
                            <div class="product-information">
                                <ul id="myTab" class="nav nav-tabs nav_tabs">
                                    <li class="active"><a href="#service-one" data-toggle="tab">الوصف</a></li>
                                    <li><a href="#service-two" data-toggle="tab">معلومات عن الاعلان </a></li>

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

                                                        <td>{{ $pr1->attribute->attribute_translation('ar')->name }}</td>
                                                        <td>{{ $pr1->value}}</td>

                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </section>
                                    </div>

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