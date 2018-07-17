<meta name="_token" content="{{ csrf_token() }}">
<!-- add modal -->
<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  id="addform" action="{{URL('attributes/create')}}" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اضافة متغير جديد</h4>
                </div>
                <div class="modal-body col-md-12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="control-label">اسم المتغير </label>
                                <ul class="nav nav-tabs">
                                    <li class="active ">
                                        <a href="#tab_1" data-toggle="tab" aria-expanded="true">    
                                            <img src="{{asset('assets/admin/global/img/flags/eg.png')}}">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#tab_2" data-toggle="tab" aria-expanded="true">    <img src="{{asset('assets/admin/global/img/flags/gb.png')}}">
                                        </a>
                                    </li>
                                </ul> 

                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab_1">
                                        <div class=" input-icon right">       
                                            <input type="text" id="name_ar" name="name_ar" value="" class="form-control required" >
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_2">
                                        <div class=" input-icon left"> 
                                            <input type="text" id="name_en" name="name_en"  class="form-control " >
                                        </div>
                                    </div>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="control-label"> نوع المتغير  </label>
                                <select name="type" class="form-control" >
                                    <option value="text">     text</option>
                                    <option value="dropdown"> dropdown </option>
                                </select>
                            </div>



                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="addbutton"  class="btn btn green" name="submit" value="submit"><li class="fa fa-check"></li> اضافة</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <li class="fa fa-times"></li> الغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End add modal -->


<!-- add value modal -->
<div id="addvalue" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form  id="addform" action="{{URL('attributes/add-value')}}" method="post" >
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">اضافة ٌيمة متغير</h4>
          </div>
          <div class="modal-body col-md-12">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="">اسم المتغير </label>
                    
                      <select name="attr_name" class="form-control">
                      @foreach($attributes as $all1)
                      @if(!empty($all1->attribute_translation('ar')->name))
                         
                      <option value="{{$all1->id}}"> {{$all1->attribute_translation('ar')->name}} </option>
                      
                      @endif
                      @endforeach
                     
                      </select> 
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">قيمة المتغير </label>
                      <ul class="nav nav-tabs">
                        <li class="active ">
                          <a href="#tab_11" data-toggle="tab" aria-expanded="true">    
                            <img src="{{asset('assets/admin/global/img/flags/eg.png')}}">
                          </a>
                        </li>
                        <li>
                          <a href="#tab_22" data-toggle="tab" aria-expanded="true"><img src="{{asset('assets/admin/global/img/flags/gb.png')}}">
                          </a>
                        </li>
                      </ul>
                                                            
                      <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab_11">
                          <div class=" input-icon right">       
                            <input type="text" id="value_ar" name="value_ar" value="" class="form-control required" >
                          </div>
                        </div>
                        <div class="tab-pane fade" id="tab_22">
                          <div class=" input-icon left"> 
                            <input type="text" id="value_en" name="value_en"  class="form-control " >
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
               
          </div>
          <div class="modal-footer">
            <button type="submit" id="valuebutton"  class="btn btn green" name="submit" value="submit"><li class="fa fa-check"></li> اضافة</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"> <li class="fa fa-times"></li> الغاء</button>
          </div>
        </form>
      </div>
    </div>
</div>
<!-- End add value modal -->



<!-- delete modal --> 
<div id="delete" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form  id="deleteform" action="{{URL('attributes/'.'delete/' . $all1->id)}}" method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">مسح عنصر</h4>
                </div>
                <div class="modal-body">
                    <p>هل تريد تأكيد عملية المسح ؟</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn red " value="submit"><li class="fa fa-trash"></li> مسح</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>
                </div>
            </form>  
        </div>

    </div>
</div>
<!-- End delete modal -->
