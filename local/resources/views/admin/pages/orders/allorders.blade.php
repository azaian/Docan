@extends("admin/master")

@section("page-title")
المبيعات
@endsection 

@section("page-style")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />        
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap-rtl.css')}}" 
      rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
@endsection

@section("content-title")
<h1 class="page-title">المبيعات</h1>  
@endsection  

@section("content-navigat")
<ul class="page-breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">الصفحة الرئيسية</a>
        <i class="fa fa-angle-left"></i>
    </li>
    <li>
        <a href="#">المبيعات</a>
        <i class="fa fa-angle-left"></i> 
    </li>
    <li>
        <a href="#">كل المبيعات</a>

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

@if(Session::has('m'))

<div class="container msgerror ">
    <?php $a;
    $a = session()->pull('m'); ?>
    <div class="alert alert-{{$a[0]}}">{{$a[1]}}</div>
</div>

@endif   

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">


            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-eye"></i>عرض المبيعات </div>

            </div>


            <div class="portlet-body">

                <div class="table-toolbar">

                    <div class="row">

                        <div class="col-md-12">
                            
                        </div>
                    </div>
                </div>

                <div class="well table-toolbar">
                    <form id="searchform" action="{{url('orders/search')}}" name="searchform" method="get">

                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label bold">رقم الاوردر</label>
                                    <input name="order_no" type="search" autocomplete="on" class="form-control input large input-large input-inline" aria-controls="sample">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label bold">الحالة</label>
                                    <select name="state" type="search" autocomplete="on" class="form-control input large input-large input-inline" aria-controls="sample">
                                        <option></option>
                                        <option value="جديد"> جديد</option>
                                        <option value="جارى الشحن"> جارى الشحن</option>
                                        <option value="تم التسليم"> تم التسليم</option>
                                        <option value="مكتمل"> مكتمل</option>
                                        <option value="ملغى"> ملغى</option>
                                        <option value="مرتجع"> مرتجع</option>
                                        <option value="انتهى الوقت"> انتهى الوقت</option>
                                        <option value="محجوز"> محجوز</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label class="control-label bold">اسم العميل</label>
                                    <input name="cname" type="search" autocomplete="on" class="form-control input large input-large input-inline" aria-controls="sample">
                                </div>
                            </div>

                        </div>    
                        <div class="row">    
                            <div class="col-md-4 col-sm-4">

                                <button type="submit" class="btn green" id="filter">
                                    <li class="fa fa-search"></li> بحث
                                </button>

                            </div> 
                        </div>  
                    </form>    
                </div>



                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" class="group-checkable text-center" data-set="#sample_1 .checkboxes" /> </th>
                            <th> رقم الاوردر</th>
                            <th width="10%"> اسم العميل </th>
                            <th> الاجمالى </th>
                            <th class="text-center"> العمليات </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($all as $order)
                        <tr class="odd gradeX">
                            <td class="text-center">
                                <input type="checkbox" class="checkboxes" value="1" /> </td>
                            <td> 

                                {{$order->id}}
                            </td>

                            <td>{{$order->users->name}}</td>
<!--                                                <td>{{$order->status}}</td>-->
                            <td class="center">{{$order->total}}</td>

                            <td>
                                <a href="{{URL('orders/'.'view-details/'.$order->id)}}" data-toggle="tooltip" title class="btn btn blue" data-original title="عرض">
                                    <li class="fa fa-eye"> عرض</li>
                                </a>

                                <a id="{{$order->id}}" class="btn red btn_delete" data-original title="مسح">
                                    <li class="fa fa-trash">  مسح</li>
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



<!-- Modal -->
<div id="delet_model">

</div>
<div id="editmodel">

</div>


@endsection


@section("page-plugin")
<script src="{{asset('assets/admin/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootbox/bootbox.min.js')}}" type="text/javascript"></script>

@endsection

@section("page-level-script")
<script src="{{asset('assets/admin/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
@endsection

