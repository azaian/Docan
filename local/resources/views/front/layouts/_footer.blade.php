<div class="subscrib">
    <div class="container-fluid">
        <div class="row">
            <div class="det">
                <span class="fa fa-envelope-o"></span>
                <p>إشترك لتصلك أخر الاخبار</p>
            </div>
            <div class="sub-form">
                <form method="post" >
                    <input type="email" id="email" placeholder="إكتب بريدك الإلكترونـى هنا" class="form-control">
                     <input type="hidden" id="_token" name="_token" value="{{ csrf_token()}}">
                     <button class="btn btn-default"id="sub"  type="submit">إشتــراك</button>
                </form>
            </div>
             <div id="progress1" >
                            <img src="{{URL('assets/front/images/loading.gif')}}" >
                        </div>
            <div id="res"></div>
            <div class="sub-scoil">
                <a href="{{$data['facebook']}}">
                    <span class="fa fa-facebook s"></span>
                </a>
                <a href="{{$data['twitter']}}">
                    <span class="fa fa-twitter"></span>
                </a>
                <a href="{{$data['googleplus']}}">
                    <span class="fa fa-google-plus"></span>
                </a>
                <a href="{{$data['linkedin']}}">
                    <span class="fa fa-linkedin"></span>
                </a>
                <a href="{{$data['youtube']}}">
                    <span class="fa fa-youtube"></span>
                </a>
                <a href="{{$data['instagram']}}">
                    <span class="fa fa-instagram"></span>
                </a>
                <a href="{{$data['phone']}}">
                    <span class="fa fa-whatsapp"></span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="about">
                <div class="logo">
                    <img src="{{URL('uploads/store/'.$data['logo'])}}">
                </div>
                <div class="det">
                    <p>
                        {{$data['meta_description']}}
                </div>
            </div>
            <div class="con">
                <div class="client">
                    <div class="sec-tit">
                        <i class="fa fa-group"></i> شركاءنا الاستراتي
                    </div>
                    <div id="client-slid" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                           
                            <div class="item active">
                              @foreach($partners as $partner)
                                <a href="{{URL('part/'.$partner->id)}}">   
                                    <img src="{{URL('uploads/partners/'.$partner->logo)}}">
                                </a>
                               @endforeach
                            </div>

                        </div>
                        <a class="left carousel-control" href="#client-slid" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#client-slid" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="hot-link">
                    <div class="sec-tit">
                        <i class="fa fa-bookmark"></i> روايط سريعة
                    </div>
                    <ul>
                        <li>
                            <a href="">
                                <i class="fa fa-caret-left"></i> الرئيسية
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-caret-left"></i> عن الشركة
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-caret-left"></i> سوق الجمعة
                            </a>
                        </li>
                        
                        
                        <li>
                            <a href="">
                                <i class="fa fa-caret-left"></i> تواصل معنا
                            </a>
                        </li>
                        
                        
                    </ul>
                </div>
            </div>
            <div class="contact">
                <div class="contact-det">
                    <div class="sec-tit">
                        <i class="fa fa-envelope-o"></i> تواصل معنا
                    </div>
                    <p>
                        <span class="fa fa-map-marker"></span> {{$data['ar_address']}}
                    </p>
                    <p>
                        <span class="fa fa-phone"></span> {{$data['phone']}}
                    </p>

                    <p>
                        <span class="fa fa-envelope-o"></span> {{$data['email']}}
                    </p>
                </div>
                <div class="pay">
                    <div class="sec-tit">
                        <span class="fa fa-usd"></span> طرق الدفع
                    </div>
                    <img src="{{URL('assets/front/images/payment.png')}}">
                </div>
            </div>
        </div>
    </div>
</footer>
<section class="copy-right">
    <div class="container-fluid">
        <div class="row text-center">
            <p>
                جميع الحقوق محفوظة@ دكــــان 2016
            </p>
        </div>

    </div>
</section>
