@extends("admin/master")


@section("title")
الاقتراحات
@endsection


@section("page-style")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
        
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
              rel="stylesheet" type="text/css" />

@endsection


@section("content-header")

                   <h3 class="page-title"> الاقتراحات 
                        
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="{{url('admin')}}"> الرئيسيه</a>
                                <i class="fa fa-angle-left"></i>
                            </li>
                            <li>
                                <span>عرض كل الاقتراحات </span>
                                
                            </li>
                        </ul>
                        
                    </div>


@endsection


@section("content")

  <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                     
                                <div class="portlet-title">
                                              @if(Session::has('m'))
                       <?php $a=[];  $a=session()->pull('m');?>
     <div class="alert alert-success" role="alert">{{$a[0]}} </div>
                @endif
                       @if(Session::has('n'))
                       <?php $a=[];  $a=session()->pull('n');?>
     <div class="alert alert-danger" role="alert">{{$a[0]}} </div>
                @endif
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">  الاقتراحات </span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    
                                   
                                    
                                    
                                    <table class="table " >
                                        <thead>
                                            <tr>
                                                
                                                <th> الاسم</th>
                                                <td>الايميل</td>
                                                <td>الرساله</td>
                                                
                                                <th> العمليات  </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            @foreach($messages as $mess)
                                        
                                            <tr class="odd gradeX">
                                           
                                                
                                                <td>{{$mess->name}}</td>
                                                <td>{{$mess->email}}</td>
                                                <td> {{$mess->message}} </td>   
                                                <td></td>
                                                   
                                                
                                                <td>
                                                    
                                                   
                                                    
                                                    <a id="del" href="{{URL('admin/message/delete/'.$mess->id)}}" class="btn red">
                                                            <i class="fa fa-trash"></i> مسح 
                                                    </a>
                                                    
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
@endsection



@section("page-plugin")
        <script src="{{asset('assets/admin/global/scripts/datatable.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>

@endsection

@section("page-level-script")

 <script src="{{asset('assets/admin/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
@endsection




