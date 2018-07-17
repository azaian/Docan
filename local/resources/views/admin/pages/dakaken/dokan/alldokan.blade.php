@extends("admin/master")

@section("title")
الدكاكين
@endsection 

@section("page-style")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />        
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap-rtl.css')}}" 
      rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
@endsection




@section("content-title")
<h1 class="page-title"> اداره الدكاكين</h1>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="">الصفحة الرئيسية</a>
        <i class="fa fa-angle-left"></i>
    </li>
    <li>
        <a href="#">الدكاكين</a>
        <i class="fa fa-angle-left"></i> 
    </li>
    <li>
        <a href="#">عرض الدكاكين</a>
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
                    <i class="fa fa-eye"></i>عرض الدكاكين 
                </div>
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

                            <th class="text-center"> اسم الدكان</th>

                            <th class="text-center"> الصوره</th>

                            <th class="text-center"> العمليات</th>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach($sections as $section)
                        @if(!empty($section->shops_trans('ar')))
                        <tr class="odd gradeX">
                            <td class="text-center">{{$section->shops_trans('ar')->name}}</td>
                            <td class="text-center"> 
                                <img src="{{URL('uploads/'.$section->logo.'')}}" style="width:100px;">
                            </td>


                            <td class="text-center">
                                <a href="{{url('dakaken/'.'delete/'.$section->id)}}"  data-toggle="modal" title=""
                                   class="btn red  btn_show" data-original="">
                                    <li class="fa fa-trash "> حذف </li>
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endforeach

                    </tbody>
                </table>   
            </div>


        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>

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
