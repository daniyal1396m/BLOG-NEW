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
                                        <th>توضیحات</th>
                                        <th>دسته بندی</th>
                                        <th> زیردسته بندی</th>
                                        <th>فعال غیر فعال</th>
                                        <th>ویرایش</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($articles as $art)
                                        <tr>
                                            <th scope="row">{{$art->id}}</th>
                                            <td><img src="{{url('/')."/".$art->image}}" alt="pic" width="50px" height="50px"></td>
                                            <td>{{$art->title}}</td>
                                            <td>{{$art->body}}</td>
                                            <td>{{$art->description}}</td>
                                            <td>{{$art->category}}</td>
                                            <td>{{$art->sub_category}}</td>
                                            @if($art->status==1)
                                                <td><a href="{{route('update.article',[$art->id])}}"
                                                       class="btn btn-success  delete-cat updateCat">
                                                        فعال</a></td>
                                            @else
                                                <td><a href="{{route('update.article',[$art->id])}}"
                                                       class="btn btn-danger updateCat">غیر
                                                        فعال</a>
                                                </td>
                                            @endif
                                            <td><a href="{{route('edit.article',[$art->id])}}">ویرایش</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $articles->render() !!}
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
