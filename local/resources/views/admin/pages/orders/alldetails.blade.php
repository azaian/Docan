@extends("admin/master")

@section("page-title")
المبيعات
@endsection

@section("content-title")
 <h1 class="page-title">المبيعات</h1>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">المبيعات</a>
    <i class="fa fa-angle-left"></i> 
 </li>
   <li>
   <a href="#">تفاصيل الاوردر</a>

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

 @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="portlet yellow box">
                                                            <div class="portlet-title">
                                                                <div class="caption">
                                                                    <i class="fa fa-cogs"></i>تفاصيل الاوردر</div>
                                                                
                                                            </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name"> رقم الاوردر: </div>
                                                            <div class="col-md-7 value">{{$record->id}}</div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">  التاريخ: </div>
                                                            <div class="col-md-7 value">{{$record->created_at}} </div>
                                                        </div>
                                                        
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">اجمالى السعر: </div>
                                                            <div class="col-md-7 value"> {{$record->total}} </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="portlet blue box">
                                                            <div class="portlet-title">
                                                                <div class="caption">
                                                                    <i class="fa fa-user"></i>تفاصيل العملاء </div>
                                                                
                                                            </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name"> اسم العميل: </div>
                                                            <div class="col-md-7 value">{{$record->users->name}}</div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name"> التليفون: </div>
                                                            <div class="col-md-7 value">{{$record->users->phone}}</div>
                                                        </div>
                                                        
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">الايميل: </div>
                                                            <div class="col-md-7 value">{{$record->users->email}} </div>
                                                        </div>

                                                    </div>
                                                        </div>
                                                    </div>
</div>

<div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="portlet green-meadow box">
                                                            <div class="portlet-title">
                                                                <div class="caption">
                                                                    <i class="fa fa-gift"></i>بيانات الشحن</div>
                                                                <div class="actions">
                                                                    <a class="btn btn-default btn-sm" href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </div>
                                                            </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name"> المحافظة: </div>
                                                            <div class="col-md-7 value">{{$ship->governate}}</div>
                                                        </div>

                                                        <div class="row static-info">
                                                            <div class="col-md-5 name"> المدينة: </div>
                                                            <div class="col-md-7 value">{{$ship->city}}</div>
                                                        </div>

                                                        <div class="row static-info">
                                                            <div class="col-md-5 name"> القرية: </div>
                                                            <div class="col-md-7 value">{{$ship->village}}</div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name"> العنوان بالتفصيل: </div>
                                                            <div class="col-md-7 value">{{$ship->addresse}}</div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name"> الرقم البريدى: </div>
                                                            <div class="col-md-7 value">{{$ship->post_num}}</div>
                                                        </div>

                                                    </div>
                                                </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                    <div class="portlet red-sunglo box">
                                                            <div class="portlet-title">
                                                                <div class="caption">
                                                                    <i class="fa fa-cogs"></i>طرق الدفع</div>
                                                            
                                                            </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name"> الدفع الحالى: </div>
                                                            <div class="col-md-7 value">{{$ship->payment}}</div>
                                                        </div>

                                                        <div class="row static-info">
                                                            <div class="col-md-5 name"> الدفع الالكترونى: </div>
                                                            <div class="col-md-7 value">paypal</div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
</div>
<div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                        <div class="portlet blue-hoki box">
                                                            <div class="portlet-title">
                                                                <div class="caption">
                                                                <i class="fa fa-cogs"></i>حالات الاوردر</div>
                                                                 </div>
                                                             
                                                            <div class="portlet-body">
                                                            <div class="row" style="margin-bottom:10px;">
                                                                      <div class="col-md-6">
                                                                         <div class="btn-group">
                                                                          <a href="#state" class="btn btn green" data-toggle="modal"> 
                                                                          <i class="fa fa-plus"></i>
                                                                              اضافة حالة
                                                                            </a>
                                                                         </div>
                                                                    
                                                                   </div>
                                                                   </div>

                                                                <div class="table-responsive">

                                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                                    <thead>
                                                                    <tr>
                                                                   
                                                                      <th width="15%"> حالات الاوردر</th>
                                                                      <th width="30%"> ملاحظات </th>
                                                                      <th> تاريخ الاضافة </th>
                                                                      <th> اسم المضيف</th>
                                                                      <th class="text-center"> العمليات </th>
                                                                      
                                                                    </tr>
                                                                    </thead>
                                                                <tbody>
                                                        @foreach($status as $status)
                                                            <tr class="odd gradeX">
                                                                <td>{{$status->status}}</td> 
                                                                <td>{{$status->notes}}</td> 
                                                                <td>{{$status->created_at}}</td>
                                                                <td>admin</td>
                                                                <td>
                                                                 <a href="#delete" data-toggle="modal"  class="btn red btn_delete" data-original title="مسح">
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
                                                    </div>
</div>
<div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="portlet blue-hoki box">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-cogs"></i>المنتجات </div>
                                                               
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-bordered table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center"> اسم المنتج</th>
                                                                <th class="text-center"> الكمية</th>
                                                                <th class="text-center"> السعر </th>
                                                                <th class="text-center">حالة المنتج</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($product as $pro)
                                                            <tr class="odd gradeX">

                                                            <td class="text-center">{{App\Products_translation::select('name')->where('product_id' , $pro->product_id)->value('name')}}</td>

                                                            <td class="text-center">{{$pro->quantity}}</td>
                                                            <td class="text-center">{{$pro->price}}</td>
                                                            <td class="text-center">{{$status->status}}</td>

                                                            </tr>
                                                             @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
</div>
       


<div class="row">
 
    <div class="col-md-6">
        <div class="portlet white box">
           
                <div class="portlet-body">
                                <div class="row static-info">
                                    <div class="col-md-8 name"> اجمالى السعر: </div>
                                    <div class="col-md-3 value"> 200</div>
                                </div>
                                <div class="row static-info ">
                                    <div class="col-md-8 name"> تكلفة الشحن: </div>
                                    <div class="col-md-3 value"> 20 </div>
                                </div>
                                <div class="row static-info ">
                                    <div class="col-md-8 name"> كوبون خصم: </div>
                                    <div class="col-md-3 value"> 40 </div>
                                </div>
                                <div class="row static-info ">
                                    <div class="col-md-8 name"> اجمالى الكل: </div>
                                    <div class="col-md-3 value"> 40 </div>
                                </div>
                                                            
                </div>                                           
            
        </div>
    </div> 
</div>
<div class="row">
    <div class="col-md-12"> 
        <div class="btn-group">
            <a href="{{URL('orders/index')}}" class="btn btn blue-hoki"> 
              عودة كل الاوردرات <i class="fa fa-mail-reply"></i> </a>
        </div>                                        
    </div>
</div>                                               
                                                

 
<!-- add status Modal -->
<div id="state" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form action="{{URL('orders/status/'.$record->id)}}" method="post">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">اضافة حالة جديدة</h4>
      </div>
    <div class="modal-body col-md-12">
       <div class="row">
         <input type="hidden" name="order_id" value="order_id">
       </div>
        <div class="row">
             <div class="col-md-9">
               <label class="control-label">حالة الاوردر</label>
                <div class=" input-icon right">
                
                <select type="text" id="status" name="status" class="form-control">
                    <option value="جديد"> جديد</option>
                    <option value="جارى الشحن"> جارى الشحن</option>
                    <option value="تم التسليم"> تم التسليم</option>
                    <option value="مكتمل"> مكتمل</option>
                    <option value="ملغى"> ملغى</option>
                    <option value="مرتجع"> مرتجع</option>
                    <option value="انتهى الوقت"> انتهى الوقت</option>
                    <option value="محجوز"> محجوز</option>
               </select>
              
                </div>
             </div>
        </div>
        <div class="row">
            <div class="col-md-9">
               <label class="control-label"> ملاحظات</label>
                
                <textarea type="text" id="notes" name="notes" class="form-control"> </textarea>
            </div>
         </div>
    </div>     
      <div class="modal-footer">
        <div class="col-md-12">
        <button type="submit" name="submit" id="submit" class="btn btn green" ><i class="fa fa-plus"></i> اضافة</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> الغاء</button>
        </div>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- delete status Modal -->
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title"> مسح حالة</h4>
      </div>
      <div class="modal-body">
        <p>هل تريد تأكيد عملية المسح ؟</p>
      </div>
      <div class="modal-footer">
        <a  href="{{URL('orders/'.'delete-status/'.$status->id)}}" class="btn btn red btn_delete"><li class="fa fa-trash"></li> مسح</a>
        <button type="button" class="btn btn-default" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>
      </div>
    
    </div>

  </div>
</div>
    @endsection