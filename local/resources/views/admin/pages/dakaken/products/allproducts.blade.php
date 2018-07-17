@extends("admin/master")

@section("title")
المنتجات
@endsection

@section("page-style")
    <link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />        
    <link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
              rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
@endsection

@section("content-title")
 <h1 class="page-title"> اداره المنتجات</h1>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">الصفحة الرئيسية</a>
      <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">الدكاكين</a>
     <i class="fa fa-angle-left"></i> 
 </li>
 <li>
   <a href="#">عرض المنتجات</a>
 </li>
                         
</ul>
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
                                        <i class="fa fa-eye"></i>عرض المنتجات </div>
                                
                                </div>
                                
                                
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                               
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                
                                                <th class="text-center"> اسم المنتج</th>
                                          
                                     
                                                <th class="text-center">الصوره</th>
                                                <th class="text-center"> عمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($shops as $shop)
                                            @foreach($shop->product as $section)
                                          <tr class="odd gradeX">
                                                
                                                <td class="text-center">{{$section->product_trans('ar')->name}}</td>
                                                
                                                <td class="text-center">
                                                    <img src="{{URL("uploads/".$section->image."")}}" style="width:100px">
                                                </td>
                                                <td class="text-center">
                                               
                                                <a href="{{url('products/'.'delete/'.$section->id)}}"  data-toggle="modal" title=""
                                                 class="btn red  btn_show" data-original="">
                                                  <li class="fa fa-trash "> حذف </li>

                                                </a>
                               
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                      @endforeach
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




