@extends('admin/master')

@section('title')
الاقسام
@endsection



@section("content-title")
<h3 class="page-title"> الاقسام

</h3>  
@endsection

@section('page-style')

<link href="{{asset('assets/admin/global/plugins/bootstrap-select/css/bootstrap-select-rtl.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/admin/global/plugins/jquery-multi-select/css/multi-select-rtl.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/admin/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/admin/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="">الصفحة الرئيسية</a>
        <i class="fa fa-angle-left"></i>
    </li>
    <li>
       	<a href="#">اضافة قسم</a>
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
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">

           
          
         @if(Session::has('n'))
                       <?php $a;  $a=session()->pull('n');?>
     <div class="alert alert-danger" role="alert">{{$a[0]}} </div>
                @endif
          @if(Session::has('ok'))
              <div class="alert alert-success">
                    <strong>    </strong> تمت الاضافه بنجاح 
              </div> 
           {{ Session::forget('ok') }}
          @endif
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
                 
                    <div class="portlet box green">
                    <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-plus"></i>
                                    اضافة قسم
                                </div>
                            </div>


                <div  class="portlet-body form">
                    <form method="post" name="settingform" action="{{url('categories/create')}}"  id="settingform" class="horizontal-form">
                        <input type="hidden"  name="_token" value="{{ csrf_token() }}">

                        <div class="form-body">
                            <h3 class="form-section">اضافة قسم</h3>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            اسم القسم

                                            <span style="color:red;">*</span>
                                        </label>

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
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label ">
                                            القسم الرئيسي 
                                        </label>

                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="tab_11">

                                                <select class="form-control" name="parent">
                                                    <option value="null">رئيسي </option>    
                                                    <?php $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>

                                                    @foreach($categories as $maincat)
                                                    @if(!empty($maincat->cat_trans('ar')))

                                                    @if($maincat->perant_id==0)            
                                                    <option value="{{$maincat->id}}">
                                                        {{$maincat->cat_trans('ar')->name}}
                                                    </option>

                                                    @if(!$maincat->subcat->isEmpty())
                                                    @foreach ($maincat->subcat as $sub1)
                                                    @if(!empty($sub1->cat_trans('ar')))

                                                    <option value="{{$sub1->id}}">
                                                        {{ $space.$sub1->cat_trans('ar')->name}}
                                                    </option>

                                                    @endif
                                                    @endforeach
                                                    @endif

                                                    @endif
                                                    @endif            
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label ">
                                            نوع القسم                                           
                                        </label>
                                        <select class="form-control" name="type" >
                                            <option value="product" > product</option>
                                            <option value="adv" > ADV</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label ">
                                             الايقونه                                            
                                        </label>
                                       
                                        <input class="form-control" type="text" name="icon" />
                                    </div>
                                </div>
                            </div>

                            <hr />
                            <h3 class="form-section"> متغيرات الاقسام  </h3> 

                            <div class="row">    
                                <div class="form-group">
                                    <label class="control-label col-md-3">المتغيرات </label>
                                    <div class="col-md-9">
                                        <select multiple="multiple" class="multi-select" id="my_multi_select1" name="attributes[]">
                                            @foreach($attr as $attr)                
                                            <option value="{{$attr->attribute_id}}">{{$attr->name}}</option>
                                            @endforeach    

                                        </select>
                                    </div>
                                </div>             
                            </div>

                            <hr />
                            <h3 class="form-section">معلومات SEO</h3> 
                            <div class="row">  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">مفتاح ال Meta</label>
                                        <ul class="nav nav-tabs">
                                            <li class="active ">
                                                <a href="#tab_3" data-toggle="tab" aria-expanded="true">    <img src="{{asset('assets/admin/global/img/flags/eg.png')}}">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab_33" data-toggle="tab" aria-expanded="true">    <img src="{{asset('assets/admin/global/img/flags\gb.png')}}">
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="tab_3">
                                                <div class=" input-icon right">       
                                                    <input type="text" id="metakeywords_ar" name="metakeywords_ar" value="" class="form-control required" >
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_33">
                                                <div class=" input-icon right"> 
                                                    <input type="text" id="metakeywords_en" name="metakeywords_en"  class="form-control " >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">عنوان ال Meta</label>
                                        <ul class="nav nav-tabs">
                                            <li class="active ">
                                                <a href="#tab_4" data-toggle="tab" aria-expanded="true">    <img src="{{asset('assets/admin/global/img/flags/eg.png')}}">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab_44" data-toggle="tab" aria-expanded="true">    <img src="{{asset('assets/admin/global/img/flags\gb.png')}}">
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="tab_4">
                                                <div class=" input-icon right">       
                                                    <input type="text" id="metatitle_ar" name="metatitle_ar" value="" class="form-control " >
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_44">
                                                <div class=" input-icon right"> 
                                                    <input type="text" id="metatitle_en" name="metatitle_en"  class="form-control " >
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
                                                <a href="#tab_5" data-toggle="tab" aria-expanded="true">    <img src="{{asset('assets/admin/global/img/flags/eg.png')}}">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab_55" data-toggle="tab" aria-expanded="true">    <img src="{{asset('assets/admin/global/img/flags\gb.png')}}">
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="tab_5">
                                                <div class=" input-icon right">       
                                                    <textarea id="metadesc_ar" name="metadesc_ar" value="" class="form-control " ></textarea>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_55">
                                                <div class=" input-icon right"> 
                                                    <textarea id="metadesc_en" name="metadesc_en"  class="form-control " ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                        </div>            


                        <div class="form-actions">
                            <div class="col-md-12 text-center" >
                                <button type="submit"  name="submit" class="btn green btn_save">
                                    <i class="fa fa-check"></i> حفظ</button>

                            </div>      
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>  
@endsection

@section("page-plugin")

<script src="{{asset('assets/admin/global/plugins/bootstrap-select/js/bootstrap-select.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/global/plugins/jquery-multi-select/js/jquery.multi-select.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>

@endsection

@section("page-level-script")

<script src="{{asset('assets/admin/pages/scripts/components-multi-select.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/pages/scripts/form-samples.min.js')}}" type="text/javascript"></script>



@endsection


