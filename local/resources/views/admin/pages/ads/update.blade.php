@extends('admin/master')

@section('title')
الاعلانات
@endsection

@section('styles')

@endsection

@section('layoutscripts')

@endsection

@section('levelscripts')
@endsection

@section("content-title")
    <h3 class="page-title"> الاعلانات
   
    </h3>  
@endsection
@section("content-navigat")
<ul class="page-breadcrumb">
    <li>
   	 	<i class="icon-home"></i>
    	<a href="{{URL('/admin')}}">الصفحة الرئيسية</a>
    	<i class="fa fa-angle-left"></i>
    </li>
    <li>
       تعديل اعلان
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
        <div class="row">
              @if(Session::has('n'))
                       <?php $a=[];  $a=session()->pull('n');?>
    <div class="alert alert-danger">
                                      {{$a[0]}} </div>
     @endif
    <div class="col-md-12">
            <div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-pencil"></i>تعديل اعلان
                    </div>

                    <form role="form" action="{{URL('ads/update'.$old->id)}}" method="post" files="true" enctype="multipart/form-data">
                                                    <div class="form-body">
                                                        <div class="row">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">الرابط</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control input-circle" name='link' placeholder="" value="{{$old->address}}" required>
                                                               
                                                            </div>
                                                            </div>
                                                        </div>
                                                            <br>
                                                          
                                                    <img src="{{URL("upload/".$old->image."")}}">
                                                        <div class="row">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">الصوره</label>
                                                            <div class="col-md-4">
                                                                <input type="file" name="image" value="{{$old->image}}">
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                     <input type="hidden"  name="id" value="{{$old->id}}" >

                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green btn_save">تعديل</button>
                                                                <button type="button" class="btn default btn_save">الغاء</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                </div>
            </div>
        </div>
    </div>  



  @endsection