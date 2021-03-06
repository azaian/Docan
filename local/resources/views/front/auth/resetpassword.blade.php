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
    <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/pages-style.css')}}"/>
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


            <form class="form-signin" action="{{url('newpassword')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $id }}">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="password" name="password" id="inputEmail" class="form-input" placeholder="ادخل كلمه مرور جديده"
                       required>


                <button class="btn-login" type="submit">
                    ارسال
                </button>

            </form>
            <!-- /form -->
            <a href="{{url('resetpassword')}}" class="forgot-password">
                نسيت كلمة المرور
            </a>

        </div>
    </section>
@endsection