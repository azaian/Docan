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

    <div class="container">

        @if(auth()->check())
            <?php $id = Auth::user()->id; ?>

            <div class="row">

                <div class="profile">

                    @include('front.profile.sidebar')


                    <div class="col-lg-9 prof-sid-con">

                        <table class="table">
                            <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                <th>اسم الاعلان</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($favo))
                                @foreach ($favo as $p)
                                    <tr>
                                        <th><img src="{{url('uploads/'.$p->prod->image)}}" class="img-circle"
                                                 width="64px" height="64px"></th>
                                        {{-- check the item from souq or docans --}}
                                        <?php
                                        if (get_headers(url('product/' . $p->prod->id))[0]=='HTTP/1.0 200 OK') {

                                            $url = url('product/' . $p->prod->id);
                                        } else
                                            $url = url('souq/' . $p->prod->id);

                                        ?>
                                        <td><a href="{{$url}}"> {{ $p->prod->product_trans('ar')->name }} </a></td>
                                        <td>
                                            <a href="{{url('getaddfav/'.$p->prod->id)}}">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>


                                    </tr>

                                @endforeach
                            @endif
                            {{--<tr>--}}
                            {{--<th> <img src="{{url('uploads/a.jpg')}}"  class="img-circle" width="64px" height="64px"> </th>--}}
                            {{--<td> <a href="" > اعلان  اى حاجه   </a>   </td>--}}
                            {{--<td> <a  href="#">--}}
                            {{--<i class="fa fa-times"></i>--}}
                            {{--</a>--}}
                            {{--</td>--}}
                            {{--</tr>--}}


                            </tbody>
                        </table>

                    </div>


                </div>
            </div>
        @endif
    </div>
@endsection
