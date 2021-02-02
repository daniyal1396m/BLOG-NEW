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



                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
