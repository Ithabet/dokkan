<!DOCTYPE html>
<html dir="rtl">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Base</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="{{ asset('assets/fonts/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/fonts/material-design-icons/material-icon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/ar-fonts.css') }}" rel="stylesheet" type="text/css" />
    <!--bootstrap -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/summernote/summernote.css') }}" rel="stylesheet">
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/material/material.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/material/material.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/material_style.css') }}">

    <!-- Theme Styles -->
    <link href="{{ asset('assets/css/theme/rtl/theme_style.css') }}" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="{{ asset('assets/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme/rtl/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme/rtl/theme-color.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme/rtl/rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme/custom.css') }}" rel="stylesheet" type="text/css" />
    @yield('EXTCSS')
    <!-- favicon -->
    <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico" />
</head>
<!-- END HEAD -->

<body
        class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md sidemenu-container-reversed header-indigo white-sidebar-color logo-indigo">
<div class="page-wrapper">
    <!-- start header -->
    <div class="page-header navbar navbar-fixed-top">
        <div class="page-header-inner ">
            <!-- logo start -->
            <div class="page-logo">
                <a href="{{ URL::to('/') }}">
                    <span class="logo-default"> دُكان </span> </a>
                <span class="logo-icon material-icons fa-rotate-45">store</span>
            </div>
            <!-- logo end -->
            <ul class="nav navbar-nav navbar-right in">
                <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
            </ul>


            <!-- start header menu -->
            <div class="top-menu">
                <ul class="nav navbar-nav ">
                    <!-- start manage user dropdown -->
                    <li class="dropdown dropdown-user pull-right">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <span class="username username-hide-on-mobile">
                                @if (Auth::check())
                                    {{ Auth::user()->name }} </span>
                                @endif
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{ URL::to('profile') }}">
                                    <i class="icon-user"></i> حسابي </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('settings') }}">
                                    <i class="icon-settings"></i> إعدادات
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                    <i class="icon-logout"></i>  خروج
                                </a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>
                    <li><a href="{{ URL::to('') }}" class="pos-btn"><i class="fa fa-laptop"></i></a></li>

                </ul>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- start page container -->
    <div class="page-container">
        <!-- start sidebar menu -->
        <div class="sidebar-container">
            <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                <div id="remove-scroll" class="left-sidemenu">
                    <ul class="sidemenu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true"
                        data-slide-speed="200" style="padding-top: 20px">
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                        </li>
                        <li class="nav-item start {{ (Request::is('home*')) ? 'active open' : '' }}">
                            <a href="{{ URL::to('/') }}" class="nav-link nav-toggle">
                                <span class="title">  الرئيسية</span>
                                <i class="material-icons">dashboard</i>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="nav-item {{ (Request::is('persons/*')) ? 'active open' : '' }}">
                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">person</i>
                                <span class="title">الأشخاص</span>
                                <span class="arrow {{ (Request::is('persons/*')) ? 'open' : '' }}"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item {{ (Request::is('persons/customers*')) ? 'active' : '' }}">
                                    <a href="{{ URL::to('persons/customers') }}" class="nav-link ">
                                        <span class="title">العملاء</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ (Request::is('persons/suppliers*')) ? 'active' : '' }}">
                                    <a href="{{ URL::to('persons/suppliers') }}" class="nav-link ">
                                        <span class="title">الموردين</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ (Request::is('persons/users*')) ? 'active' : '' }}">
                                    <a href="{{ URL::to('persons/users') }}" class="nav-link "> <span
                                                class="title">المستخدمين</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  {{ (Request::is('poss*')) ? 'active' : '' }} ">
                            <a href="{{ URL::to('poss') }}" class="nav-link nav-toggle">
                                <span class="title">نقاط البيع</span>
                                <i class="material-icons">shopping_cart</i>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="nav-item {{ (Request::is('products*')) ? 'active' : '' }}">
                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">view_module</i>
                                <span class="title">المنتجات</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item {{ (Request::is('products/categories*')) ? 'active' : '' }}">
                                    <a href="{{ URL::to('products/categories') }}" class="nav-link "> <span class="title">التصنيفات</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ (Request::is('products*')) ? 'active' : '' }}">
                                    <a href="{{ URL::to('products') }}" class="nav-link "> <span class="title">المنتجات</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ (Request::is('purchases*')) ? 'active' : '' }} ">
                            <a href="{{ URL::to('purchases/') }}" class="nav-link nav-toggle">
                                <span class="title">المشتريات</span>
                                <i class="material-icons">toc</i>
                                <span class="selected"></span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item start ">
                            <a href="{{ URL::to('/') }}" class="nav-link nav-toggle">
                                <span class="title">المبيعات</span>
                                <i class="material-icons">toc</i>
                                <span class="selected"></span>
                                <span class="arrow "></span>
                            </a>
                        </li>
                        <li class="nav-item start ">
                            <a href="{{ URL::to('/') }}" class="nav-link nav-toggle">
                                <span class="title">المصروفات</span>
                                <i class="material-icons">toc</i>
                                <span class="selected"></span>
                                <span class="arrow "></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end sidebar menu -->
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!-- end page content -->
    </div>
    <!-- end page container -->
    <!-- start footer -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2019 &copy; Dokkan
            <a href="https://xative.com" target="_top" class="makerCss">Xative</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- end footer -->
</div>
<!-- start js include path -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/popper/popper.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<!-- bootstrap -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.js') }}"></script>
<script src="{{ asset('assets/js/pages/sparkline/sparkline-data.js') }}"></script>
<!-- Common js-->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/layout.js') }}"></script>
<script src="{{ asset('assets/js/theme-color.js') }}"></script>
<!-- material -->
<script src="{{ asset('assets/plugins/material/material.min.js') }}"></script>


@yield('EXTJS')
<!-- end js include path -->
</body>
</html>