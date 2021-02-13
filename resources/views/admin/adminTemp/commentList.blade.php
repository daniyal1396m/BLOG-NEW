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
                                        {{--                                            {{$count = 0}}--}}
                                        {{--                                            @while($comment > 1)--}}
                                        <th scope="row">{{$comment->id}}</th>
                                        {{--                                                {{$count++}}--}}
                                        {{--                                            @endwhile--}}
                                        <td>{{$comment->name}}</td>
                                        <td>{{$comment->email}}</td>
                                        <td>{{$comment->message}}</td>
                                        <td>{{$comment->article_id}}</td>
                                        @if($comment->parent_id==null)
                                            <td>پیغام است</td>
                                        @else
                                            <td>پاسخ پیغام کد {{$comment->parent_id}}</td>
                                        @endif
                                        @if($comment->status==0)
                                            <td>
                                                <form action="{{route('destroy.comment',[$comment->id])}}"
                                                      method="post">
                                                    {{--                                                <a href="{{route('destroy.comment',[$comment->id])}}"--}}
                                                    {{--                                                   class="btn btn-danger">--}}

                                                    {{--                                                    غیر فعال--}}
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm "
                                                            data-name="{{ $comment->name }}" type="submit">غیر فعال است
                                                    </button>
                                                    {{--                                                </a>--}}
                                                </form>
                                            </td>

                                        @else
                                            <td>
                                                <form action="{{route('destroy.comment',[$comment->id])}}"
                                                      method="post">
                                                    {{--                                                <a href="{{route('destroy.comment',[$comment->id])}}"--}}
                                                    {{--                                                   class="btn btn-danger">--}}

                                                    {{--                                                    غیر فعال--}}
                                                    @csrf
                                                    <button class="btn btn-success btn-sm delete-confirm"
                                                            data-name="{{ $comment->name }}" type="submit">فعال است
                                                    </button>
                                                    {{--                                                </a>--}}
                                                </form>
                                            </td>
                                        @endif
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        {!! $comments->render() !!}
                    </div>

                </div>


                <div class="clearfix"></div>

            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('.delete-confirm').click(function (event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `ایا میخواهید کامنت  ${name} حذف کنید?`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();

                    }else {
                        swal('کنسل شد ',"درخواست کنسل دادید","error");
                    }
                });

        });

    </script>
@endsection
