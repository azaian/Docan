@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
اضافه اعلان
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// style/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('style')
<link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/pages-style.css')}}" />
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// scripts/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('scripts')
<script src="{{URL('assets/front/js/custom.js')}}"></script>
<script type="text/javascript">

    $('#prog').hide();
    $('#progress1').hide();

    function myname() {
        if ($("#name").val() == "") {
            $('#name').after('<span>خطأ</span>');
            $('#sub').prop('disabled', true);
        } else {
            $('#name').after('<span>صح</span>');
            $('#sub').prop('disabled', false);
        }
    }
    function mymodal() {
        if ($("#model").val() == "") {
            $('#model').after('<span>خطأ</span>');
            $('#sub').prop('disabled', true);
        } else {
            $('#model').after('<span>صح</span>');
            $('#sub').prop('disabled', false);
        }
    }
    function myprice() {
        if ((Validateid($('#price')) == false) || ($("#price").val() == "")) {
            $('.right').remove();
            $('#price').after('<span class="wrong">خطأ</span>');
            $('.right').hide();
            $('#sub').prop('disabled', true);
        } else {
            $('.wrong').hide();
            $('#price').after('<span class="right">صح</span>');

            $('#sub').prop('disabled', false);
        }
    }
    function Validateid(input) {
        var reg = /^\d+$/;
        return reg.test(input.val());
    }
    $(document).ready(function () {
        $('#sub').click(function () {
            if (($("#name").val() == "") || ($("#model").val() == "") || ($("#price").val() == "") || ($("#desc").val() == "") || ($("#image").val() == "") || ($("#images").val() == "")) {
                alert('من فضلك تاكد من ملىء كل المتغيرات');
                return false;
            }


        });
    });


    $(document).ready(function () {

        $('#cat').change(function () {

            var id = $('option:selected', this).val();

            
            var _token = $('#_token').val();

            var data = new FormData();

            $.ajax({
                url: "{{url('subcat')}}" + "/" + id,
                type: 'get',
                headers: {
                    'X-CSRF-Token': _token
                },
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('#prog').show();
                },
                success: function (data) {
                    $('#data2').html(data);
                    $('#prog').hide();
                },
            });




        });
    });
    /*
    $(document).ready(function () {

        $('#subcats').change(function () {

            var id = $('option:selected', this).val();

            alert($id);
            var _token = $('#_token').val();

            var data = new FormData();

            $.ajax({
                url: "{{url('test')}}" + "/" + id,
                type: 'get',
                headers: {
                    'X-CSRF-Token': _token
                },
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('#progress1').show();
                },
                success: function (data) {
                    $('#data1').html(data);
                    $('#progress1').hide();
                },
            });




        });
    });
     */
    
    $(document).on("change", "#subcats", function() {
        
        
        var id = $('option:selected', this).val();

       
        var _token = $('#_token').val();

        var data = new FormData();

        $.ajax({
            url: "{{url('test')}}" + "/" + id,
            type: 'get',
            headers: {
                'X-CSRF-Token': _token
            },
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('#progress1').show();
            },
            success: function (data2) {
                $('#data1').html(data2);
                $('#progress1').hide();
            },
        });

    });
    
    
</script>
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// slider/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('slider')
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// content/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->

@section('content')
<div class="container">
    <div class="page-title">
        <a href=""><span class="fa fa-home"></span></a> > <i>إضــافة إعــلان</i>
    </div>


</div>



<div class="container">
    <section class="add-offer">
        <div class="row text-center">
            <div class="col-xs-12">
                <h1>أضــف إعلانك الأن</h1> @if(count($errors)>0)
                @foreach($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
                @endif
                @if(Session::has('m'))
                <?php
                $a;
                $a = session()->pull('m');
                ?>
                <span>
                    {{$a[0]}} </span>
                @endif


            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-12">
                <div class="add-offer-form">
                    <form name="myform" action="{{URL('new_ad')}}" enctype="multipart/form-data" method="POST" >
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token()}}">

                        <input type="hidden" name="user_id" value="{{auth() -> user() -> id}}">
                        <div class="form-group">
                            <label class="col-md-3">إسـم الإعــلان :</label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" type="text" name="name" onblur="myname()"  required value="{{ old('name')}}">
                            </div>

                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">

                            <label class="col-md-3">التصنيف :</label>


                            <div class="col-md-3">
                                <select class="form-control" id="cat" name="cat">
                                    <option value=""></option>
                                    @foreach($main as $maincate)


                                    @if(!empty($maincate->cat_trans('ar')))
                                    <option value="{{$maincate->cat_trans('ar')->id}}" >{{$maincate->cat_trans('ar')->name}}</option>  @endif
                                    @endforeach
                                </select>
                                <div id="prog" >
                                    <img src="{{URL('assets/front/images/loading.gif')}}" >
                                </div>
                            </div>
                            <div id="data2">


                            </div>
                            <div class="clearfix"></div>

                        </div>

                        <div id="progress1" >
                            <img src="{{URL('assets/front/images/loading.gif')}}" >
                        </div>
                        <div id="data1">

                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3">وصف الأعــلان :</label>
                            <div class="col-md-9">
                                <textarea class="input-textarea form-control" id="desc" name="desc"  placeholder="نبذة عن الإعــلان" reguired></textarea>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="form-group" id="up">
                            <label class="col-md-3">الصوره الاساسيه  :</label>
                            <div class="col-md-9">

                                <input type="file" value="" name="image">

                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="form-group" id="up">
                            <label class="col-md-3">صورالأعـلان  :</label>
                            <div class="col-md-9">
                                <input type="file" value="" multiple name="images[]">

                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <button class="btn btn-default"  type="submit">

                            <span class="fa fa-plus"></span>
                            إضـافة إعــلان
                        </button>
                    </form>
                </div>
            </div>
        </div>
</div>
</section>
@endsection