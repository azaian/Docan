@extends('admin/master')

@section('title')
  الصفحة الرئيسية
@endsection

@section('styles')

@endsection

@section('layoutscripts')

@endsection

@section('levelscripts')
@endsection

@section("content-title")
    <h3 class="page-title"> الصفحة الرئيسية
   
    </h3>  
@endsection
@section("content-navigat")
<ul class="page-breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{URL('/')}}">الصفحة الرئيسية</a>
    </li>
                    
</ul>
@endsection
@section('content')
      <<h1 class="page-title"> Dashboard
                            <small>dashboard &amp; statistics</small>
                        </h1>
<div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                    <div class="visual">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="1349">{{$users}}</span>
                                        </div>
                                        <div class="desc"> users</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="12,5">{{$shops}}</span></div>
                                        <div class="desc"> Total shops </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="549">{{$vips}}</span>
                                        </div>
                                        <div class="desc"> vipshops </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                    <div class="visual">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <?php $sh=$shops - $vips; ?>
                                    <div class="details">
                                        <div class="number"> 
                                            <span data-counter="counterup" data-value="89">{{$sh}}</span> </div>
                                        <div class="desc"> ordinary shops </div>
                                    </div>
                                </a>
                            </div>
                        </div>
      <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                    <div class="visual">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="1349">{{$orders}}</span>
                                        </div>
                                        <div class="desc"> orders</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="12,5">{{ $deliver}}</span></div>
                                        <div class="desc"> الاوردرات المسلمه </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="549">{{$back}}</span>
                                        </div>
                                        <div class="desc"> المرتجع </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                    <div class="visual">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    
                                    <div class="details">
                                        <div class="number"> 
                                            <span data-counter="counterup" data-value="89">{{$back}}</span> </div>
                                        <div class="desc"> الملغى </div>
                                    </div>
                                </a>
                            </div>
                        </div>
      <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                    <div class="visual">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                  
                                    <div class="details">
                                        <div class="number"> 
                                            <span data-counter="counterup" data-value="89">{{$onprocess}}</span> </div>
                                        <div class="desc">الاوردرات ف المعالجه </div>
                                    </div>
                                </a>
                            </div>
          
                            
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                    <div class="visual">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="1349">{{$dem}}</span>
                                        </div>
                                        <div class="desc"> عدد الشكاوى</div>
                                    </div>
                                </a>
                            </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="12,5">{{$adv}}</span></div>
                                        <div class="desc"> عدد المقترحات </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="549">{{$num}}</span>
                                        </div>
                                        <div class="desc"> مجمل اعداد المتجات ف السوق المخزون </div>
                                    </div>
                                </a>
                            </div>
          
                            
                        </div>
                   <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                    <div class="visual">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="1349">{{$number}}</span>
                                        </div>
                                        <div class="desc"> مخزون المحلات</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="12,5">{{$emails}}</span></div>
                                        <div class="desc"> عدد المشتركين ف القائمه البريديه </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="549">{{$summ}}</span>
                                        </div>
                                        <div class="desc"> اجمالى المبيعات </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                    <div class="visual">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                 
                                    <div class="details">
                                        <div class="number"> 
                                            <span data-counter="counterup" data-value="89">{{$partner}}</span> </div>
                                        <div class="desc"> عددالشركاء </div>
                                    </div>
                                </a>
                            </div>
                        </div>
       <div class="row">
                           
                          
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="549">{{$delivery}}</span>
                                        </div>
                                        <div class="desc"> عدد شركات الشحن </div>
                                    </div>
                                </a>
                            </div>
                  
                        </div>
                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1--> 
               
@endsection

