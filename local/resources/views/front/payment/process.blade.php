@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
متابعه الطلب
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// style/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('style')
<link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/pages-style.css')}}" />
<link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/cart/theme-shop.css')}}" />
<link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/cart/theme-elements.css')}}" />

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

<div class=" main shop" >
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <div class="featured-boxes">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="featured-box featured-box-primary align-left mt-sm" style="">
                                <div class="box-content">

                                    <table class="shop_table cart">
                                        <thead>
                                            <tr>
                                                <th class="product-remove">
                                                    &nbsp;
                                                </th>

                                                <th class="product-name">
                                                    اسم المنتج                                                      
                                                </th>
                                                <th class="product-price">
                                                    السعر                                                     
                                                </th>
                                                <th class="product-quantity">
                                                    الكميه                                                      
                                                </th>
                                                <th class="product-subtotal">
                                                    الاجمالى                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($cart as $item)
                                            <tr class="cart_table_item">
                                                <td class="product-remove">
                                                    <a title="Remove this item" class="remove" href="{{URL('delcart/'.$item->id)}}">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>

                                                <td class="product-name">
                                                    <a href="{{URL('product/'.$item->id)}}">{{$item->name}}</a>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">{{$item->price}}$</span>
                                                </td>
                                                <td class="product-quantity">

                                                    <div class="quantity">
                                                        <form enctype="multipart/form-data" method="post" class="cart" action='{{URL('updatecart')}}'>
                                                              <input id="inp" type="text"  title="Qty" value="{{$item->qty}}" name="quan">
                                                            <input type="hidden" name="product_id" value="{{$item->id}}" >
                                                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">


                                                            <button class="btn btn-link" type="submit">
                                                                <i class="fa fa-refresh"></i>
                                                            </button>
                                                    </div>
                                                    </form>
                                                </td>
                                                <td class="product-subtotal">
                                           
                                                    <span class="amount">{{$item->subtotaal}}</span>
                                                </td>
                                            </tr>
                                            @endforeach

                                            <tr>


                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="featured-boxes">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="featured-box featured-box-primary align-left mt-xlg" style="height: 303px;">
                                <div class="box-content">
                                    <h4 class="heading-primary text-uppercase mb-md">الاجمالى </h4>
                                    <table class="cart-totals">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>
                                                    <strong>اجمالى المنتجات </strong>
                                                </th>
                                                <td>
                                                    <strong><span class="amount">${{Cart::total()}}</span></strong>
                                                </td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>
                                                    الشحن  
                                                </th>
                                                <td>
                                                    Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
                                                </td>
                                            </tr>
                                            <tr class="total">
                                                <th>
                                                    <strong>اجمالى الطلب </strong>
                                                </th>
                                                <td>
                                                    <strong><span class="amount">{{Cart::total()}}</span></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="actions-continue">
                    <a href="{{url('payment')}}" >
                        <button type="submit" class="btn pull-right btn-primary btn-lg">استكمال الطلب 
                            <i class="fa fa-angle-right ml-xs"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection