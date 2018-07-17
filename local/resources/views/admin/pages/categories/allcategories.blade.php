@extends('admin/master')

@section('title')
الاقسام
@endsection


@section("page-style")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />        
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap-rtl.css')}}" 
      rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />    
@endsection



@section("content-title")
<h3 class="page-title"> الاقسام

</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">الصفحة الرئيسية</a>
        <i class="fa fa-angle-left"></i>
    </li>
    <li>
       	<a href="#">الاقسام</a>
    </li>                   
</ul>
@endsection

@section('content')

  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissable">
      <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
      <p>{{session()->get('success')}} </p>
    
    </div>
  @endif
      @if(Session::has('n'))
                       <?php $a=[];  $a=session()->pull('n');?>
     <div class="alert alert-danger" role="alert">{{$a[0]}} </div>
                @endif
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


<div class="portlet box green ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-eye"></i> عرض الاقسام</div>
    </div>

    <div class="portlet-body" >
        <div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <a  href="{{url('categories/add')}}" class="btn btn green" ><i class="fa fa-plus"></i>  اضافة قسم جديد
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
                    <th>
                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /> 
                    </th>
                    <th width="10%"> رقم القسم </th>
                    <th width="30%"> اسم القسم</th>
                    <th width="30%">القسم الرئيسي</th>


                    <th class="text-center">العمليات</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $cat)
                <?php $parent = App\Category_translation::where('category_id', $cat->perant_id)->pluck('name')->first(); ?>
                <tr>
                    <td>
                        <input type="checkbox" class="checkboxes" value="1" /> 
                    </td>
                    <td class="text-center"> {{ $cat->id}}</td>
                    <td class="text-center"> {{ $cat->cat_trans('ar')->name }} </td>
                    <td class="text-center"> {{ $parent }} </td>
                    <td>
                        <a href="{{url('categories/update/'.$cat->id)}}"  class="btn green btnedit" data-original="">
                            <li class="fa fa-pencil"> تعديل</li>
                        </a>
                        <a href="{{url('categories/delete/'.$cat->id)}}"    class="btn btn-danger btndelet"  >
                            <li class="fa fa-trash">  مسح</li>
                        </a>

                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>

    </div> 
</div> 

@endsection


@section("page-plugin")
<script src="{{asset('assets/admin/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}" type="text/javascript"></script>

@endsection

@section("page-level-script")
<script src="{{asset('assets/admin/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
@endsection


