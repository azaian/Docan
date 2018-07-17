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

                <table class="table">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>اسم الاعلان </th>
                            <th> عدد الزيارات  </th>
                            <th> تاريخ الاضافه  </th>
                            <th>العمليات </th>
                        </tr>
                    </thead>
                    <tbody>

                        @if(!empty($myadv))
                        @foreach ($myadv as $p)
                        <tr>
                            <th> <img src="{{url('uploads/'.$p->prod->image)}}" class="img-thumbnail" width="64px" height="64px"> </th>
                            <td> <a href="{{url('souq/'.$p->prod->id)}}" > {{ $p->prod->product_trans('ar')->name }}  </a>   </td>
                            <td>{{ $p->prod->views }}     </td>
                            <td>{{date("d / m / Y",strtotime($p->prod->created_at))}} </td>
                            <td>
                                <a  href="{{url('profile/adv-edit/'.$p->prod->id)}}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a  href="{{url('profile/adv-delete/'.$p->prod->id)}}">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif



{{--standard item adv--}}
                       {{-- <tr>
                            <th> <img src="{{url('uploads/a.jpg')}}"  class="img-thumbnail" width="64px" height="64px"> </th>
                            <td> <a href="" > اعلان  اى حاجه   </a>   </td>
                            <td> 2521      </td>
                            <td> 6/12/2016 </td>
                            <td> 
                                <a  href="#">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <a  href="#">
                                    <i class="fa fa-times"></i>
                                </a>

                            </td>

                        </tr>--}}


                    </tbody>
                </table> 



            </div>
        </div>
    </div>
    @endif
</div>    
@endsection