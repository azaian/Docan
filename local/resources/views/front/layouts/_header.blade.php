<header>
    <div class="container-fluid">
        <div class="row">
            <div class="top-header">
                <div class="scoial">
                    <a href="">
                        <span class="fa fa-facebook s"></span>
                    </a>
                    <a href="{{$data['facebook']}}" target="_blank">
                        <span class="fa fa-twitter"></span>
                    </a>
                    <a href="{{$data['snapchat']}}" target="_blank">
                        <span class="fa fa-snapchat-ghost"></span>
                    </a>
                    <a href="{{$data['googleplus']}}" target="_blank">
                        <span class="fa fa-google-plus"></span>
                    </a>
                    <a href="{{$data['linkedin']}}">
                        <span class="fa fa-linkedin" ></span>
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
                <div class="top-link">
                    @if(auth()->check())

                    <li>
                        <a class="fa fa-lock" href="{{URL('logout')}}">
                            خروج
                        </a>
                    </li>
                    <li>
                        <a href="{{URL('profile')}}">
                            <i class="fa fa-user"></i> {{auth()->user()->name}}
                        </a>

                    </li>
                    @else
                    <li class="lo">
                        <a href="{{URL('login')}}">
                            <i class="fa fa-lock"></i> دخـول
                        </a>
                    </li>
                    <li class="re">
                        <a href="{{URL('register')}}">
                            <i class="fa fa-sign-in"></i> تسجيل جديـد
                        </a>
                    </li>
                    @endif
                </div>
            </div>
            <div class="bottom-header">
                <div class="logo">
                    <img src="{{URL('uploads/store/'.$data['logo'])}}">
                </div>
                <div class="search">
                    <form action="" method="" role="">
                        <input class="form-control" type="text" value="" placeholder="إبحث عن المنتج">
                        <button class="btn btn-default" type="submit">
                            <span class="fa fa-search"></span>
                        </button>
                    </form>
                </div>
                <div class="other-link">
                    <a href="#">
                        <button class="btn btn-default" type="button">
                            <span class="fa fa-apple"></span>
                        </button>
                    </a>
                    <a href="#">
                        <button class="btn btn-default" type="button">
                            <span class="fa fa-android"></span>
                        </button>
                    </a>
                    <div class="shop-icon">

                        <div class="cart">
                            <i class="fa fa-shopping-cart"></i>
                            @if(count($cart))
                            <span>{{Cart::count()}} </span>
                        </div>
                        <div class="cart-content" style="transition:0.5s ease-in-out; z-index: 1; opacity: 0; transform: translateY(50px);">

                            @foreach($cart as $item)
                            
                            <div class="prod-cart">

                                <h5>{{$item->name}}</h5>
                                <p> {{$item->qty}}</p>
                                <h6>{{$item->price}}$</h6>
                                <a class="fa fa-trash-o" href="{{URL('delcart/'.$item->id)}}"></a>
                            </div>
                         
                            @endforeach
                            <h2>الإجمالـى : <i>${{Cart::total()}}</i> دولار</h2>     <a href="{{URL('process')}}">
                                <button class="btn btn-default">
                                    <span class="fa fa-shopping-cart"></span>
                                    شراء
                                </button>
                            </a>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="menu">
                <ul>
                    <li>
                        <a href="{{URL('/')}}">
                            <i class="fa fa-home"></i> الرئيسية
                        </a>
                    </li>

                     <li>
                        <a href="{{URL('alldocans')}}">
                            <i class="fa fa-bullhorn"></i>  الدكاكين
                        </a>
                    </li>
                     <li>
                        <a href="{{URL('souq')}}">
                            <i class="fa fa-bullhorn"></i> سوق الجمعة
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-gift"></i> دانات دكان
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-tags"></i> كتالوجات
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <i class="fa fa-newspaper-o"></i> الأنشطة
                        </a>
                    </li>

                    <li>
                        <a href="{{URL('contact')}}">
                            <i class="fa fa-envelope-o"></i> تواصل معنا
                        </a>
                    </li>
                </ul>
                <div class="ma-off">
                    <a href="{{URL('new_docan')}}" class="build">
                        <button class="btn btn-default">
                            <span class="fa fa-university"></span> إنشا دكان
                        </button>
                    </a>

                    <a href="{{URL('new_ad')}}" class="make-offer">
                        <button class="btn btn-default">
                            <span class="fa fa-bullhorn"></span> أضـف إعلان
                        </button>
                    </a>

                </div>

            </div>
        </div>
    </div>
</header>
