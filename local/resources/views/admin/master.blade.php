<!DOCTYPE html>

<html lang="en" dir="rtl" >
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->


         <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />

        <link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />


        <link href="{{asset('assets/admin/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
          @yield("page-style")
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{asset('assets/admin/global/css/components-md-rtl.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />

        <link href="{{asset('assets/admin/global/css/plugins-md-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset('assets/admin/layouts/layout2/css/layout-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/layouts/layout2/css/themes/blue-rtl.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{asset('assets/admin/layouts/layout2/css/custom-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body  class="page-sidebar-closed-hide-logo page-container-bg-solid page-md page-header-fixed">
        <!-- BEGIN HEADER -->
        @include('admin.layouts._header')
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container" >
            <!-- BEGIN SIDEBAR -->
            @include('admin.layouts._sidebar')
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->

            <!-- BEGIN SIDEBAR -->

            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">

                <div style="min-height:1434px" class="page-content">
                 @yield("content-title")
                    <div class="page-bar">
                        @yield("content-navigat")
                    </div>
                    @yield('content')

                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->

            <!-- END QUICK SIDEBAR -->




            <!-- END QUICK SIDEBAR -->

        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
    </div>
       @include('admin.layouts._footer')
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="{{asset('assets/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->

         <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('assets/admin/global/plugins/jquery.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('assets/admin/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('assets/admin/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('assets/admin/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('assets/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        
        <script src="{{asset('assets/admin/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('assets/admin/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('assets/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        @yield("page-plugin")
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{asset('assets/admin/global/scripts/app.min.js')}}"
       type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
         @yield("page-level-script")
         <!-- END PAGE LEVEL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{asset('assets/admin/layouts/layout2/scripts/layout.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('assets/admin/layouts/layout2/scripts/demo.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('assets/admin/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>


        <!-- END THEME LAYOUT SCRIPTS -->


    </body>

</html>
