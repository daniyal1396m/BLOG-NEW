@extends('admin.temp')
@section('admin_content')
    <div class="x_panel">
        <div class="x_title">
            <h2>فرم ایجاد دسته بندی
            </h2>
            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br/>

            <h4>ارسال دسته بندی یا زیر دسته بندی </h4>
            <form class="form-horizontal form-label-left" method="post">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-3" for="category">نام دسته بندی <span class="required">*</span></label>
                    <div class="col-md-7">
                        <input type="text" id="category" name="category" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="subcategory">انتخاب مورد بالا برای یکی از زیر دسته های
                        روبر</label>
                    <div class="col-md-7">
                        <select type="text"  name="subcategory" id="subcategory" required="required" class="form-control col-md-7 col-xs-12">
                            <option value="1">1</option>
                            <option value="1">1</option>
                            <option value="1">1</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary btn-lg btn-block">ارسال دسته بندی یا زیر دسته بندی</button>
            </form>

        </div>
    </div>
    </div>
@endsection
