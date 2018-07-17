@extends("admin/master")

@section("page-title")
تقارير كوبونات الخصم
@endsection

@section("page-style")
    <link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />        
    <link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
              rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
@endsection

@section("content-title")
 <h1 class="page-title">تقارير كوبونات الخصم</h1>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">التقارير</a>
     <i class="fa fa-angle-left"></i> 
 </li>
 <li>
   <a href="#">تقارير كوبونات الخصم </a>
      
 </li> 
                     
</ul>
@endsection
                 
@section('page-style')

<link href="{{asset('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" rel="stylesheet" type="text/css" />

@endsection




@section('content')

<!-- BEGIN CONTAINER -->
     
            <!-- BEGIN CONTENT -->
          
<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                
                                
                          <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-eye"></i>عرض كوبونات الخصم</div>
                                
                                </div>
                                
                                
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                           
                                            <div class="col-md-12">
                                                <div class="btn-group pull-right">
                                                    <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">الادوات
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> طباعه  </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> حفظ ك  PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> تصدير الى  Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="well col-md-12 ">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                               <div class="form-group">
                                               <label class="control-label bold" for="input-date-end">بداية من:</label>
                                               <div class="input-group date">
                                               <input type="text" name="filter_date_end" value="2016-02-11" placeholder="Date End" data-format="YYYY-MM-DD" id="input-date-end" class="form-control">
                                               <span class="input-group-btn">
                                                <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                                                </span></div>
                                                </div>
                                            </div>    
                                            <div class="col-md-6 col-sm-6">
                                               <div class="form-group">
                                               <label class="control-label bold" for="input-date-end">الى:</label>
                                               <div class="input-group date">
                                               <input type="text" name="filter_date_end" value="2016-02-11" placeholder="Date End" data-format="YYYY-MM-DD" id="input-date-end" class="form-control">
                                               <span class="input-group-btn">
                                                <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                                                </span></div>
                                                </div>
                                            </div>    
                                            
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                <label class="control-label bold">كود الكوبون</label>
                                               <input type="text" class="form-control">
                                                </div>
                                            </div> 
                                        </div>       
                                        <div class="row">    
                                            <div class="col-md-4 col-sm-4">
                                               
                                                <button type="button" class="btn green">
                                                   <li class="fa fa-search"></li> بحث
                                                </button>
                                               
                                            </div> 
                                        </div>      
                                    </div>
                                    
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                               
                                                <th width="20%" class="text-center"> بداية من:</th>
                                                <th width="20%" class="text-center"> الى:</th>
                                                <th width="10%"> كود الكوبون</th>
                                                <th> عدد مرات الاستخدام</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                     
                                            <tr class="odd gradeX">
                                            
                                                <td>11-2-2016</td>
                                                <td>15-2-2016</td>
                                                <td>#11</td>
                                                <td class="center">50 مرة </td>
                                               
                                             </tr>
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                
      

     
    
<!-- END CONTAINER -->
@endsection


@section("page-plugin")
        <script src="{{asset('assets/admin/global/scripts/datatable.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>

@endsection

@section("page-level-script")
 <script src="{{asset('assets/admin/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
@endsection




