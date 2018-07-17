@extends("admin/master")

@section("page-title")
تفاضيل الواردات
@endsection

@section("page-style")
    <link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />        
    <link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
              rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
@endsection

@section("content-title")
 <h1 class="page-title">تقارير المبيعات</h1>  
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
   <a href="#">تقارير المبيعات </a>
      <i class="fa fa-angle-left"></i> 
 </li> 
 <li>
   <a href="#"> التقرير التفصيلى </a>
     
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
                                        <i class="fa fa-eye"></i>عرض تفاصيل الواردات </div>
                                
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
                                    
                                    <div class="well table-toolbar ">
                                     <form id="search_form" method="get"> 
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                               <div class="form-group">
                                               <label class="control-label bold" for="input-date-end">بداية من:</label>
                                              <div class="input-group date date-picker"  data-date-format="yyyy-mm-dd">
                                                            <input type="text" name="datepickerfrom" class="form-control form-filter input-sm" readonly=""  placeholder="From">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-sm default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                </div>
                                            </div>    
                                           <div class="col-md-4 col-sm-4">
                                               <div class="form-group">
                                               <label class="control-label bold" for="input-date-end"> الى:</label>
                                              <div class="input-group date date-picker"  data-date-format="yyyy-mm-dd">
                                                            <input type="text" name="datepickerto" class="form-control form-filter input-sm" readonly=""  placeholder="To">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-sm default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                </div>
                                            </div>    
                                            </div>     
                                            <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-group">
                                                <label class="control-label bold">حالة الاوردر</label>
                                                <select name="inputstatus" id="input-status" class=" form-control">
                                                    <option value="yes">متاح</option>
                                                    <option value="no">ملغى</option>
                                                </select>
                                                </div>
                                            </div> 
                                            </div>
                                          
                                        <div class="row">    
                                            <div class="col-md-4 col-sm-4">
                                               
                                                <button type="button" class="btn green " name="filterBtn" id="filterBtn">
                                                   <li class="fa fa-search"></li> بحث
                                                </button>
                                               
                                            </div> 
                                        </div>      
                                        </form>
                                    </div>
                                                           <div id="realitv">
                                <div id="search_tabel">
                        </div>
                    </div>  
                                  
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                
      
<script type="text/javascript">
function formFilter(){
  var data = $("#search_form").serialize();
   // var form12 = document.forms.namedItem("brand_edit");
    // var data = new FormData(form12);
  $.ajax({
     url: '{{ url("reports/searchvsales") }}' ,
    type: 'get',
    data: data,
    success: function(data){        
      $("#search_tabel").html(data);
      $('.searchtablev').dataTable();
      $('#filterBtn').button('reset');
      //$('.tooltips').tooltip();
    },
    error: function(error){
      
    }
  });
};
$(document).ready(function(){


$("#filterBtn").click(formFilter);   
$("#filterBtn").trigger("click");  
});
               
                
      
</script>
     
    
<!-- END CONTAINER -->
@endsection

@section("page-plugin")
        <script src="{{asset('assets/admin/global/scripts/datatable.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>

@endsection

@section("page-level-script")
 <script src="{{asset('assets/admin/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/pages/scripts/ecommerce-orders.min.js')}}" type="text/javascript"></script>

@endsection



