<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="fontiran.com:license" content="Y68A9">
    <link rel="icon" href="../build/images/favicon.ico" type="image/ico"/>
    <title>پنل ادمین</title>

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- FullCalendar -->
    <link href="/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">
</head>
<!-- /header content -->
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col hidden-print">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <h1>پنل مدیر</h1>
                </div>

                <div class="clearfix"></div>
                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>عمومی</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> فرم ها <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.html">فرم ارسال مقاله</a></li>
                                    <li><a href="index.html">فرم ارسال دسته بندی</a></li>
                                    {{--                                    <li><a href="index.html">فرم ارسال زیر دسته بندی</a></li>--}}
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i>لیست داده ها <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="form.html">لیست ها </a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="تمام صفحه" onclick="toggleFullScreen();">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav hidden-print">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

{{--                    <ul class="nav navbar-nav navbar-right">--}}
                        <ul class="nav navbar-nav ml-auto navbar-right">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('ورود به حساب') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('ساخت حساب ') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item btn btn-primary btn-lg btn-block" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('خروج') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
{{--                    </ul>--}}
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        <!-- /header content -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="clearfix"></div>
            <!--type here -->
        @yield('admin_content')
        <!--end type here -->
        </div>
        <div id="lock_screen">
            <table>
                <tr>
                    <td>
                        <div class="clock"></div>
                        <span class="unlock">
                    <span class="fa-stack fa-5x">
                      <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                      <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                </span>
                    </td>
                </tr>
            </table>
        </div>
        <!-- jQuery -->
        <script src="/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="/vendors/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="/vendors/iCheck/icheck.min.js"></script>

        <!-- bootstrap-daterangepicker -->
        <script src="/vendors/moment/min/moment.min.js"></script>

        <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- FullCalendar -->
        <script src="/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src='/vendors/fullcalendar/dist/lang/fa.js'></script>

        <!-- Custom Theme Scripts -->
        <script src="/build/js/custom.min.js"></script>

    </div>
</div>
</body>
</html>
