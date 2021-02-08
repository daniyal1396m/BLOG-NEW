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
                            <h2>کامنتها
                                <small>لیست کامنت ها ها</small>
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
                                    <th class="text-center">ایمیل</th>
                                    <th class="text-center">متن</th>
                                    <th class="text-center">کد مقاله</th>
                                    <th class="text-center">والد</th>
                                    <th class="text-center">فعال غیر فعال</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <th scope="row">{{$comment->id}}</th>
                                        <td>{{$comment->name}}</td>
                                        <td>{{$comment->email}}</td>
                                        <td>{{$comment->message}}</td>
                                        <td>{{$comment->article_id}}</td>
                                        @if($comment->parent_id==null)
                                            <td>پیغام است</td>
                                        @else
                                            <td>پاسخ پیغام کد {{$comment->parent_id}}</td>
                                        @endif
                                        @if($comment->deleted_at==null)
                                            <td>
                                                <form action="{{route('destroy.comment',[$comment->id])}}" method="post">
                                                    @csrf
                                                    <button type="submit"
                                                            class="btn btn-success  delete-cat">
                                                        فعال
                                                    </button>
                                                </form>
                                            </td>

                                        @else
                                            <td>
                                                <form action="{{route('destroy.comment',[$comment->id])}}" method="post">
                                                    @csrf
                                                    <button type="submit"
                                                            class="btn btn-danger">غیر
                                                        فعال
                                                    </button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
{{--                        {!! $comment->render() !!}--}}
                    </div>

                </div>


                <div class="clearfix"></div>

            </div>
        </div>
    </div>
    </div>
@endsection
