@extends('admin.temp')
@section('admin_content')
{{--    <div class="right_col" role="main">--}}
    <div class="left_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>جداول
                        <small>بعضی از نمونه ها برای شروع کار شما</small>
                    </h3>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>مقاله
                                <small>لیست مقاله ها</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                {{--                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                                {{--                                </li>--}}
                                {{--                                <li class="dropdown">--}}
                                {{--                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
                                {{--                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                                {{--                                    <ul class="dropdown-menu" role="menu">--}}
                                {{--                                        <li><a href="#">تنظیمات 1</a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li><a href="#">تنظیمات 2</a>--}}
                                {{--                                        </li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </li>--}}
                                {{--                                <li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                                {{--                                </li>--}}
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>فایل</th>
                                    <th>عنوان</th>
                                    <th>متن</th>
                                    <th>دسته بندی </th>
                                    <th>زیر دسته بندی</th>
                                    <th>فعال غیر فعال </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>سطح 2 </td>
                                    <td>فعال عیر فعال</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>Thornton</td>
                                    <td>Thornton</td>
                                    <td>سطح 2 </td>
                                    <td>فعال عیر فعال</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>سطح 2 </td>
                                    <td>فعال عیر فعال</td>
                                </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>خبرنامه
                                <small>لیست ایمیل های خبر نامه </small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                {{--                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                                {{--                                </li>--}}
                                {{--                                <li class="dropdown">--}}
                                {{--                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
                                {{--                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                                {{--                                    <ul class="dropdown-menu" role="menu">--}}
                                {{--                                        <li><a href="#">تنظیمات 1</a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li><a href="#">تنظیمات 2</a>--}}
                                {{--                                        </li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </li>--}}
                                {{--                                <li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                                {{--                                </li>--}}
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ایمیل</th>
{{--                                    <th>نام خانوادگی</th>--}}
{{--                                    <th>نام کاربری</th>--}}
{{--                                    <th>سطح</th>--}}
{{--                                    <th>فعال غیر فعال </th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>



                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>دسته بندی ها و زیر دسته بندی
                                <small>لیست دسته بندی هاو زیر دسته بندی ها</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
{{--                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
{{--                                </li>--}}
{{--                                <li class="dropdown">--}}
{{--                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
{{--                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
{{--                                    <ul class="dropdown-menu" role="menu">--}}
{{--                                        <li><a href="#">تنظیمات 1</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#">تنظیمات 2</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li><a class="close-link"><i class="fa fa-close"></i></a>--}}
{{--                                </li>--}}
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>نام کاربری</th>
                                    <th>سطح</th>
                                    <th>فعال غیر فعال </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>سطح 2 </td>
                                    <td>فعال عیر فعال</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>Thornton</td>
                                    <td>سطح 2 </td>
                                    <td>فعال عیر فعال</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>سطح 2 </td>
                                    <td>فعال عیر فعال</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>ارتباط با ما
                                <small>لیست پیام های ارتباط باما</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                {{--                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                                {{--                                </li>--}}
                                {{--                                <li class="dropdown">--}}
                                {{--                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
                                {{--                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                                {{--                                    <ul class="dropdown-menu" role="menu">--}}
                                {{--                                        <li><a href="#">تنظیمات 1</a>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li><a href="#">تنظیمات 2</a>--}}
                                {{--                                        </li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </li>--}}
                                {{--                                <li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                                {{--                                </li>--}}
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>تلفن همراه</th>
                                    <th>عنوان</th>
                                    <th>ایمیل</th>
                                    <th>متن پیام</th>
                                    <th>پاسخ به پیام</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>سطح 2 </td>
                                    <td>سطح 2 </td>
                                    <td>سطح 2 </td>
                                    <td>فعال عیر فعال</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>Thornton</td>
                                    <td>Thornton</td>
                                    <td>Thornton</td>
                                    <td>سطح 2 </td>
                                    <td>فعال عیر فعال</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>سطح 2 </td>
                                    <td>سطح 2 </td>
                                    <td>سطح 2 </td>
                                    <td>فعال عیر فعال</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>مدیران
                                <small>لیست مدیران</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
{{--                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
{{--                                </li>--}}
{{--                                <li class="dropdown">--}}
{{--                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
{{--                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
{{--                                    <ul class="dropdown-menu" role="menu">--}}
{{--                                        <li><a href="#">تنظیمات 1</a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#">تنظیمات 2</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li><a class="close-link"><i class="fa fa-close"></i></a>--}}
{{--                                </li>--}}
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>نام کاربری</th>
                                    <th>سطح</th>
                                    <th>فعال غیر فعال </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>سطح 2 </td>
                                    <td>فعال عیر فعال</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>Thornton</td>
                                    <td>سطح 2 </td>
                                    <td>فعال عیر فعال</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>سطح 2 </td>
                                    <td>فعال عیر فعال</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
    </div>
@endsection
