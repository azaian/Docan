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
                
                            <div class="clearfix"></div>
                           
                            <div class="col-md-12">
                                <h2> اضافه منتج </h2>
                                <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{url('profile/add-product/'.$shop_id)}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> اسم المنتج </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div> <div class="form-group">
                                        <label class="col-sm-2 control-label"> موديل </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="model">
                                        </div>
                                    </div>
                                    @for( $i=0,$d=0;$i<count($dataa['names']);$i++)

                                        @if($dataa['data'][$i]['type']=="dropdown")

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">{{$dataa['names'][$i]}}   </label>
                                                <div class="col-sm-4">
                                                    <select name="{{$dataa['data'][$i]['id']}}" id="" class="form-control">
                                                        @foreach($dropdown[$d] as $value)
                                                            <option value="{{$value}}">{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <?php $d++;?>

                                        @else
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> {{$dataa['names'][$i]}}  </label>
                                                <div class="col-sm-10">
                                                    <input type="{{$dataa['data'][$i]['type']}}" class="form-control"
                                                           name="{{$dataa['data'][$i]['id']}}">
                                                </div>
                                            </div>

                                        @endif
                                    @endfor

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> السعر </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="price">
                                        </div>
                                        <label class="col-sm-2 control-label"> الكميه الحاليه </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="num">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> التفاصيل </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="4" name="details"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> الصوره الرئيسيه </label>
                                        <div class="col-sm-10">
                                            <input type="file" class="" name="image">
                                        </div>
                                    </div>
                                    <div class="form-group" id="up">
                                        <label class="col-sm-2 control-label">صورالمنتج :</label>
                                        <div class="col-md-10">
                                            <input type="file" value="" multiple name="images[]">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-default">اضافه</button>
                                        </div>
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