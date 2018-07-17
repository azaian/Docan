@extends("admin/master")

@section("title")
العملاء
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
                            <i class="icon-plus"></i>اضافة عميل
                        </div>
                    </div>

                    <div  class="portlet-body form">
                            <form method="post" name="settingform"   id="settingform" class="horizontal-form" action="{{url('customers/'.'update/'.$old->id)}}">
                                <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                                    <div class="form-body">
                   <h3 class="form-section">معلومات اساسية</h3> 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label bold">اسم العميل <span style="color:red;">*</span></label>
                            
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="tab_1">
                                    <div class=" input-icon right">       
                                      <input type="text" id="ar_name" name="ar_name" value="{{$old->name}}" class="form-control required" >
                                    </div>
                                  </div>
                                
                            </div>
                         </div>
                      </div>
                    </div>
                    
                                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label bold">اسم الدكان</label>
                            <div class="input-icon right">
                              <input type="text" class="form-control" onblur="myfunctionname()" name="name" value="{{$old->dokan}}">
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label bold"> الايميل</label>
                            <div class="input-icon right">
                              <input type="email" onblur="myfunctionemail()" class="form-control"  name="email" value="{{$old->email}}">
                            </div>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label bold"> رقم التليفون</label>
                            <div class="input-icon right">
                              <input type="text" class="form-control" onblur="myfunctionphone()" name="phone" value="{{$old->phone}}">
                            </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label bold">البلد</label>
                            <div class="input-icon right">
                              <input type="text" class="form-control" onblur="myfunctioncountry()" name="country" value="{{$old->country}}">
                            </div>
                          </div>
                        </div>
                      </div>  
                            
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label bold">العنوان</label>
                            <div class="input-icon right">
                              <input type="text" class="form-control" onblur="myfunctionaddress()" name="address" value="{{$old->address}}">
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label bold">كلمه المرور</label>
                            <div class="input-icon right">
                              <input type="password" class="form-control" onblur="myfunctionaddress()" name="password" value="{{$old->password}}">
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label bold">الصوره</label>
                            <div class="input-icon right">
                              <input type="file" class="form-control"  name="image" value="img src="{{url("upload/" . $old->image. "")}}"">
                            </div>
                        </div>
                      </div>
                    </div>
                    </div>            
                                    <div class="form-actions">
                                        <div class="col-md-12 text-center" >
                                            <button type="submit" class="btn green btn_save">
                                                <i class="fa fa-check"></i> تعديل</button>
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