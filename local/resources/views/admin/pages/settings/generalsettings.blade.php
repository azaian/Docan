@extends('admin/master')

@section('title')
  الاعدادات العامة
@endsection

@section('styles')

@endsection

@section('layoutscripts')

@endsection

@section('levelscripts')
@endsection

@section("content-title")
    <h3 class="page-title"> الاعدادات العامة

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
       	<a href="#">الاعدادات العامة</a>
    </li>
</ul>
@endsection

@section('content')
@if(session()->has('success'))
   <div class="alert alert-success alert-dismissable">
      <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
      <p>{{session()->get('success')}} </p>

    </div>
@elseif (session()->has('danger'))
   <div class="alert alert-danger alert-dismissable">
      <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
      <p>{{session()->get('danger')}} </p>

    </div>
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
<div class="row">
  <div class="col-md-12">
		<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
			<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-settings"></i>الاعدادات العامة
						</div>
					</div>

					  <div class="portlet-body form">
							  <form method="post" action="{{route('editGeneralSettings')}}" class="horizontal-form" enctype="multipart/form-data">
								     <input type="hidden"  name="_token" value="{{ csrf_token() }}">
									<div class="form-body">
                      <h3 class="form-section">البيانات العامة</h3>
										        <div class="row">
											        <div class="col-md-6">
                      							<div class="form-group">
                          							<label class="control-label">اسم المتجر<span style="color:red;">*</span></label>
                           							<ul class="nav nav-tabs">
                               							<li class="active ">
                                   						<a href="#tab_1" data-toggle="tab" aria-expanded="true">	<img src="{{asset('assets/admin/global/img/flags/eg.png')}}">
                                    					</a>
                                						</li>
                               							<li>
                                  						<a href="#tab_2" data-toggle="tab" aria-expanded="true">	<img src="{{asset('assets/admin/global/img/flags/gb.png')}}">
                                   						</a>
                               							</li>
                          							</ul>
                            						<div class="tab-content">
                                						<div class="tab-pane fade active in" id="tab_1">
                                							<div class=" input-icon right">
                                     							<input type="text" id="ar_name" name="ar_name" value="{{$data['ar_name']}}" class="form-control">
                                   							</div>
                                  						</div>
                                						<div class="tab-pane fade" id="tab_2">
                                							<div class=" input-icon right">
                                								<input type="text" id="en_name" name="en_name" value="{{$data['en_name']}}" class="form-control">
                                							</div>
                                						</div>
                            						</div>
                         						</div>
                      				</div>
											        <div class="col-md-6">
                      							<div class="form-group">
                          							<label class="control-label">العنوان<span style="color:red;">*</span></label>
                           							<ul class="nav nav-tabs">
                               							<li class="active ">
                                   						<a href="#tab_3" data-toggle="tab" aria-expanded="true">	<img src="{{asset('assets/admin/global/img/flags/eg.png')}}">
                                    					</a>
                                						</li>
                               							<li>
                                  						<a href="#tab_4" data-toggle="tab" aria-expanded="true">	<img src="{{asset('assets/admin/global/img/flags/gb.png')}}">
                                   						</a>
                               							</li>
                          							</ul>
                            						<div class="tab-content">
                                						<div class="tab-pane fade active in" id="tab_3">
                                							<div class=" input-icon right">
                                     							<input type="text" id="ar_address" name="ar_address" value="{{$data['ar_address']}}" class="form-control">
                                   							</div>
                                  						</div>
                                						<div class="tab-pane fade" id="tab_4">
                                							<div class=" input-icon right">
                                								<input type="text" id="en_address" name="en_address" value="{{$data['en_address']}}" class="form-control">
                                							</div>
                                						</div>
                            						</div>
                         						</div>
                      				</div>

										        </div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">رقم التليفون</label>
														<div class="input-icon right">
															<input type="text" id="phone" name="phone" value="{{$data['phone']}}" class="form-control number" >
                              <span class="warning-block">مسموح بالارقام فقط</span>
														</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">الايميل</label>
														<div class="input-icon right">
															<input type="email" id="email" value="{{$data['email']}}" name="email" value=""  class="form-control" >
														</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">قيمة الشحن</label>
														<div class="input-icon right">
															<input type="number" id="charge" name="charge" value="{{$data['charge']}}"  class="form-control  number" >
														</div>
												</div>
												<div class="form-group">
													<label class="control-label">لوجو المتجر <span style="color: red;">*</span></label>
														<div class="input-icon right">
															<input type="file" id="logo" name="logo" class="form-control" >
														</div>
												</div>
											</div>
										</div>
										<hr />

										<h3 class="form-section">مواقع التواصل الاجتماعى</h3>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">FB</label>
														<input type="text" name="facebook" value="{{$data['facebook']}}" class="form-control " >
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">TW</label>
														<input type="text" name="twitter" value="{{$data['twitter']}}" class="form-control">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">G+</label>
														<input type="text" name="googleplus" value="{{$data['googleplus']}}" class="form-control " >
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Youtube</label>
														<input type="text" name="youtube" value="{{$data['youtube']}}" class="form-control " >
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Instagram</label>
														<input type="text" name="instagram" value="{{$data['instagram']}}" class="form-control " >
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Snapchat</label>
														<input type="text" name="snapchat" value="{{$data['snapchat']}}" class="form-control " >
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Linkedin</label>
														<input type="text" name="linkedin" value="{{$data['linkedin']}}" class="form-control " >
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">WhatsApp</label>
														<input type="text" name="whatsapp" value="{{$data['whatsapp']}}" class="form-control " >
												</div>
											</div>
										</div>

									    <h3 class="form-section">معلومات SEO</h3>
									            <div class="row">
									              <div class="col-md-6">
                      							<div class="form-group">
                          							<label class="control-label">مفتاح ال Meta</label>
                           							<ul class="nav nav-tabs">
                               							<li class="active ">
                                   						<a href="#tab_1" data-toggle="tab" aria-expanded="true">	<img src="{{asset('assets/admin/global/img/flags/eg.png')}}">
                                    					</a>
                                						</li>
                               							<li>
                                  						<a href="#tab_2" data-toggle="tab" aria-expanded="true">	<img src="{{asset('assets/admin/global/img/flags\gb.png')}}">
                                   						</a>
                               							</li>
                          							</ul>
                            						<div class="tab-content">
                                						<div class="tab-pane fade active in" id="tab_1">
                                							<div class=" input-icon right">
                                     							<input type="text" id="ar_name" name="meta_keyword" value="{{$data['meta_keyword']}}" class="form-control " >
                                   							</div>
                                  						</div>
                                						<div class="tab-pane fade" id="tab_2">
                                							<div class=" input-icon right">
                                								<input type="text" id="" name=""  class="form-control " >
                                							</div>
                                						</div>
                            						</div>
                         						</div>
                      					</div>
                      			  </div>

										    <div class="row">
									        <div class="col-md-6">
                      							<div class="form-group">
                          							<label class="control-label">عنوان ال Meta</label>
                           							<ul class="nav nav-tabs">
                               							<li class="active ">
                                   						<a href="#tab_1" data-toggle="tab" aria-expanded="true">	<img src="{{asset('assets/admin/global/img/flags/eg.png')}}">
                                    					</a>
                                						</li>
                               							<li>
                                  						<a href="#tab_2" data-toggle="tab" aria-expanded="true">	<img src="{{asset('assets/admin/global/img/flags\gb.png')}}">
                                   						</a>
                               							</li>
                          							</ul>
                            						<div class="tab-content">
                                						<div class="tab-pane fade active in" id="tab_1">
                                							<div class=" input-icon right">
                                     							<input type="text" id="ar_name" name="meta_title" value="{{$data['meta_title']}}" class="form-control " >
                                   							</div>
                                  						</div>
                                						<div class="tab-pane fade" id="tab_2">
                                							<div class=" input-icon right">
                                								<input type="text" id="" name=""  class="form-control " >
                                							</div>
                                						</div>
                            						</div>
                         						</div>
                      		</div>
                      	</div>

										    <div class="row">
									        <div class="col-md-6">
                      							<div class="form-group">
                          							<label class="control-label">وصف ال Meta</label>
                           							<ul class="nav nav-tabs">
                               							<li class="active ">
                                   						<a href="#tab_1" data-toggle="tab" aria-expanded="true">	<img src="{{asset('assets/admin/global/img/flags/eg.png')}}">
                                    					</a>
                                						</li>
                               							<li>
                                  						<a href="#tab_2" data-toggle="tab" aria-expanded="true">	<img src="{{asset('assets/admin/global/img/flags\gb.png')}}">
                                   						</a>
                               							</li>
                          							</ul>
                            						<div class="tab-content">
                                						<div class="tab-pane fade active in" id="tab_1">
                                							<div class=" input-icon right">
                                     							<textarea type="text" id="ar_name" name="meta_description" value="" class="form-control " >{{$data['meta_description']}}</textarea>
                                   							</div>
                                  						</div>
                                						<div class="tab-pane fade" id="tab_2">
                                							<div class=" input-icon right">
                                								<textarea type="text" id="" name="" class="form-control " ></textarea>
                                							</div>
                                						</div>
                            						</div>
                         						</div>
                      		</div>
                        </div>
                  </div>

								  <div class="form-actions">
									  <div class="col-md-12 text-center" >
											<button type="submit" name="submit" class="btn green btn_save">
                      <i class="fa fa-check"></i> حفظ</button>
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

<div class="clearfix"></div>
@endsection
