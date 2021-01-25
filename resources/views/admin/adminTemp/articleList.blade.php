@extends('admin.temp')

@section('admin_content')
    <div class="right_col" role="main">
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

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>کد</th>
                                        <th>فایل</th>
                                        <th>عنوان</th>
                                        <th>متن</th>
                                        <th>دسته بندی</th>
                                        <th>زیر دسته بندی</th>
                                        <th>فعال غیر فعال</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Otto</td>
                                        <td>Otto</td>
                                        <td>سطح 2</td>
                                        <td>فعال عیر فعال</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>Thornton</td>
                                        <td>Thornton</td>
                                        <td>سطح 2</td>
                                        <td>فعال عیر فعال</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        <td>سطح 2</td>
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
                                    <li><a href="#" class="btn btn-primary">ارسال پیغام به این ایمیل ها</a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>کد</th>
                                        <th>ایمیل</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($newsletters as $rowNews)
                                        @if(!empty($newsletters))
                                            <tr>
                                                <th scope="row">{{$rowNews->id}}</th>
                                                <td>{{$rowNews->email}}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th scope="row">نیست</th>
                                                <td>نیست</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            {!! $newsletters->render() !!}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>دسته بندی ها و زیر دسته بندی
                                    <small>لیست دسته بندی هاو زیر دسته بندی ها</small>
                                </h2>
                                <ul class="nav navbar-right panel_toolbox">

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th class="text-center">کد</th>
                                        <th class="text-center">نام</th>
                                        <th class="text-center">سطح</th>
                                        <th class="text-center">والد</th>
                                        <th class="text-center">فعال غیر فعال</th>
                                        <th class="text-center">ویرایش</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $cats)
                                        <tr>
                                            <th scope="row">{{$cats->id}}</th>
                                            <td>{{$cats->name}}</td>
                                            <td>{{$cats->level}}</td>
                                            <td>{{$cats->parent_id}}</td>
                                            @if($cats->status==1)
                                                <td><a href="#"
                                                       class="btn btn-outline-success btn-lg btn-block delete-cat">
                                                        فعال</a></td>
                                            @else
                                                <td><a href="#" class="btn btn-outline-danger btn-lg btn-block">غیر
                                                        فعال</a>
                                                </td>
                                            @endif
                                            {{--                                        <td><a href="#" class="btn btn-dark">ویرایش</a></td>--}}
                                            <td><a href="#" class="btn btn-outline-dark btn-lg btn-block">ویرایش</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            {!! $categories->render() !!}
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>ارتباط با ما
                                    <small>لیست پیام های ارتباط باما</small>
                                </h2>
                                <ul class="nav navbar-right panel_toolbox">

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>کد</th>
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
                                    @foreach($calluses as $rowCallus)
                                        @if(!empty($calluses))
                                            <tr>
                                                <th scope="row">{{$rowCallus->id}}</th>
                                                <td>{{$rowCallus->id}}</td>
                                                <td>{{$rowCallus->name}}</td>
                                                <td>{{$rowCallus->lastname}}</td>
                                                <td>{{$rowCallus->email}}</td>
                                                <td>{{$rowCallus->title}}</td>
                                                <td>{{$rowCallus->body}}</td>
                                                <td><a href="#" class="btn btn-primary">پاسخ به این پیام</a></td>
                                            </tr>
                                        @else
                                            <th scope="row">نیست</th>
                                            <td>نیست</td>
                                            <td>نیست</td>
                                            <td>نیست</td>
                                            <td>نیست</td>
                                            <td>نیست</td>
                                            <td>نیست</td>
                                            <td>نیست</td>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            {!! $calluses->render() !!}
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>مدیران
                                    <small>لیست مدیران</small>
                                </h2>
                                <ul class="nav navbar-right panel_toolbox">

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>کد</th>
                                        <th>نام</th>
                                        <th>نام خانوادگی</th>
                                        <th>نام کاربری</th>
                                        <th>سطح</th>
                                        <th>فعال غیر فعال</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Otto</td>
                                        <td>سطح 2</td>
                                        <td>فعال عیر فعال</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>Thornton</td>
                                        <td>سطح 2</td>
                                        <td>فعال عیر فعال</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        <td>سطح 2</td>
                                        <td>فعال عیر فعال</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        <td>سطح 2</td>
                                        <td>فعال عیر فعال</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        <td>سطح 2</td>
                                        <td>فعال عیر فعال</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            {!! $categories->render() !!}
                        </div>
                    </div>

                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
    </div>
@endsection
