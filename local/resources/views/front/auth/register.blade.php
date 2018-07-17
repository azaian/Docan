@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
    REGISTRATION
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
    <section class="register-form" id="register-new">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-xs-12">


                    <div class="row text-center">
                        <div class="wizard">
                            <form role="form" name="myform" action="{{URL('register')}}" enctype="multipart/form-data"
                                  method="POST" novalidate>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="tab-content">
                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                        <div class="left-det">
                                            <div class="step-des">
                                                <h1>البيانات الشخصية</h1>

                                                <p>
                                                </p>
                                            </div>
                                            <div class="upload-img">
                                                <p>الصوره الشخصية</p>
                                                <span class="fa fa-picture-o"></span>

                                                <input name="image" type="file" value="">

                                            </div>
                                            <div class="caption">


                                            </div>
                                            <label>
                                                <input type="checkbox" name="remmeber" ng-model="remmeber"
                                                       value="remember-me" required>
                                                أوافق على شروط وسياسات الموقع
                                            </label>
                                        </div>
                                        <div class="right-det">
                                            <p>إملئ البيانـات التالية لإتمام عملية التسجيل :</p> @if(count($errors)>0)
                                                @foreach($errors->all() as $error)
                                                    <p>{{$error}}</p>
                                                @endforeach
                                            @endif

                                            <div class="form-group">
                                                <span class="fa fa-user"></span>
                                                <input class="form-control" type="text" name="name"
                                                       required placeholder="الإسـم بالكامل" value="{{ old('name') }}">

                                            </div>

                                            <div class="form-group">
                                                <span class="fa fa-phone"></span>
                                                <input class="form-control" type="text" name="phone"
                                                       value="{{ old('phone') }}"  required
                                                       placeholder="رقم التليفون">

                                            </div>

                                            <div class="form-group">
                                                <span class="fa fa-globe"></span>


                                                <select class="form-control" name='country'
                                                        ng-model="country">
                                                    {{--need to insert values here --}}
                                                    <option value="Dubai"> دبى</option>
                                                    <option value="Abu Dhabi"> ابو ظبى</option>
                                                    <option value="ain"> عين</option>
                                                    <option value="Fujairah"> الفجيره</option>
                                                    <option value="Ras Al Khaimah"> راس الخيمه</option>
                                                    <option value="Sharjah"> الشارقه</option>
                                                    <option value="um alkyron"> ام القريون</option>
                                                </select>


                                            </div>
                                            <div class="form-group">
                                                <span class="fa fa-map-marker"></span>
                                                <input class="form-control" type="text" name="address"
                                                       value="{{old('address')}}" required
                                                       placeholder="العنوان">

                                            </div>


                                            <div class="form-group">
                                                <span class="fa fa-envelope-o"></span>
                                                <input class="form-control" name="email" type="email" value="" required
                                                       placeholder="البريد الإلكترونى" value="{{ old('email') }}">


                                            </div>
                                            <div class="form-group">
                                                <span class="fa fa-lock"></span>
                                                <input class="form-control" name="password" type="password" value=""
                                                       required placeholder="كلمـة المرور">

                                            </div>
                                            <div class="form-group">
                                                <span class="fa fa-lock"></span>
                                                <input class="form-control" name="password" type="password" value=""
                                                       required placeholder="اعد كتابه كلمه المرور ">

                                            </div>


                                        </div>
                                        <ul class="list-inline pull-right">
                                            <li>
                                                <button type="submit" ng-disabled="myform.$invalid"
                                                        class="btn btn-primary ">حفظ
                                                </button>
                                            </li>
                                            <li>
                                                <button id="close" type="button" class="btn btn-primary ">إغلاق</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection