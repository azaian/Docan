@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
تواصل معنا
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// style/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('style')
<link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/pages-style.css')}}" />
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
        <a href="{{URL('/')}}"><span class="fa fa-home"></span></a> > <i> اتصل بنا </i>
    </div>
</div>



<div class="container">
    <div class="row">

        <div class="col-md-6">


            @if(Session::has('m'))
            <?php
            $a;
            $a = session()->pull('m');
            ?>
            <span>
                {{$a[0]}} </span>
            @endif

            <form id="contactFormAdvanced" name="myform" action="{{URL('contactus')}}" enctype="multipart/form-data" method="POST" >
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token()}}">
                
                <div class="row" >
                    <div class="form-group">
                        <div class="col-md-6" >
                            <label>الاسم </label>
                            <input class="form-control" id="name" type="text" name="name"   required value="{{ old('name')}}">

                        </div>
                        <div class="col-md-6" >
                            <label> الايميل </label>
                            <input class="form-control" id="name" type="email" name="email"   required value="{{ old('name')}}">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row" >
                    <div class="form-group">
                        <div class="col-md-6" >
                            <label>نوع الرساله   :</label>

                            <select class="form-control" name='type'>
                                <option value="0">شكوى</option>
                                <option value="1">افتراح</option>
                            </select> 
                        </div>
                    </div>
                </div>


                <br>
                <div class="row" >
                    <div class="form-group">

                        <div class="col-md-12">
                            <label>الرساله </label>
                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="6" class="form-control" name="desc" id="message" required="" aria-required="true"></textarea>


                        </div>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" id="contactFormSubmit" value="ارسال " class="btn btn-primary btn-lg pull-right" data-loading-text="Loading...">
                    </div>
                </div>




            </form>




        </div>






        <div class="col-md-6">

            <h4 class="heading-primary mt-lg">Get in <strong>Touch</strong></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut feugiat urna arcu, vel molestie nunc commodo non. Nullam vestibulum odio vitae fermentum rutrum.</p>


            <hr>

            <h4 class="heading-primary">The <strong>Office</strong></h4>
            <ul class="list list-icons list-icons-style-3 mt-xlg">
                <li><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</li>
                <li><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-789</li>
                <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>
            </ul>


            <hr>



        </div>


    </div>

</div>
@endsection
