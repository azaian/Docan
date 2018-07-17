
<!-- delete modal-->
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

    <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title"> مسح أوردر</h4>
      </div>
      <div class="modal-body">
        <p>هل تريد تأكيد عملية المسح ؟</p>
      </div>
      <div class="modal-footer">
        <a  href="{{URL('orders/'.'delete/'.$order->id)}}" class="btn btn red btn_delete"><li class="fa fa-trash"></li> مسح</a>
        <button type="button" class="btn btn-default" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>
      </div>
    
    </div>

  </div>
</div>
@include('orders._js')

<!-- status Modal -->
<div id="state" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <form  action="{{URL('orders/status')}}" method="post" >
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
        <button type="submit" name="submit" id="submit" class="btn btn green" ><li class="fa fa-plus"></li> اضافة</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>
        </div>
      </div>
      </form>
    </div>

  </div>
</div> 

 