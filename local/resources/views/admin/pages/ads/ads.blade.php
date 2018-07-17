@extends("admin/master")

@section("title")
الاعلانات 
@endsection

@section("page-style")
    <link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />        
    <link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
              rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
@endsection

@section("content-title")
 <h1 class="page-title"> الاعلانات</h1>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="{{URL('/admin')}}">الصفحة الرئيسية</a>
      <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">الاعلانات</a>
     <i class="fa fa-angle-left"></i> 
 </li>
 <li>
   <a href="#">عرض الاعلانات</a>
 </li>
                         
</ul>
@endsection


@section('content')

            <div class="row">
                @if(Session::has('m'))
                       <?php $a=[];  $a=session()->pull('m');?>
                  <div class="alert alert-success">
                                        {{$a[0]}} </div>
                @endif
                @if(Session::has('n'))
                       <?php $a=[];  $a=session()->pull('n');?>
                  <div class="alert alert-danger">
                                      {{$a[0]}} </div>
                @endif
              <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green ">
                                <div class="portlet-title">
                                    <div class="caption ">
                                        <i class="icon-layers"></i>
                                        <span class="caption-subject bold uppercase"> عرض الداتا </span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <button href="#sample" data-toggle="modal"  class="btn sbold green"> اضافه
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group pull-right">
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                          <tr>
                                             
                                            <th class="text-center">الرابط</th>
                                            <th class="text-center">الصوره</th>
                                            <th class="text-center">العمليات</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ads as $ad)
                                          <tr class="odd gradeX">  
                                            <td class="text-center">{{$ad->link}}</td>
                                            <td class="text-center">
                                              <img src="{{URL( 'uploads/'.$ad->image.'')}}" style="width:100px;">
                                            </td>
                                            <td class="text-center">
                                                <a href="{{URL('ads/'.'edit/'.$ad->id)}}" class="btn btn-success" ><li class="fa fa-pencil"> تعديل</li> </a>
                                                <a href="{{URL('ads/'.'delete/'.$ad->id)}}" class="btn btn-danger"><li class="fa fa-trash">  حذف</li> </a>
                                            </td>
                                            
                                          </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
              </div>
            </div>

<!-- Modal -->
<div id="sample" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
  <div class="modal-content">
    <form role="form" action="{{URL('ads/store')}}" method="post" class="form-horizontal" files="true" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">اضافه اعلان</h4>
      </div>
      <div class="modal-body col-md-12" style="margin-right:20px;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">الرابط </label>
                      <input type="text" class="form-control required" name="link" placeholder="" required>
                  </div>
                </div>
              </div>
         
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">الصورة </label>
                      <input type="file" class="form-control required" name="image" >
                  </div>
                </div>
              </div>
      </div>
 
      <div class="modal-footer">
         
             <button type="submit" class="btn green btn_save">  <i class="fa fa-check"></i> حفظ</button>
             <button type="button" class="btn default btn_save" data-dismiss="modal">  
             <i class="fa fa-times"></i> الغاء</button>
        
      </div>
    </form>
  </div>

  </div>
</div>       

@endsection


@section("page-plugin")
        <script src="{{asset('assets/admin/global/scripts/datatable.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>

@endsection

@section("page-level-script")
 <script src="{{asset('assets/admin/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
@endsection

