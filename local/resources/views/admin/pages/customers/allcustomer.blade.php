@extends("admin/master")

@section("title")
العملاء
@endsection

@section("page-style")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />        
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap-rtl.css')}}" 
      rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
@endsection

@section("content-title")
<h1 class="page-title">العملاء</h1>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">الصفحة الرئيسية</a>
        <i class="fa fa-angle-left"></i>
    </li>
    <li>
        <a href="#">العملاء</a>

    </li>

</ul>
@endsection






@section('content')

<!-- BEGIN CONTAINER -->

<!-- BEGIN CONTENT -->
<meta name="_token" content="{{ csrf_token() }}">   
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">


            <div class="portlet-title">

                <div class="caption">
                    <i class="fa fa-eye"></i>عرض العملاء </div>

            </div>


            <div class="portlet-body">
                <div  class="alert alert-danger display-none">
                    <ul>

                        <li>
                            لم يتم ادخال البيانات بشكل صحيح 
                        </li>

                    </ul>
                </div>
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="{{url('customers/customer')}}" class="btn btn green" data-toggle="modal"> 
                                    <i class="fa fa-plus"></i>
                                    اضافة عميل 
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
                <div class="well table-toolbar ">
                    <form method="get" id="search_form" action="{{url('customers/search')}}">

                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label bold">اسم العميل</label>
                                    <input type="search" name="name" autocomplete="on" class="form-control input large input-large input-inline" aria-controls="sample">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label bold">الايميل</label>
                                    <input type="search" name="email" autocomplete="on" class="form-control input large input-large input-inline" aria-controls="sample">
                                </div>
                            </div>

                        </div>    
                        <div class="row">    
                            <div class="col-md-4 col-sm-4">

                                <button type="submit" id="filterBtn" class="btn green demo-loading-btn">
                                    <li class="fa fa-search"></li> بحث
                                </button>

                            </div> 
                        </div>
                    </form>
                </div> 
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                        <tr> 

                            <th class="text-center"> اسم العميل </th>
                            <th class="text-center"> التليفون </th>
                            <th class="text-center"> الايميل </th>
                            <th class="text-center"> العمليات</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($sections as $section)

                        <tr class="odd gradeX">
                            <td class="text-center">{{$section->name}}</td>
                            <td class="text-center">{{$section->phone}}</td>
                            <td class="text-center">{{$section->email}}</td>
                            <td class="text-center">
                                <a href="{{url('customers/'.'edit/'.$section->id)}}"  data-toggle="modal" title=""
                                   class="btn green update" data-original="">
                                    <li class="fa fa-pencil ">  تعديل </li>
                                </a>
                                <a href="{{url('customers/'.'delete/'.$section->id)}}"  data-toggle="modal" title=""
                                   class="btn red  btn_show" data-original="">
                                    <li class="fa fa-trash "> حذف </li>
                                </a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>




            </div>
           
        </div>

    </div>

    <!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>

<!--Model--> 

<!-- END CONTAINER -->
@endsection

@section("page-plugin")
<script src="{{asset('assets/admin/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}" type="text/javascript"></script>

@endsection

@section("page-level-script")
<script src="{{asset('assets/admin/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
@endsection


