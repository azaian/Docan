@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')


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
<!--//****************************************************************************************************** \\
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
            <a href="/"><span class="fa fa-home"></span></a> الدكاكين > <i>

            </i>
        </div>
    </div>

    <div class="container">
        <div class="page-search">
            <div class="row">
                <div class="col-xs-12">
                    <a class="btn btn-link pull-left" role="button" data-toggle="collapse" href="#filtersCollapse"
                       aria-expanded="false" aria-controls="filtersCollapse">+ فلترة النتائج</a>
                    <div class="clearfix"></div>
                </div>
                <div class="collapse" id="filtersCollapse">
                    <div class="col-xs-12">
                        <form action="{{url('alldocans/search')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="row">
                                <div class="col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="col-sm-4">التصنيف :</label>


                                        <div class="col-sm-8">
                                            <select class="form-control" id="cat" name="cat">
                                                <option value=""></option>
                                                @foreach($main as $maincate)


                                                    @if(!empty($maincate->cat_trans('ar')))
                                                        <option value="{{$maincate->cat_trans('ar')->id}}">{{$maincate->cat_trans('ar')->name}}</option>  @endif
                                                @endforeach
                                            </select>
                                            <div id="prog">
                                                <img src="{{URL('assets/front/images/loading.gif')}}">
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <div id="data22">

                                        </div>
                                    </div>
                                    <div id="progress1">
                                        <img src="{{URL('assets/front/images/loading.gif')}}">
                                    </div>
                                </div>

                            </div>


                            <br/>
                            <div class="row">
                                <div id="data11">

                                </div>
                            </div>


                            <hr>
                            <div class="row">
                                <div class="col-md-1 col-xs-2 col-md-offset-11 col-xs-offset-10">
                                    <button type="submit" class="btn btn-block btn-default">بحث</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="docans" id="furn">
            <div class="row">
                <div class="col-md-9">
                    <div class="docans-con">
                        <div class="row">
                            <div class="">
                                @if(Session::has('m'))
                                  <div class="alert alert-success" role="alert">
                                      <?php
                                     $a= session()->pull('m');
                                        echo $a[0];
                                      ?>
                                  </div>
                                @endif
                            </div>
                            @foreach($shops as $shop)
                                @if(!empty($shop->shops_trans('ar')))
                                    <div class="col-md-4 col-xs-6">
                                        <div class="doca">
                                            <div class="img">
                                                <img src="{{URL('uploads/'.$shop->logo)}}" class="img-responsive">
                                                <div class="img-over">
                                                    <a href="{{URL('shop/'.$shop->id)}}" data-toggle="tooltip"
                                                       data-placement="bottom" title="مشاهدة الدكان">
                                                                  <span class="fa fa-eye">
                                                                  </span>
                                                    </a>

                                                    @if(auth()->user())
                                                        @if (auth()->user()->thisShop($shop->id))
                                                            <a href="{{URL('getaddfollow/' . $shop->id)}}"
                                                               data-toggle="tooltip" data-placement="bottom"
                                                               title="الغاء المتابعة">
                                                                <span class="fa fa-bell"></span>
                                                            </a>
                                                        @else
                                                            <a href="{{URL('getaddfollow/' . $shop->id)}}"
                                                               data-toggle="tooltip" data-placement="bottom"
                                                               title="متابعة الدكان">
                                                                <span class="fa fa-bell-o"></span>
                                                            </a>
                                                        @endif
                                                    @else
                                                        <a href="{{URL('login')}}" data-toggle="tooltip"
                                                           data-placement="bottom" title="متابعة الدكان">
                                                            <span class="fa fa-bell-o"></span>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="con">
                                                <a href="{{URL('shop/'.$shop->id)}}">
                                                    <h1>
                                                        {{$shop->shops_trans('ar')->name}}
                                                    </h1>
                                                </a>
                                                <div class="follow">
                                                    <span class="fa fa-users"></span>
                                                    {{$shop->followers->count()}} متابع
                                                </div>
                                                <p>

                                                </p>

                                                <div class="star">
                                                    <?php
                                                    $filled_stars = $shop->rate;
                                                    $empty_stars = 5 - $shop->rate;
                                                    $i = 0;
                                                    while ($filled_stars > $i) {
                                                        echo '<span class="fa fa-star"></span>';
                                                        $i++;
                                                    }
                                                    $x = 0;
                                                    while ($empty_stars > $x) {
                                                        echo '<span class="fa fa-star-o"></span>';
                                                        $x++;
                                                    }
                                                    ?>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>


                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <!--                              <ul class="pagination">

                                                      </ul>-->
                        <ul class="pagination">
                            {!!$shops->render()!!}
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 hidden-sm hidden-xs3">
                    @include('front/layouts/ads')
                </div>
            </div>
        </div>
    </div>
@endsection
