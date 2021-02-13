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
                            <h2>خبرنامه
                                <small>لیست ایمیل های خبر نامه </small>
                            </h2>
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
                    {{--                    <form action="{{route('store.news')}}" method="post">--}}
                    @csrf
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">متن</label>
                        <div class="col-sm-10  col-md-12">
                                <textarea type="text" id="description" name="description"
                                          class="form-control col-md-7 col-xs-12" rows="7"
                                          placeholder="توضیحات بیشتتر"></textarea>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-dark">ارسال</button>
                    </form>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script src="{{url('ckeditor')}}/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: '{{route('imageUpload')}}',
            filebrowserImageUploadUrl: '{{route('imageUpload')}}',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        });
    </script>
@endsection
