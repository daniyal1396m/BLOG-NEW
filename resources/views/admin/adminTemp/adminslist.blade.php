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
                                            @if($user['deleted_at']==null)
                                                <td>
                                                    <form action="{{route('destroy.user',[$user->id])}}"
                                                          method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">فعال</button>
                                                    </form>
                                                </td>
                                            @else
                                                <td>
                                                    <form action="{{route('destroy.user',[$user->id])}}"
                                                          method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">غیر    فعال</button>
                                                    </form>
                                                </td>
                                            @endif
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
