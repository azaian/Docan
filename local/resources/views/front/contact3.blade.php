@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
{{$part->name}}
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
        <a href="{{URL('/')}}"><span class="fa fa-home"></span></a> > <i> {{$part->name}} </i>
    </div>
</div>



      <div class="container">
            <div class="row">
			
			<div class="col-md-6">
			
                 <div class="col-md-8 col-md-offset-2 col-xs-12">
                     @if(Session::has('m'))
                <?php
                $a;
                $a = session()->pull('m');
                ?>
                <span>
                    {{$a[0]}} </span>
                @endif
                <div class="add-offer-form">
                    @if(!empty($part->logo))
                    <img src="{{URL('uploads/partners/'.$part->logo)}}">
                  
			@else
                        لايوجد صوره 
                        @endif
					
                </div>
                 </div>
                        </div>
                    <div class="col-md-6">

            <h4 class="heading-primary mt-lg"> <strong>{{$part->name}}</strong></h4>
            <p>{{$part->details}}</p>

            <hr>

            <h4 class="heading-primary"><strong><a href="{{$part->facebook}}">بيانات الاتصال </a></strong></h4>
            <ul class="list list-icons list-icons-style-3 mt-xlg">
                <li><i class="fa fa-map-marker"></i> <strong>site:</strong><a href="{{$part->website}}"> {{$part->website}}</a></li>
                <li><i class="fa fa-phone"></i> <strong>Phone:</strong> {{$part->phone}}</li>
                <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="{{$part->email}}">{{$part->email}}</a></li>
            </ul>


            <hr>



        </div>
            </div>
                </div>
                
                
                

@endsection
