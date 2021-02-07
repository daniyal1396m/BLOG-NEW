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
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>کد</th>
                                    <th>نام</th>
                                    <th>ایمیل</th>
                                    <th>موضوع پیام</th>
                                    <th>متن پیام</th>
                                    <th>پاسخ به پیام</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($calluses as $rowCallus)
                                    <tr>
                                        <th scope="row">{{$rowCallus->id}}</th>
                                        <td>{{$rowCallus->name}}</td>
                                        <td>{{$rowCallus->email}}</td>
                                        <td>{{$rowCallus->subject}}</td>
                                        <td>{{$rowCallus->message}}</td>
                                        <td>
                                            <form action="{{route('response.msg',[$rowCallus->id])}}" method="post">
                                                @csrf
                                                <button type="submit"
                                                        class="btn btn-primary">پاسخ به این پیام
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
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
