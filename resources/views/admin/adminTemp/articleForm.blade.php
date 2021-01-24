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
                        <input type="file" id="first-name2"
                               class="form-control col-md-7 col-xs-12" name="file">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">عنوان <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <input type="text" id="first-name2"
                               class="form-control col-md-7 col-xs-12" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">دسته بندی <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <select name="category" id="cat" class="form-control col-md-7 col-xs-12">
                            <option value="1">1</option>
                            <option value="1">1</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">زیر دسته بندی<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <select name="category" id="cat" class="form-control col-md-7 col-xs-12">
                            <option value="1">1</option>
                            <option value="1">1</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="last-name">متن <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <textarea type="text" id="last-name2" name="body"
                                  class="form-control col-md-7 col-xs-12" rows="7"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary btn-lg btn-block">ارسال مقاله</button>

            </form>
        </div>
    </div>
    </div>
@endsection
