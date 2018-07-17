@extends("admin/master")

@section("title")
شركات التوصيل
@endsection

@section("page-style")
    <link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap-rtl.css')}}"
              rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section("content-title")
 <h1 class="page-title">شركات التوصيل</h1>
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">شركات التوصيل</a>

 </li>

</ul>
@endsection

@section('styles')

<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" rel="stylesheet" type="text/css" />

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
                                        <i class="fa fa-eye"></i>  عرض شركات التوصيل</div>

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
                                                    <a href="{{url('delivery/adddelivery/')}}" class="btn btn green" data-toggle="modal">
                                                        <i class="fa fa-plus"></i>
                                                        اضافة شركة توصيل
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                               
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th class="text-center"> اسم الشركة </th>
                                                <th class="text-center"> قيمة الشحن </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($deliveries as $delivery)
                                          <tr class="odd gradeX">
                                              <td class="text-center">{{$delivery->name}}</td>
                                              <td class="text-center">{{$delivery->charge}}</td>
                                              <td class="text-center">
                                                <a href="{{url('delivery/deletedelivery/' . $delivery->id)}}"  data-toggle="modal" title=""
                                                    class="btn red  btn_show" data-original="">
                                                    <li class="fa fa-trash "> حذف </li>
                                                  </a>
                                                  <a href="{{url('delivery/editdelivery/' . $delivery->id)}}"  data-toggle="modal" title=""
                                                    class="btn green update" data-original="">
                                                    <li class="fa fa-pencil ">  تعديل </li>
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
