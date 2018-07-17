@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
PAGE
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
    <div class="page-title">
    <a href="index.html"><span class="fa fa-home"></span></a> > <i>ادكــان أديدس</i>
    </div> 
<div class="brand-hed">
    <div class="brand-logo">
                        <img src="images/brand-logo.jpeg">
                    </div>
    <div class="brand-det">
        <div class="tit">
            <h1> دكــان Addidas</h1>
        </div>
        <p>
            يُعد موقع دكان دوت كوم مركزًا للتسوق اون لاين الأفضل والأسهل من حيث الاستخدام في الامارات، حيث يلبي الموقع جميع احتياجات العملاء بأفضل الطرق الممكنة.
            يُعد موقع دكان دوت كوم مركزًا للتسوق اون لاين الأفضل والأسهل من حيث الاستخدام في الامارات، حيث يلبي الموقع جميع احتياجات العملاء بأفضل الطرق الممكنة.
            <a href="">
                <button class="btn btn-default">
                    <span class="fa fa-bullhorn"></span>
                    متابعة الدكان
                </button>
            </a>
            <a href="">
                <button class="btn btn-default">
                    <span class="fa fa-heart"></span>
                    إضافة إلى المفضلة
                </button>
            </a>
        </p>
        <div class="docan-det">   
            <p>
                <span class="fa fa-map-marker"></span>
                إعمار بوليفارد، بوسط المدينة - دبي 
            </p>                
            <p>
                <span class="fa fa-phone"></span>
                800-599-65-80
            </p>                
            <p>
                <span class="fa fa-mobile fa-lg"></span>
                800-599-65-80
            </p>                
            <p>
                <span class="fa fa-envelope-o"></span>
                info@docaan.com
            </p>    
        </div>
    </div>
</div>       
<!--================== Start Vip ==========================-->        
<!--========== Start Docans( offer / docans) ===============-->      
<div class="offer">
    <div class="container-fluid">
        <div class="row">
            <div class="fliter">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <a >
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    التصنيـف
                                   <i class="fa fa-angle-down"></i>
                                </h4>
                            </div>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <li>
                                    <a href="#">
                                        <input type="checkbox" class="form-control">

                                       موضة وأزياء
                                        <span>[8]</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <input type="checkbox" class="form-control">

                                     سيارات
                                        <span>[4]</span>
                                    </a>
                                </li>
                                  <li>
                                    <a href="#">
                                        <input type="checkbox" class="form-control">

                                       أدوات منزلية
                                        <span>[25]</span>
                                    </a>
                                </li>
                                    <li>
                                    <a href="#">
                                                                             <input type="checkbox" class="form-control">
                                       إكسسورات
                                        <span>[19]</span>
                                    </a>
                                </li>
                                   <li>
                                    <a href="#">
                                                                             <input type="checkbox" class="form-control">
                                    إلكترونيات
                                        <span>[17]</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                                                             <input type="checkbox" class="form-control">
                                       أدوات رياضية
                                        <span>[25]</span>
                                    </a>
                                </li>
                     
                    
                            </div>
                         </div>
                    </div>
                    <div class="panel panel-default">
                        <a>
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    مدة العرض
                                   <i class="fa fa-angle-down"></i>
                                </h4>
                            </div>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <li>
                                    <a href="#">
                                        <input type="checkbox" class="form-control">
                                       يوم واحد
                                        <span>[8]</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <input type="checkbox" class="form-control">
                                       3 أيــام
                                        <span>[4]</span>
                                    </a>
                                </li>
                                  <li>
                                    <a href="#">
                                        <input type="checkbox" class="form-control">
                                       7 أيــام
                                        <span>[25]</span>
                                    </a>
                                </li>
                                    <li>
                                    <a href="#">
                                        <input type="checkbox" class="form-control">
                                       15 يــوم
                                        <span>[19]</span>
                                    </a>
                                </li>
                          
                                   <li>
                                    <a href="#">
                                        <input type="checkbox" class="form-control">
                                      30 يــوم
                                        <span>[17]</span>
                                    </a>
                                </li>
                                            
                            </div>
                         </div>
                    </div>
                    <div class="panel panel-default">
                        <a>
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    السعر
                                   <i class="fa fa-angle-down"></i>
                                </h4>
                            </div>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <li>
                                    <a href="#">
                                        <input type="checkbox" class="form-control">
                                      10$ - 50$
                                        <span>[28]</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <input type="checkbox" class="form-control">
                                         50$ - 100$
                                        <span>[14]</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <input type="checkbox" class="form-control">
                                      100$ - 200$
                                        <span>[28]</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <input type="checkbox" class="form-control">
                                         200$ - 400$
                                        <span>[14]</span>
                                    </a>
                                </li>
                                  <li>
                                    <a href="#">
                                        <input type="checkbox" class="form-control">
                                         400$ - 600$
                                        <span>[5]</span>
                                    </a>
                                </li>
                      
                                            
                            </div>
                         </div>
                    </div>                          
                </div>
            </div>
            <div class="offer-con">
                <div class="tit">المنتجات</div>
                
                <div class="prod-type-3">
                    <img src="images/off-1.jpg" class="on">
                    <img src="images/off-c-1.jpg" class="off">
                    <div class="offer-prod-det">            
                    <a href="product.html"><h1>هاتف سامسونج</h1></a>
                    <p>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star-o"></span>
                    </p>     
                    <div class="price">
                       
                        <h3>2000$</h3>
                    </div>

                </div> 
                    <div class="img-over">
                        <a href="#">
                            <button class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span>إضافة إلى عربة الشراء
                            </button>
                        </a>
                        <span class="fa fa-heart"></span>
                </div>
                </div>
                
                <div class="prod-type-3">
                    <img src="images/off-2.jpg" class="on">
                    <img src="images/off-c-2.jpg" class="off">
                    <div class="offer-prod-det">            
                        <a href="product.html"><h1>هاتف سامسونج</h1></a>
                        <p>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star-o"></span>
                        </p>     
                        <div class="price">
                            <h3>2000$</h3>
                        </div>
                    </div> 
                    <div class="img-over">
                        <a href="#">
                            <button class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span>إضافة إلى عربة الشراء
                            </button>
                        </a>
                        <span class="fa fa-heart"></span>
                </div>
                </div>
                
                <div class="prod-type-3">
                    <img src="images/off-3.jpg" class="on">
                    <img src="images/off-c-3.jpg" class="off">
                    <div class="offer-prod-det">            
                        <a href="product.html"><h1>هاتف سامسونج</h1></a>
                        <p>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star-o"></span>
                        </p>     
                        <div class="price">
                            <h3>2000$</h3>
                        </div>
                    </div> 
                    <div class="img-over">
                        <a href="#">
                            <button class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span>إضافة إلى عربة الشراء
                            </button>
                        </a>
                        <span class="fa fa-heart"></span>
                </div>
                </div>
                
                <div class="prod-type-3">
                    <img src="images/off-4.jpg" class="on">
                    <img src="images/off-c-4.jpg" class="off">
                    <div class="offer-prod-det">            
                        <a href="product.html"><h1>هاتف سامسونج</h1></a>
                        <p>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star-o"></span>
                        </p>     
                        <div class="price">
                            <h3>2000$</h3>
                        </div>
                    </div> 
                    <div class="img-over">
                        <a href="#">
                            <button class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span>إضافة إلى عربة الشراء
                            </button>
                        </a>
                        <span class="fa fa-heart"></span>
                </div>
                </div>     
                
                <div class="prod-type-3">
                    <img src="images/off-5.jpg" class="on">
                    <img src="images/off-c-5.jpg" class="off">
                    <div class="offer-prod-det">            
                        <a href="product.html"><h1>هاتف سامسونج</h1></a>
                        <p>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star-o"></span>
                        </p>     
                        <div class="price">
                            <h3>2000$</h3>
                        </div>
                    </div> 
                    <div class="img-over">
                        <a href="#">
                            <button class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span>إضافة إلى عربة الشراء
                            </button>
                        </a>
                        <span class="fa fa-heart"></span>
                </div>
                </div>
                
                <div class="prod-type-3">
                    <img src="images/off-6.jpg" class="on">
                    <img src="images/off-c-6.jpg" class="off">
                    <div class="offer-prod-det">            
                        <a href="product.html"><h1>هاتف سامسونج</h1></a>
                            <p>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star-o"></span>
                        </p>     
                        <div class="price">
                            <h3>2000$</h3>
                        </div>
                    </div> 
                    <div class="img-over">
                        <a href="#">
                            <button class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span>إضافة إلى عربة الشراء
                            </button>
                        </a>
                        <span class="fa fa-heart"></span>
                </div>
                </div>
                
                <div class="prod-type-3">
                    <img src="images/off-7.jpg" class="on">
                    <img src="images/off-c-7.jpg" class="off">
                    <div class="offer-prod-det">            
                        <a href="product.html"><h1>هاتف سامسونج</h1></a>
                        <p>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star-o"></span>
                        </p>     
                        <div class="price">
                            <h3>2000$</h3>
                        </div>
                    </div> 
                    <div class="img-over">
                        <a href="#">
                            <button class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span>إضافة إلى عربة الشراء
                            </button>
                        </a>
                        <span class="fa fa-heart"></span>
                </div>
                </div>
                
                <div class="prod-type-3">
                    <img src="images/off-1.jpg" class="on">
                    <img src="images/off-c-1.jpg" class="off">
                    <div class="offer-prod-det">            
                    <a href="product.html"><h1>هاتف سامسونج</h1></a>
                    <p>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star-o"></span>
                    </p>     
                    <div class="price">
                       
                        <h3>2000$</h3>
                    </div>

                </div> 
                    <div class="img-over">
                        <a href="#">
                            <button class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span>إضافة إلى عربة الشراء
                            </button>
                        </a>
                        <span class="fa fa-heart"></span>
                </div>
                </div>
                
                <div class="prod-type-3">
                    <img src="images/off-2.jpg" class="on">
                    <img src="images/off-c-2.jpg" class="off">
                    <div class="offer-prod-det">            
                        <a href="product.html"><h1>هاتف سامسونج</h1></a>
                        <p>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star-o"></span>
                        </p>     
                        <div class="price">
                            <h3>2000$</h3>
                        </div>
                    </div> 
                    <div class="img-over">
                        <a href="#">
                            <button class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span>إضافة إلى عربة الشراء
                            </button>
                        </a>
                        <span class="fa fa-heart"></span>
                </div>
                </div>
                
                <div class="prod-type-3">
                    <img src="images/off-3.jpg" class="on">
                    <img src="images/off-c-3.jpg" class="off">
                    <div class="offer-prod-det">            
                        <a href="product.html"><h1>هاتف سامسونج</h1></a>
                        <p>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star-o"></span>
                        </p>     
                        <div class="price">
                            <h3>2000$</h3>
                        </div>
                    </div> 
                    <div class="img-over">
                        <a href="#">
                            <button class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span>إضافة إلى عربة الشراء
                            </button>
                        </a>
                        <span class="fa fa-heart"></span>
                </div>
                </div>
                
                <div class="prod-type-3">
                    <img src="images/off-4.jpg" class="on">
                    <img src="images/off-c-4.jpg" class="off">
                    <div class="offer-prod-det">            
                        <a href="product.html"><h1>هاتف سامسونج</h1></a>
                        <p>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star-o"></span>
                        </p>     
                        <div class="price">
                            <h3>2000$</h3>
                        </div>
                    </div> 
                    <div class="img-over">
                        <a href="#">
                            <button class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span>إضافة إلى عربة الشراء
                            </button>
                        </a>
                        <span class="fa fa-heart"></span>
                </div>
                </div>     
                
                <div class="prod-type-3">
                    <img src="images/off-5.jpg" class="on">
                    <img src="images/off-c-5.jpg" class="off">
                    <div class="offer-prod-det">            
                        <a href="product.html"><h1>هاتف سامسونج</h1></a>
                        <p>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star-o"></span>
                        </p>     
                        <div class="price">
                            <h3>2000$</h3>
                        </div>
                    </div> 
                    <div class="img-over">
                        <a href="#">
                            <button class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span>إضافة إلى عربة الشراء
                            </button>
                        </a>
                        <span class="fa fa-heart"></span>
                </div>
                </div>
                
     
                <ul class="pagination">
                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">9</a></li>
                    <li><a href="#">10</a></li>
                </ul>
            </div>
            <div class="ads">
                <img src="images/ads-2.jpg" class="pro-ads">
                <img src="images/ads-3.jpg" class="pro-ads">
                <img src="images/ads-4.jpg" class="pro-ads">
            </div>
        </div>
    </div>
</div> 
@endsection