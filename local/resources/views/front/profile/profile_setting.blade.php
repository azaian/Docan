@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
    profile
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
    <div class="container">
        <div class="page-title">
            <a href=""><span class="fa fa-home"></span></a> > <i>حسـابى</i>

        </div>
    </div>


    <div class="profile">
        @if(auth()->check())
            <?php $id = Auth::user()->id; ?>
            <div class="container">
                <div class="row">

                    @include('front.profile.sidebar')
                    <div class="col-lg-9 prof-sid-con">

                        <div class="row">


                            <div class="col-md-12">
                                <h2> تعديل البيانات الشخصيه </h2>
                                <br>
                                <br>
                                <form role="form" name="myform" action="{{URL('profile/update-profile')}}"
                                      enctype="multipart/form-data"
                                      method="POST" novalidate>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                    <div class="tab-content">
                                        <div class="tab-pane active" role="tabpanel" id="step1">
                                            <div class="left-det">

                                                <div class="upload-img">
                                                    <p>الصوره الشخصية</p>
                                                    <img src="{{url('uploads/profiles/'.Auth::user()->image)}}"
                                                         alt="logo"
                                                         height="100px" width="100px">

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
                                                <p>إملئ البيانـات التالية لإتمام عملية التسجيل
                                                    :</p> @if(count($errors)>0)
                                                    @foreach($errors->all() as $error)
                                                        <p>{{$error}}</p>
                                                    @endforeach
                                                @endif

                                                <div class="form-group">
                                                    <span class="fa fa-user"></span>
                                                    <input class="form-control" type="text" name="name"
                                                           required placeholder="الإسـم بالكامل"
                                                           value="{{Auth::user()->name}}">

                                                </div>

                                                <div class="form-group">
                                                    <span class="fa fa-phone"></span>
                                                    <input class="form-control" type="text" name="phone"
                                                           value="{{ Auth::user()->phone }}" required
                                                           placeholder="رقم التليفون">

                                                </div>
                                                <div class="form-group">
                                                    <span class="fa fa-map-marker"></span>
                                                    <input class="form-control" type="text" name="address"
                                                           value="{{ Auth::user()->address}}" required
                                                           placeholder="العنوان">

                                                </div>

                                                <div class="form-group">
                                                    <span class="fa fa-globe"></span>

                                                    {{--check the country of the user and select it --}}
                                                    <select class="form-control" name='country'>
                                                        <option @if(Auth::user()->country=="Dubai"){{'selected'}}@endif
                                                                value="Dubai"> دبى
                                                        </option>
                                                        <option @if(Auth::user()->country=="Abu Dhabi"){{'selected'}}@endif
                                                                value="Abu Dhabi"> ابو ظبى
                                                        </option>
                                                        <option @if(Auth::user()->country=="ain"){{'selected'}}@endif
                                                                value="ain"> عين
                                                        </option>
                                                        <option @if(Auth::user()->country=="Fujairah"){{'selected'}}@endif
                                                                value="Fujairah"> الفجيره
                                                        </option>
                                                        <option @if(Auth::user()->country=="Ras Al Khaimah"){{'selected'}}@endif
                                                                value="Ras Al Khaimah"> راس الخيمه
                                                        </option>
                                                        <option @if(Auth::user()->country=="Sharjah"){{'selected'}}@endif
                                                                value="Sharjah"> الشارقه
                                                        </option>
                                                        <option @if(Auth::user()->country=="um alkyron"){{'selected'}}@endif
                                                                value="um alkyron"> ام القريون
                                                        </option>
                                                    </select>


                                                </div>
                                            </div>

                                            <ul class="list-inline pull-right margin-top">
                                                <li>
                                                    <button type="submit" ng-disabled="myform.$invalid"
                                                            class="btn btn-primary ">حفظ
                                                    </button>
                                                </li>
                                                <li>
                                                    <a class="" href="{{url('profile')}}">
                                                        <button id="close" type="button" class="btn btn-primary">إغلاق
                                                        </button>
                                                    </a>
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
        @endif
    </div>
@endsection