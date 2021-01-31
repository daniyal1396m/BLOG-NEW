<!DOCTYPE html>
<html lang="fa" dir="rtl">
{{--<html lang="{{ app()->getLocale() }}">--}}
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="fontiran.com:license" content="Y68A9">
    <link rel="icon" href="/build/images/favicon.ico" type="image/ico"/>
    <title>پنل ادمین</title>
    @include('layouts.headerLinksAdmin')
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
                                    <li><a href="{{route('form')}}" title="فرم ارسال مقاله">فرم ارسال مقاله</a></li>
                                    <li><a href="{{route('category')}}" title="فرم ارسال دسته بندی و زیر دسته بندی">فرم ارسال دسته بندی</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i>لیست داده ها <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('list')}}" title="لیست داده ها ">لیست ها </a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="تمام صفحه"
                       onclick="toggleFullScreen();">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
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
                                    <a class="dropdown-item btn btn-primary btn-lg btn-block"
                                       href="{{ route('logout') }}"
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
                </nav>
            </div>
        </div>

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
    </div>
</div>
@include('layouts.footerLinksAdmin')
@yield('script')
</body>
</html>
