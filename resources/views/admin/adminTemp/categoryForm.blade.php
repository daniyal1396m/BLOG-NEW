@extends('admin.temp')
@section('admin_content')
    <div class="x_panel">
        <div class="x_title">
            <h2>فرم ایجاد دسته بندی</h2>
            <ul class="nav navbar-right panel_toolbox">

            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br/>

            <h4>ارسال دسته بندی یا زیر دسته بندی </h4>
{{--            <form class="form-horizontal form-label-left" method="post" action="{{route('store')}}">--}}
            <form class="form-horizontal form-label-left" method="post" action="/storeCategory">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-3" for="category">نام دسته بندی <span
                            class="required">*</span></label>
                    <div class="col-md-7">
                        <input type="text" id="category" name="category" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="subCategory">انتخاب مورد بالا برای یکی از زیر دسته های
                        روبر</label>
                    <div class="col-md-7">
                        <select name="subCategory" id="subCategory" class="form-control col-md-7 col-xs-12">
                            <option class="disabled">میتوانید یکی را پدر ان قرار دهید</option>
                            @if(count($subCat))
                            @foreach($subCat as $rowCategory)
                                <option value="{{$rowCategory->id}}">{{$rowCategory->name}}</option>
                            @endforeach
                            @else
                                <option class="disabled">ریکورد وجود ندارد</option>
                            @endif
                        </select>

                    </div>
                </div>
                <button type="submit" class="btn btn-secondary btn-lg btn-block">ارسال دسته بندی یا زیر دسته بندی
                </button>
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
            </form>

        </div>
    </div>
@endsection
