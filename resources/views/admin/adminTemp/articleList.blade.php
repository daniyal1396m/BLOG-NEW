@extends('admin.temp')

@section('admin_content')
    <div class="right_col" role="main">
        <div class="left_col" role="main">
            <div class="x_panel">
                <div class="page-title">
                    <div class="title_left">
                        <h3>جداول</h3>
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
                                        <th>عکس</th>
                                        <th>عنوان</th>
                                        <th>متن</th>
                                        <th>دسته بندی</th>
                                        <th>فعال غیر فعال</th>
                                        <th>ویرایش</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($articles as $art)
                                        <tr>
                                            <th scope="row">{{$art->id}}</th>
                                            <td><img src="/uploads/{{$art->pic}}" alt="pic"></td>
                                            <td>{{$art->title}}</td>
                                            <td>{{$art->body}}</td>
                                            <td>{{$art->cat_id}}</td>
                                            @if($arti->status==1)
                                                <td><a href="{{ url('delete/article/'.$art->id)}}"
                                                       class="btn btn-success  delete-cat updateCat">
                                                        فعال</a></td>
                                            @else
                                                <td><a href="{{ url('delete/article/'.$art->id)}}"
                                                       class="btn btn-danger updateCat">غیر
                                                        فعال</a>
                                                </td>
                                            @endif
                                            <td><a href="#">ویرایش</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $articles->render() !!}
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
                                        @if(empty($newsletters))
                                            <tr>
                                                <th scope="row">نیست</th>
                                                <td>نیست</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th scope="row">{{$rowNews->id}}</th>
                                                <td>{{$rowNews->email}}</td>
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
                                                <td><a href="{{ url('/update/category/'.$cats->id)}}"
                                                       class="btn btn-success  delete-cat">
                                                        فعال</a></td>
                                            @else
                                                <td><a href="{{ url('/update/category/'.$cats->id)}}"
                                                       class="btn btn-danger">غیر
                                                        فعال</a>
                                                </td>
                                            @endif
                                            <td><a href="{{ url('/edit/category/'.$cats->id)}}" class="btn btn-dark">ویرایش</a></td>
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
                                                <td><a href="{{ url('res/callus/'.$rowCallus->id) }}"
                                                       class="btn btn-primary">پاسخ به این پیام</a></td>
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
                                        <th>نام و نام خانوادگی</th>
                                        <th>ایمیل</th>
                                        <th>فعال غیر فعال</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <th scope="row">{{$user->id}}</th>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                <a href="#" class="btn btn-success">فعال</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            {!! $users->render() !!}
                        </div>
                    </div>

                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
