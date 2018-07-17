@extends("admin/master")

@section("title")
سوق الجمعه
@endsection

@section("page-style")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />        
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap-rtl.css')}}" 
      rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
@endsection


@section("content-title")
<h1 class="page-title"> سوق الجمعه</h1>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">الصفحة الرئيسية</a>
        <i class="fa fa-angle-left"></i>
    </li>
    <li>
        <a href="#">سوق الجمعه</a>
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
            @if(Session::has('n'))
            <?php $a = [];
            $a = session()->pull('n'); ?>
            <div class="alert alert-danger" role="alert">{{$a[0]}} </div>
            @endif

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
                            <th class="text-center" width="20%"> اسم المنتج</th>
                            <th class="text-center" width="20%"> اسم العميل:</th>
                            <th class="text-center" width="20%">  السعر:</th>
                            <th class="text-center" width="20%">  الظهور:</th>
                            <th class="text-center"> العمليات</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections as $section)

                        <tr class="odd gradeX">
                            <td class="text-center">{{$section->prod->product_trans('ar')->name}}</td>
                            <td class="text-center">{{$section->user->name}}</td>
                            <td class="text-center">{{$section->prod->price}}</td>
                            <td><form method="post" action="{{URL('adminsouq/change/'.$section->id)}}">
                                     <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                                    <select name="active">
                                        <option value="{{$section->prod->active}}">{{$section->prod->active}}</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>

                                    </select>
                                    <button type="submit"><i class="fa fa-pencil">
                                        </i>
                                    </button>
                                    
                                </form></td>
                            <td>

                                <a href="{{URL('adminsouq/delete/'.$section->id)}}"  
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


