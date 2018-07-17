@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
    اضافه دكان
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


    <script type="text/javascript">

        $('#prog').hide();
        $('#progress1').hide();

        $(document).ready(function () {

            $('#cat').change(function () {

                var id = $('option:selected', this).val();

                var _token = $('#_token').val();

                var data = new FormData();

                $.ajax({
                    url: "{{url('subcat_souq')}}" + "/" + id,
                    type: 'get',
                    headers: {
                        'X-CSRF-Token': _token
                    },
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#prog').show();
                    },
                    success: function (data) {
                        $('#data22').html(data);
                        $('#prog').hide();
                    },
                });


            });
        });

    </script>
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
    <div class="page-title">
        <a href=""><span class="fa fa-home"></span></a> > <i>إنشاء دكان</i>
    </div>
    <!--========================================  End Content   ========================================-->
    <section class="register-form" id="build-docan">
        <div class="container">
            <div class="row text-center">
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @endif
                @if(Session::has('m'))
                    <?php $a = [];  $a = session()->pull('m');?>
                    <span>
        {{$a[0]}} </span>
                @endif
                <div class="wizard">
                    <form role="form" name="myform" action="{{URL('new_docan')}}" enctype="multipart/form-data"
                          method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step2">

                                <div class="left-det">
                                    <div class="step-des">
                                        <h1> إنشــا دكانــك</h1>

                                        <p>
                                            هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم
                                            تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية هنالك العديد من
                                            الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر
                                            إدخال بعض النوادر أو الكلمات العشوائية
                                        </p>
                                    </div>
                                    <div class="upload-img">
                                        <p>لوجو الدكــان</p>
                                        <span class="fa fa-picture-o"></span>

                                        <input type="file" value="" name="image">

                                    </div>
                                    <!--                            <div class="link-w-scoial">
                                                                  <a href="">
                                                                      <button class="face-login"><span class="fa fa-facebook"></span>صفحة الدكان على الفيس بوك</button>
                                                                  </a>
                                                                  <a href="">
                                                                      <button class="twitt-login"><span class="fa fa-twitter"></span>صفحة الدكان على تويتر</button>
                                                                  </a>
                                                                    <a href="">
                                                                      <button class="google-login"><span class="fa fa-google-plus"></span>صفحة الدكان على جوجل +</button
                                                                  </a>
                                                                 <a href="">
                                                                      <button class="inst-login"><span class="fa fa-instagram"></span>صفحة الدكان على إنستجرام</button>
                                                                  </a>

                                                                </div>-->
                                </div>
                                <div class="right-det">

                                    <div class="form-group">
                                        <span class="fa fa-user"></span>
                                        <input class="form-control" type="text" name="name"
                                               value="" required placeholder="الإسـم" value="{{ old('name') }}">

                                    </div>
                                    <div class="form-group">
                                        <span class="fa fa-phone"></span>
                                        <input class="form-control" type="text" value="" name="phone" required
                                               placeholder="رقم التليفون" value="{{ old('phone') }}">

                                    </div>
                                    <div class="form-group">
                                        <span class="fa fa-phone"></span>
                                        <input class="form-control" type="text" value="" name="mobile" required
                                               placeholder="رقم المحمول" value="{{ old('mobile') }}">

                                    </div>
                                    <!--                                 <div class="form-group">
                                                                         <span class="fa fa-globe"></span>
                                                                         <input class="form-control" type="text" ng-model="country" ng-minlength="3"
                                            ng-maxlength="7" name='country'value="" required placeholder="االدولـة" >
                                                                     <i ng-messages="myform.country.$error" class="false">
                                                                         <div ng-message="required">خطأ</div>
                                                                      <div ng-message="maxlength">خطأ</div>
                                                                            <div ng-message="minlength">خطأ</div>
                                                                     </i></div>-->
                                    <div class="form-group">
                                        <span class="fa fa-map-marker"></span>
                                        <input class="form-control" type="text"
                                               name='address' required placeholder="االعنوان"
                                               value="{{ old('address') }}">

                                    </div>
                                    <div class="form-group">
                                        <span class="fa fa-envelope-o"></span>
                                        <input class="form-control" type="email" name="email" required
                                               placeholder="البريد الإلكترونى" value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control"  id="cat" name="sub">
                                            {{--<!--                                           @foreach($main as $maincat)--}}
                                            {{--@if(!empty($maincat->cat_trans('ar')))--}}
                                            {{--<option value="{{$maincat->id}}">{{$maincat->cat_trans('ar')->name}}</option>--}}
                                            {{--@if(!$maincat->subcat->isEmpty())--}}
                                            {{--@foreach ($maincat->subcat as $sub1)--}}
                                            {{--@if(!empty($sub1->cat_trans('ar')))--}}
                                            {{--<option value="{{$sub1->id}}">{{$sub1->cat_trans('ar')->name}}</option>--}}
                                            {{----}}
                                            {{----}}
                                            {{----}}
                                            {{----}}
                                            {{--@endif--}}
                                            {{--@endforeach--}}

                                            {{--@endif--}}
                                            {{--@endif--}}
                                            {{--@endforeach -->--}}
                                            {{----}}
                                            {{--@foreach($main as $maincate)--}}

                                            {{--@if(!$maincate->subcat->isEmpty())--}}
                                            {{--@foreach ($maincate->subcat as $sub1)--}}
                                            {{--@if(!empty($sub1->cat_trans('ar')))--}}
                                            {{--@if(!$maincate->subcat->isEmpty())--}}
                                            {{--@foreach($sub1->subcat as $sub2)--}}
                                            {{--<option value="{{$sub2->id}}">--}}
                                            {{--@if(!empty($sub2->cat_trans('ar')))--}}
                                            {{--{{$sub2->cat_trans('ar')->name}}--}}
                                            {{--@endif</option>--}}
                                            {{--@endforeach--}}
                                            {{--@endif--}}
                                            {{--@endif--}}
                                            {{--@endforeach--}}
                                            {{--@endif--}}

                                            {{--@endforeach--}}

                                            {{--end of old category select --}}
                                            {{--mnem code to select category--}}


                                            <option value="">all</option>
                                            @foreach($main as $maincate)


                                                @if(!empty($maincate->cat_trans('ar')))
                                                    <option value="{{$maincate->cat_trans('ar')->id}}">{{$maincate->cat_trans('ar')->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div id="prog">
                                            <img src="{{URL('assets/front/images/loading.gif')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div id="data22">

                                        </div>
                                    </div>
                                    <div id="progress1">
                                        <img src="{{URL('assets/front/images/loading.gif')}}">
                                    </div>

                                <textarea class="input-textarea" name="desc" required
                                          placeholder="نبذة عن الدكــان"></textarea>


                                </div>

                                <ul class="list-inline pull-right">
                                    <li>
                                        <button ng-disabled="myform.$invalid" type="submit" class="btn btn-primary ">
                                            حفظ
                                        </button>
                                    </li>
                                    <li>
                                        <button id="closeee" type="button" class="btn btn-primary ">إغلاق</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
