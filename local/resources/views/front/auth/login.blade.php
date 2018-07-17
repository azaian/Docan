@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
PAGE
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
      <section class="login-form">
        <div class="card card-container">
            @if(Session::has('msg'))
                <div class="alert alert-success text-center">
                    {{session()->pull('msg')[0]}}
                </div>
            @endif
            <img id="profile-img" class="profile-img-card" src="{{URL('assets/front/images/logo.png')}}" />
            <a href="">
                <button class="face-login"><span class="fa fa-facebook"></span>تسجيل بواسطة الفيسبوك</button>
            </a>
            <a href="">
                <button class="twitt-login"><span class="fa fa-twitter"></span>تسجيل بواسطة تويتر</button>
            </a>
            <a href="">
                <button class="linked-login"><span class="fa fa-linkedin"></span>تسجيل بواسطة لينكدان</button>
            </a>
            <a href="">
                <button class="google-login"><span class="fa fa-google-plus"></span>تسجيل بواسطة جوجل +</button>
            </a>
            <p>ــــــــــــــــــ<span> أو </span>ــــــــــــــــــ</p>
            <form class="form-signin" action="login" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" name="email" id="inputEmail" class="form-input" placeholder="البريد الإلكتــرونى" required>
                    @if(Session::has('m'))
                       <?php $a=[];  $a=session()->pull('m');?>
                <span>{{$a[0]}} </span>
                @endif
                <input type="password" name="password" id="inputPassword" class="form-input" placeholder="الرقم السـرى" required>
             
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me">تذكرنى
                    </label>
                </div>
               
                    <button class="btn-login" type="submit">
                        تسجيـل دخــول
                    </button>
            
            </form>
            <!-- /form -->
            <a href="{{url('resetpassword')}}" class="forgot-password">
               نسيت كلمة المرور
            </a>

        </div>
    </section>
  @endsection