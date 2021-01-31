@extends('admin.temp')
@section('admin_content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="x_panel">
        <div class="x_title">
            <h2>ارسال مقاله</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br/>
            <h4>فرم ارسال مقاله </h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <form class="form-horizontal form-label-left" method="post" action="{{route('article.send')}}">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">عکس <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <input type="file" id="pic"
                               class="form-control col-md-7 col-xs-12" name="pic">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="title">عنوان <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <input type="text" id="title"
                               class="form-control col-md-7 col-xs-12" name="title" placeholder="تیتر">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="category">دسته بندی <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <select id="category" class="form-control col-md-7 col-xs-12" name="category">
                            <option class="disabled">یک دسته بندی انتخاب کنید</option>
                            @if(count($categories))
                                @foreach($categories as $rowCategory)
                                    <option value="{{$rowCategory->id}}">{{$rowCategory->name}}</option>
                                @endforeach
                            @else
                                <option class="disabled">هیچ دسته بندی وجود ندارد</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="sub_category">زیر دسته بندی<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <select name="sub_category" id="sub_category" class="form-control col-md-7 col-xs-12">
{{--                            <option value=""></option>--}}
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="body">متن <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <input type="text" id="body" name="body" class="form-control col-md-7 col-xs-12"
                               placeholder="متن">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="description">توضیحات بیشتر <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <textarea type="text" id="description" name="description"
                                  class="form-control col-md-7 col-xs-12" rows="7"
                                  placeholder="توضیحات بیشتتر"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary btn-lg btn-block">ارسال مقاله</button>

            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#category').on('change', function (e) {
            // console.log(e);
            var cat_id = e.target.value;
            var url = "{{route('getCatSub',['cat_id'=>':id']) }}";
            url = url.replace(':id', cat_id);
            $.getJSON(url).done(function (data) {
                $('#sub_category').empty();
                $.each(data, function (subCat) {
                    $('#sub_category').append('<option value="' + subCat.id + '">' + subCat.name + '</option>');
                });
            });
        });
    </script>
@endsection
