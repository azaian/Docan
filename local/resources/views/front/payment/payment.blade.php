@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
اكمال الطلب
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

<div class="container">
    <div class="page-title">
        <a href=""><span class="fa fa-home"></span></a> > <i>إضــافة إعــلان</i>
    </div>   
</div>


<div class="container">
    <section class="add-offer">

        <div class="row text-center">
            <h1>اكمل عمليه الدفع</h1> @if(count($errors)>0)
            @foreach($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
            @endif
            @if(Session::has('m'))
            <?php
            $a;
            $a = session()->pull('m');
            ?>
            <span>
                {{$a[0]}} </span>
            @endif
            <p>
                عند اكمال هذه المعلومات سيتم البدأ ف ارسال الطلب اليك
            </p>

        </div>

    </section>  

</div>



<div class=" main shop" >
    <div class="container">

        <div class="row">
            <form name="myform" action="{{URL('payment')}}" enctype="multipart/form-data" method="POST" >
                <div class="col-md-9">

                    <div class="panel-group" id="accordion">



                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
                                        بيانات الشحن                                    
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse" aria-expanded="false">
                                <div class="panel-body">

                                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">

                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Country</label>
                                                <input type="text" name="country" value="" class="form-control">
<!--                                                <select class="form-control">
                                                    <option value="">Select a country</option>
                                                </select>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>First Name</label>
                                                <input type="text" name="firstname" value="" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Last Name</label>
                                                <input type="text" name="secondname" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    <div class="row">
                                                                            <div class="form-group">
                                                                                <div class="col-md-12">
                                                                                    <label>Company Name</label>
                                                                                    <input type="text" value="" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>-->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>phone number </label>
                                                <input type="text" name="phone" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>post number </label>
                                                <input type="text" name="posta" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Address </label>
                                                <input type="text" name="address" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>state </label>
                                                <input type="text" name="govern" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>City </label>
                                                <input type="text" name="city" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    <div class="row">
                                                                            <div class="col-md-12">
                                                                                <input type="submit" value="Continue" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
                                                                            </div>
                                                                        </div>-->

                                </div>
                                <div class="featured-boxes">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="featured-box featured-box-primary align-left mt-xlg" style="height: 303px;">
                                                <div class="box-content">
                                                    <h4 class="heading-primary text-uppercase mb-md">اختر شركه الشحن  </h4>
                                                    <table class="cart-totals">

                                                        <tbody>


                                                            @foreach($delivery as $deliver)


                                                            <tr class="cart-subtotal">

                                                                <th>
                                                                    <strong>  {{$deliver->name}}  </strong>  

                                                                </th>
                                                                <td> {{$deliver->charge}}</td>
                                                                <td>
                                                                    <strong><input type="radio" name="shipping" value="{{$deliver->id}}" ></strong>
                                                                </td>
                                                            </tr>
                                                            @endforeach


                                                        </tbody>


                                                        </form>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false">
                                        وسائل  الدفع                                      
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="accordion-body collapse" aria-expanded="false">
                                <div class="panel-body">




                                    <h4 class="heading-primary">Payment</h4>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="remember-box checkbox">
                                                <label>
                                                    <input type="checkbox" checked="checked">
                                                    الدفع  عند الاستلام                                           
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                    <!--                                    <div class="row">
                                                                            <div class="col-md-12">
                                                                                <span class="remember-box checkbox">
                                                                                    <label>
                                                                                        <input type="checkbox">Cheque Payment
                                                                                    </label>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <span class="remember-box checkbox">
                                                                                    <label>
                                                                                        <input type="checkbox">Paypal
                                                                                    </label>
                                                                                </span>
                                                                            </div>
                                                                        </div>-->

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="actions-continue">
                        <input type="submit" value="تنفيذ الطلب " name="proceed" class="btn btn-lg btn-primary mt-xl">
                    </div>

                </div>
            </form>

            <div class="col-md-3">
                <h4 class="heading-primary">Cart Totals</h4>
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

                                <strong><span class="amount">${{Cart::total()}}</span></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




@endsection