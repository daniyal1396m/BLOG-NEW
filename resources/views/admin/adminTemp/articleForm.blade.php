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
                               class="form-control col-md-7 col-xs-12" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="category">دسته بندی <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <select name="category" id="category" class="form-control col-md-7 col-xs-12">
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
                        <select name="subcategory" id="sub_category" class="form-control col-md-7 col-xs-12">

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="body">متن <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <textarea type="text" id="body" name="body"
                                  class="form-control col-md-7 col-xs-12" rows="7"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary btn-lg btn-block">ارسال مقاله</button>

            </form>
        </div>
    </div>
@endsection
@section('script')

    <script>
        $(document).ready(function () {
            $('#category').on('change', function () {
                var category_id = this.value;
                $.ajax({
                    url: "{{route('getSub')}}",
                    type: "POST",
                    data: {
                        category_id: category_id
                    },
                    cache: false,
                    success: function (getsubcats) {
                        $("#sub_category").html(getsubcats);
                    }
                });


            });
        });
    </script>
@endsection
