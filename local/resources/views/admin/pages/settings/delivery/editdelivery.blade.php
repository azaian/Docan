@extends("admin/master")

@section("title")
اضافة شركة توصيل
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

<link href="{{asset('assets/admin/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
            <div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-plus"></i>تعديل شركة الشحن
                        </div>
                    </div>

                    <div  class="portlet-body form">
                            <form method="post" name="settingform"   id="settingform" class="horizontal-form" action="{{url('delivery/editdelivery/' . $old_delivery->id)}}" files="true" enctype="multipart/form-data">
                                <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                                    <div class="form-body">
                   <h3 class="form-section">معلومات اساسية</h3>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label bold">اسم الشركة <span style="color:red;">*</span></label>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="tab_1">
                                    <div class=" input-icon right">
                                      <input type="text" id="name" name="name" value="{{$old_delivery->name}}" class="form-control " >
                                    </div>
                                  </div>

                            </div>
                         </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label bold">قيمة الشحن</label>
                            <div class="input-icon right">
                              <input type="text" class="form-control" value="{{$old_delivery->charge}}" name="charge" id="charge">
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label bold">لوجو الشركة</label>
                            <div class="input-icon right">
                              <input type="file" class="form-control"  name="logo" id="logo">
                            </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="form-actions">
                        <div class="col-md-12 text-center" >
                            <button type="submit" class="btn green btn_save">
                                <i class="fa fa-check"></i>تعديل</button>
                            <button type="button" class="btn default btn_save">
                                <i class="fa fa-times"></i> الغاء</button>
                        </div>
                    </div>
                            </form>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection

@section('page-script')

<script src="{{asset('assets/admin/admin/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/admin/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
@endsection

@section('page-level-script')
<script src="{{asset('assets/admin/admin/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
@endsection
