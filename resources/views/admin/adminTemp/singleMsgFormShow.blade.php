@extends('admin.temp')

@section('admin_content')
    <div class="x_panel">
        <div class="x_title">
            <h2>در جیمیل </h2>
            <ul class="nav navbar-right panel_toolbox">
            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" for="category"><span
                    class="required">*</span> پیغام تکی</label>
            <div class="col-md-7">
                <h2>{{$details['title']}}</h2>
                <h2>{{$details['body']}}</h2>
                <h2>با تشکر </h2>
            </div>
        </div>

    </div>
@endsection
