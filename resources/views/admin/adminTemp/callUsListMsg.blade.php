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

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                             <h2>ارتباط با ما
                                <small>لیست پیام های ارتباط باما</small>
                            </h2>
{{--                            <ul class="nav navbar-right panel_toolbox">--}}

{{--                            </ul>--}}
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


                <div class="clearfix"></div>

            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
@endsection
