@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
سوف الجمعه
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
    
    
    $(document).on("change", "#subcats", function() {
        
        
        var id = $('option:selected', this).val();

        alert(id);
        var _token = $('#_token').val();

        var data = new FormData();

        $.ajax({
            url: "{{url('test_souq')}}" + "/" + id,
            type: 'get',
            headers: {
                'X-CSRF-Token': _token
            },
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('#progress1').show();
            },
            success: function (data2) {
                $('#data11').html(data2);
                $('#progress1').hide();
            },
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
<div class="container">
    <div class="page-title">
        <a href="{{URL('/')}}"><span class="fa fa-home"></span></a> > <i>سوق الجمعة</i>
    </div>
</div>

<div class="container">
    <div class="page-search">
        <div class="row">
            <div class="col-xs-12">
                <a class="btn btn-link pull-left" role="button" data-toggle="collapse" href="#filtersCollapse" aria-expanded="false" aria-controls="filtersCollapse">+ فلترة النتائج</a>
                <div class="clearfix"></div>
            </div>
            <div class="collapse" id="filtersCollapse">
                <div class="col-xs-12">
                    <form action="{{url('souq/search')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" >

                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label class="col-sm-4">التصنيف :</label>


                                    <div class="col-sm-8">
                                        <select class="form-control" id="cat" name="cat">
                                            <option value=""></option>
                                            @foreach($main as $maincate)


                                            @if(!empty($maincate->cat_trans('ar')))
                                            <option value="{{$maincate->cat_trans('ar')->id}}" >{{$maincate->cat_trans('ar')->name}}</option>  @endif
                                            @endforeach
                                        </select>
                                        <div id="prog" >
                                            <img src="{{URL('assets/front/images/loading.gif')}}" >
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
                                <div id="progress1" >
                                    <img src="{{URL('assets/front/images/loading.gif')}}" >
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


<div class="souq">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="offer-con">
                    <div class="row">

                        @foreach($products as $product)
                        <div class="col-md-4 col-xs-6">
                            <div class="prod-type-3">
                                <a href="{{URL('souq/product/'.$product->id)}}">
                                    <img src="{{URL('uploads/'.$product->image)}}" class="on">
                                </a>

                                <div class="offer-prod-det">
                                    @if(!empty($product->product_trans('ar')))
                                    <a href="{{URL('souq/product/'.$product->id)}}">
                                        <h2>{{$product->product_trans('ar')->name}}</h2></a>
                                    @endif
                                </div>
                                <div class="img-over">
                                    <div id="ca" >
                                        @if (auth()->user())
                                        @if ($product->favorite())
                                        <a href="{{URL('getaddfav/'.$product->id)}}" >
                                            <button class="btn btn-default">
                                                <span class="fa fa-heart"></span>
                                                ازالة من المفضلة
                                            </button>
                                        </a>
                                        @else
                                        <a href="{{URL('getaddfav/'.$product->id)}}" >
                                            <button class="btn btn-default">
                                                <span class="fa fa-heart-o"></span>
                                                اضافه  الى المفضله
                                            </button>
                                        </a>
                                        @endif
                                        @else
                                        <a href="{{URL('login')}}" >
                                            <button class="btn btn-default">
                                                <span class="fa fa-heart"></span>
                                                اضافه  الى المفضله
                                            </button>
                                        </a>
                                        @endif
                                    </div>
                                    <a href="" >
                                        <span class="fa fa-eye">
                                        </span>
                                        {{   $product->views }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <ul class="pagination">
                        {!!$products->render()!!}
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