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
            <div class="container" style="overflow: hidden;">
                <div class="row">

                    @include('front.profile.sidebar')

                    <div class="col-lg-9 prof-sid-con">

                        <table class="table">
                            <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                <th>اسم المنتج</th>
                                <th>الكميه</th>
                                <th>اجمالى السعر</th>
                                {{--<th>العمليات </th>--}}
                            </tr>
                            </thead>
                            <tbody>


                            @if(!empty($products))
                                @foreach ($products as $key=>$p)
                                    <tr>
                                        <th><img src="{{url('uploads/'.$p->image)}}" class="img-thumbnail" width="64px"
                                                 height="64px"></th>
                                        <td>
                                            <a href="{{url('product/'.$p->id)}}"> {{ $p->product_trans($lang)->name }}  </a>
                                        </td>
                                        <td>{{$orderprod[$key]->quantity}}</td>
                                        <td>{{$orderprod[$key]->price}}</td>
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

                        <br><br>
                        <div class="clear-fix"></div>
                        <div class="container">

                            <div class="row details-body">
                                <div class="col-md-2 order-details-head"><b>payment</b></div>
                                <div class="col-md-10">{{$ordership['payment']}}</div>
                            </div>
                            
                            <div class="row details-body">
                                <div class="order-details-head  col-md-2 "><b>city</b></div>
                                <div class="col-md-10">{{$ordership['city']}}</div>
                            </div>

                            <div class="row details-body">
                                <div class="order-details-head  col-md-2 "><b>address</b></div>
                                <div class="col-md-10">{{$ordership['address']}}</div>
                            </div>

                            <div class="row details-body">
                                <div class="order-details-head  col-md-2 "><b>governate</b></div>
                                <div class="col-md-10">{{$ordership['governate']}}</div>
                            </div>

                            <div class="row details-body">
                                <div class="order-details-head  col-md-2 "><b>post number</b></div>
                                <div class="col-md-10">{{$ordership['post_num']}}</div>
                            </div>

                            <div class="row details-body">
                                <div class="order-details-head  col-md-2 "><b>countery</b></div>
                                <div class="col-md-10">{{$ordership['country']}}</div>
                            </div>

                            <div class="row details-body">
                                <div class="order-details-head  col-md-2 "><b>mark</b></div>
                                <div class="col-md-10">{{$ordership['mark']}}</div>
                            </div>




                        </div>

                    </div>

                </div>

            </div>
        @endif
    </div>
@endsection