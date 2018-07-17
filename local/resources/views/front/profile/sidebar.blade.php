<div class="col-lg-3 prof-sid-menu">
    <div class="img">
        <img src="{{url('uploads/profiles/'.auth()->user()->image )}}">
    </div>

    <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">

        <li>
            <a href="{{ url('profile/setting') }}" >
                <span class="fa fa-user"></span>البيانات الشخصية
            </a>
        </li>

        <li>
            <a href="{{ url('profile/favorite') }}" >
                <span class="fa fa-heart"></span>المفضلـة
            </a>
        </li>
        <li>
            <a href="{{ url('profile/follow') }}" >

                <span class="fa fa-users"></span>
                الدكاكين المتبعه                    

            </a>
        </li>
        <li>
            <a href="{{ url('profile/my-order') }}" >
                <span class="fa fa-asterisk"></span>
                طلبات الشراء
            </a>
        </li>
    
        <li>
            <a href="{{ url('profile/docan') }}" >

                <span class="fa fa-university"></span>
                اداره دكاكينى                

            </a>
        </li>
        <li>
            <a href="{{ url('profile/my-adv') }}" >
                <span class="fa fa-bullhorn"></span>
                   اداره اعلانتى
            </a>
        </li>
    </ul>
</div>
