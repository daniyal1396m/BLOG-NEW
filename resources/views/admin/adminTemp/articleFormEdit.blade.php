@extends('admin.temp')
@section('admin_content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="x_panel">
        <div class="x_title">
            <h2>ویرایش مقاله</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br/>
            <h4>فرم ویرایش مقاله </h4>
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
            <form class="form-horizontal form-label-left" method="post"
                  action="{{route('store.edit.article',[$article->id])}}" enctype="multipart/form-data">

                @csrf
                <div class="text-center"><img src="{{url('/')."/".$article->image}}" alt="" class="img-responsive"
                                              width="304" height="236"></div>

                <div class="form-group">
                    <label class="control-label col-md-3" for="image">عکس <span
                            class="required">*</span>
                    </label>

                    <div class="col-md-7">
                        <input type="file" id="image"
                               class="form-control col-md-7 col-xs-12" name="image" value="{{$article->image}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="title">عنوان <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <input type="text" id="title"
                               class="form-control col-md-7 col-xs-12" name="title" placeholder="تیتر"
                               value="{{$article->title}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="category">دسته بندی <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <select id="category" class="form-control col-md-7 col-xs-12" name="category">
{{--                            <option value="{{$article->category}}">{{$article->category}}</option>--}}
                            @if(count($categories))
                                @foreach($categories as $rowCategory)
                                    <option value="{{$rowCategory->id}} " @if($rowCategory->id== $article->category) selected @endif>{{$rowCategory->name}}</option>
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
                            <option value="{{$article->sub_category}}">{{$article->subcategory->name}}</option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="body">متن <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <input type="text" id="body" name="body" class="form-control col-md-7 col-xs-12"
                               placeholder="متن" value="{{$article->body}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="description">توضیحات بیشتر <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <textarea type="text" id="description" name="description"
                                  class="form-control col-md-7 col-xs-12" rows="7"
                                  placeholder="توضیحات بیشتتر">{{$article->description}}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary btn-lg btn-block">ارسال مقاله</button>

            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{url('ckeditor')}}/ckeditor.js"></script>
    <script  >
        CKEDITOR.replace('description' ,{
            filebrowserUploadUrl : '{{route('imageUpload')}}',
            filebrowserImageUploadUrl :  '{{route('imageUpload')}}',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        });
    </script>
    <script>
        $('#category').on('change', function (e) {
            var cat_id = e.target.value;
            var url = "{{route('getCatSub',['cat_id'=>':id']) }}";
            url = url.replace(':id', cat_id);
            $.getJSON(url).done(function (data) {
                $('#sub_category').empty();
                $.each(data, function () {
                    for (var i = 0; i < data.child.length; i++) {
                        $('#sub_category').append('<option value="' + data.child[i]['id'] + '">' + data.child[i]['name'] + '</option>');

                    }
                });
            });
        });
    </script>
@endsection
