@extends('admin/master')

@section('title')
قيم المتغيرات
@endsection

@section("page-style")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap-rtl.css')}}" 
      rel="stylesheet" type="text/css" />

@endsection




@section("content-title")
<h3 class="page-title">قيم المتغيرات

</h3>  
@endsection
@section("content-navigat")
<ul class="page-breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="">الصفحة الرئيسية</a>
        <i class="fa fa-angle-left"></i>
    </li>
    <li>
       	<a href="#">قيم المتغيرات</a>
    </li>                   
</ul>
@endsection

@section('content')
@if(isset($errors)&&count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif


@if(Session::has('ok'))
<div class="alert alert-success">
    <strong>    </strong> تمت الاضافه بنجاح 
</div> 
{{ Session::forget('ok') }}
@endif

<div class="portlet box green ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-plus-circle"></i>اضافة قيمة متغير</div>
    </div>

    <div class="portlet-body" >
        <div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <a  data-target="#addvalue" class="btn btn green btnadd" data-toggle="modal" ><i class="fa fa-plus"></i>  اضافة قيمة متغير
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                   
                </div>
            </div> 
        </div> 
        <div id="reloaddiv">
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                <thead>
                    <tr>
                       
                        <th class="text-center"> اسم المتغير</th>
                        <th class="text-center"> قيمة المتغير</th>
                        <th class="text-center">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all as $all)
                    <tr>
                       
                        <td class="text-center">{{$all->attribute->attribute_translation('ar')->name}}</td>
                        <td class="text-center">{{$all->value}}</td> 
                        <td class="text-center">

                            <a id="{{$all->id}}"  data-target="#delete" class="btn green ">
                                <li class="fa fa-pencil">  تعديل</li>
                            </a>
                             <a id="{{$all->id}}" data-toggle="modal" data-target="#delete" class="btn btn-danger btndelete">
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

<!-- modals-->
@include("admin.pages.settings.attributes._modal")

@endsection
@section("page-plugin")
<script src="{{asset('assets/admin/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}" type="text/javascript"></script>

@endsection

@section("page-level-script")
<script src="{{asset('assets/admin/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
@endsection