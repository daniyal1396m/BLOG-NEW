@extends('admin.temp')

@section('admin_content')
    <div class="x_panel">
        <div class="x_title">
            <h2>فرم ایجاد دسته بندی</h2>
            <ul class="nav navbar-right panel_toolbox">
            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" for="category"><span
                    class="required">*</span> پیغام تکی</label>
            <div class="col-md-7">
                <h2>{{$singleMsg->message}}</h2>
            </div>
        </div>
        <div class="x_content">
            <br/>
            <h4>فرم ارسال پاسخ پیغام </h4>
            <form class="form-horizontal form-label-left" method="post" action="{{route('store.response.msg')}}">
                @csrf
                <input type="hidden" value="{{$singleMsg->email}}" name="email">
                <div class="form-group">
                    <label class="control-label col-md-3" for="subCategory">ورودی پیغام</label>
                    <div class="col-md-7">
                       <textarea type="text" id="description" name="description"
                                 class="form-control col-md-7 col-xs-12" rows="7"
                                 placeholder="توضیحات بیشتتر"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary btn-lg btn-block">ارسال دسته بندی یا زیر دسته بندی
                </button>
                @include('layouts.messages')
            </form>

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
